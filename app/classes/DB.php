<?php

/**
 * Class DB provides an access to database
 * Class uses a PDO extention
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class DB
{

    private $pdo;

    function __construct ( $dbConfig )
    {
        try
        {
            $connectionString = $dbConfig[ 'driver' ] .
                    ":server=" . $dbConfig[ 'host' ] .
                    ";database=" . $dbConfig[ 'base' ];
            $this->pdo        = new PDO ( $connectionString,
                                          $dbConfig[ 'user' ],
                                          $dbConfig[ 'pass' ] );
        }
        catch ( Exception $ex )
        {
            echo "[DB.php] Error database connection: " . $ex->getMessage ();
            die ();
        }
    }

    function __destruct ()
    {
        unset ( $this->pdo );
    }

    function getConnection ()
    {
        return $this->pdo;
    }

    function getNextAutoIncrementValue ( $table )
    {
        if ( $result = $this->pdo->query ( "SHOW TABLE STATUS LIKE '$table';" ) )
        {
            return $result->fetchAll ()[ 'AutoIncrement' ];
        }
        else
        {
            return 0;
        }
    }

}
