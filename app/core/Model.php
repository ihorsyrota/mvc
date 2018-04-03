<?php

/**
 * This is a general View class
 * Here is implemented the connection to database
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class Model
{

    protected $config;
    protected $db;
    protected $dbLink;

    function __construct ( $config )
    {
        $this->config = $config;
        $this->db     = new DB ( $config[ 'dbconfig' ] );
        $this->dbLink = $this->db->getConnection ();
        $this->dbLink->query ( "SET NAMES 'utf8'" );
    }

    function __destruct ()
    {
        if ( isset ( $this->dbLink ) && !$this->dbLink )
        {
            unset ( $this->dbLink );
        }
        if ( isset ( $this->db ) && !$this->db )
        {
            unset ( $this->db );
        }
    }

    public function getData ()
    {
        
    }

}
