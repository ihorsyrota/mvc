<?php

class UserModel extends Model
{

    function __construct ( $config )
    {
        parent::__construct ( $config );
    }

    // Get data for /user/view
    public function getUserData ( $userLogin )
    {
        $userName = 'unknown';

        if ( $adUsers = $this->dbLink->query ( "SELECT DISTINCT Name FROM AD_Users WHERE ntlm = '$userLogin'" ) )
        {
            $row      = $adUsers->fetch ();
            $userName = $row[ 'Name' ];
        }

        return array (
            'userLogin' => $userLogin,
            'sIP'       => $this->config [ 'REMOTE_ADDR' ],
            'userName'  => $userName
        );
    }

    // Insert request data into database
    public function insertRequest ( $requestData )
    {
        return;
        // Start transaction
        try
        {
            $this->dbLink->beginTransaction ();

            // INSERT INTO Requests
            $queryStr = "INSERT INTO Requests (ntlm, computer_name, ip_address, comments, cvalue, status, checker,main_checker, request_type) VALUES ('";
            $queryStr .= $requestData[ 'ntlm' ];
            $queryStr .= "', '";
            $queryStr .= $requestData[ 'computer_name' ];
            $queryStr .= "', '";
            $queryStr .= $requestData[ 'ip_address' ];
            $queryStr .= "', '";
            $queryStr .= $requestData[ 'reason' ];
            $queryStr .= "', ";
            $queryStr .= $requestData[ 'period' ];
            $queryStr .= ", ";
            $queryStr .= $requestData[ 'st1' ];
            $queryStr .= ", '";
            $queryStr .= $requestData[ 'chk' ];
            $queryStr .= "', '";
            $queryStr .= $requestData[ 'mchk' ];
            $queryStr .= "', ";
            $queryStr .= $requestData[ 'rtype' ];
            $queryStr .= ")";
            if ( !$this->dbLink->query ( $queryStr ) )
            {
                throw new Exception ( 'MODEL USER: Error insertion into table Requests.' );
            }

            // Retrive an ID of the last inserted record
            $requestID = $this->dbLink->lastInsertId ();

            // INSERT INTO RequestsApproves (Id, status) VALUES ("&lId&",1)
            $queryStr = "INSERT INTO RequestsApproves (Id, status) VALUES (";
            $queryStr .= $requestID;
            $queryStr .= ", ";
            $queryStr .= $requestData[ 'st1' ];
            $queryStr .= ")";
            if ( !$this->dbLink->query ( $queryStr ) )
            {
                throw new Exception ( 'MODEL USER: Error insertion into table RequestsApproves.' );
            }

            // INSERT INTO RequestAF
            $queryStr = "INSERT INTO RequestAF (FieldType, Value, RequestId) VALUES ('Тип розблокування', '";
            $queryStr .= $requestData[ 'foType' ];
            $queryStr .= "', ";
            $queryStr .= $requestID;
            $queryStr .= ")";
            if ( !$this->dbLink->query ( $queryStr ) )
            {
                throw new Exception ( 'MODEL USER: Error insertion into table RequestAF.' );
            }

            // Execute "EXEC SendUSBUnlock 1, "&lId
            // Commint transaction
            $this->dbLink->commit ();
            //$this->db->autocommit ( true );
            // Redirect "/usb/default.asp?cm=ok"
        }
        catch ( Exception $e )
        {
            // Rollback transaction
            $this->dbLink->rollback ();

            print_r ( $e );
            exit;
            // Write err&"=>"&err.Description
        }
    }

    function openedRequestsExist ( $userNTLM )
    {
        $requestCount = 0;
        $queryStr     = "SELECT count(*) as rec_count FROM Requests WHERE ntlm='" . $userNTLM . "' AND status > 0";
        if ( $result       = $this->dbLink->query ( $queryStr ) )
        {
            $row          = $result->fetch ();
            $requestCount = $row[ 'rec_count' ];
        }
        return ($requestCount > 0);
    }

    function getOpenedRequests ( $userNTLM )
    {
        $data     = array ();
        $queryStr = "SELECT Requests.computer_name resCompName, Requests.ip_address resIP, Requests.comments resReason,
                        Requests.request_type resType, Requests.ntlm resNTLM, Requests.id resID, AD_Users.Name resUsername
                        FROM Requests
                        JOIN AD_Users ON AD_Users.ntlm=Requests.ntlm
                        WHERE Requests.ntlm='" . $userNTLM . "' AND Requests.status>0
                        ORDER BY Requests.Id asc";
        if ( $result   = $this->dbLink->query ( $queryStr ) )
        {
            $i   = 0;
            /* fetch values */
            while ( $row = $result->fetch () )
            {
                $data[ $i++ ] = array (
                    'resCompName' => $row[ 'resCompName' ],
                    'resIP'       => $row[ 'resIP' ],
                    'resReason'   => $row[ 'resReason' ],
                    'resType'     => 'Тимчасово',
                    'resNTLM'     => $row[ 'resNTLM' ],
                    'resID'       => $row[ 'resID' ],
                    'resUsername' => $row[ 'resUsername' ]
                );
            }
        }
        return ($data);
    }

}
