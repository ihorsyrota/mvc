<?php

/**
 * Description of ConsoleModel
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class ConsoleModel extends Model
{

    function __construct ( $config )
    {
        parent::__construct ( $config );
    }

    // Get data for /user/view
    public function getData ()
    {
        $data   = array ();
        if ( $result = $this->dbLink->query ( "SELECT * FROM USBRequests ORDER BY inserttimestamplog ASC" ) )
        {

            $data = $result->fetchAll ();
            for ( $i = 0; $i < count ( $data ); $i++ )
            {
//                var_dump($data[ $i ]);
                $time_limit               = intval ( $data[ $i ][ 'DateDiff' ] );
                $data[ $i ][ 'DateDiff' ] = "";
                $status                   = intval ( $data[ $i ][ 'status' ] );
                if ( $status == -1 )
                {
                    $style                  = " class=\"ssd4\"";
                    $data[ $i ][ 'status' ] = 'Rejected';
                }
                else if ( $status == 0 )
                {
                    $style                  = " class=\"ssd1\"";
                    $data[ $i ][ 'status' ] = 'Closed';
                }
                else if ( $status == 4 )
                {
                    $style                  = " class=\"ssd2\"";
                    $data[ $i ][ 'status' ] = 'Unlocked';
                }
                else
                {
                    $data[ $i ][ 'status' ] = 'In process';
                    $time_limit             = intval ( $data[ $i ][ 'DateDiff' ] );
                    if ( $time_limit > 30 )
                    {
                        $style                    = " class=\"ssd3\"";
                        $data[ $i ][ 'DateDiff' ] = $time_limit;
                    }
                    else
                    {
                        $style = " class=\"ssd0\"";
                    }
                }
                $data[ $i ][ 'style' ] = $style;
            }
        }

        return $data;
    }

}
