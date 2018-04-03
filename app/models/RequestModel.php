<?php

/**
 * Description of ConsoleModel
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class RequestModel extends Model
{

    function __construct ( $config )
    {
        parent::__construct ( $config );
    }

    function getRequestDetails ( $id )
    {
        $data     = array ();
        $queryStr = "SELECT r.computer_name resCompName, r.ip_address resIP, r.comments resReason,
                        r.request_type resType, r.ntlm resNTLM, r.id resID, r.inserttimestamplog resDate,
                        a1.Name resUsername, a2.Name resCheckername, a3.Name resMainCheckername,
                        a4.Name resSecCheckername
                    FROM Requests r
                    LEFT JOIN AD_Users a1 ON a1.ntlm=r.ntlm
                    LEFT JOIN AD_Users a2 ON a2.ntlm=r.checker
                    LEFT JOIN AD_Users a3 ON a3.ntlm=r.main_checker
                    LEFT JOIN AD_Users a4 ON a4.ntlm=r.checker
                    WHERE r.id=" . $id;

        if ( $result = $this->dbLink->query ( $queryStr, PDO::FETCH_ASSOC ) )
        {
            if ( $row = $result->fetch ( PDO::FETCH_ASSOC ) )
            {
                $data = array (
                    'resCompName'        => $row[ 'resCompName' ],
                    'resIP'              => $row[ 'resIP' ],
                    'resReason'          => $row[ 'resReason' ],
                    'resType'            => 'Тимчасово',
                    'resNTLM'            => $row[ 'resNTLM' ],
                    'resID'              => $row[ 'resID' ],
                    'resDate'            => $row[ 'resDate' ],
                    'resUsername'        => $row[ 'resUsername' ],
                    'resCheckername'     => $row[ 'resCheckername' ],
                    'resMainCheckername' => $row[ 'resMainCheckername' ],
                    'resSecCheckername'  => $row[ 'resSecCheckername' ],
                    'empty'              => '(empty)',
                );
            }
        }
        return ($data);
    }

}
