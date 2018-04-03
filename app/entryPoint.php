<?php

/**
 * An entry point of application
 * 
 * In this file being done such vital activities:
 * 1/ Loading configuration file
 * 2/ Loading Classes and Libraries
 * 3/ Loading core classes (Router, Model, View and Controller)
 * 4/ Creating an instance of class Router and calling method Router::run()
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
// 1. Loading configuration file
$config                  = require_once ROOT . APP_DIR . CONF_FILE;
$config[ 'rootFolder' ]  = ROOT;
$config[ 'REMOTE_ADDR' ] = filter_input ( INPUT_SERVER, 'REMOTE_ADDR' );
$config[ 'REMOTE_USER' ] = filter_input ( INPUT_SERVER, 'REMOTE_USER' );

// Make full path for application directories for easier usage
$dirsCount = count ( $config[ 'dirs' ] );
$i         = 0;
foreach ( $config[ 'dirs' ] as $key => $value )
{
    if ( $i == 0 )
    {
        $i++;
        continue;
    }
    else
    if ( $i < $dirsCount )
    {
        $config[ 'dirs' ][ 'fp_' . $key ] = $config[ 'rootFolder' ] .
                $config[ 'dirs' ][ 'application' ] .
                $config[ 'dirs' ][ $key ];
    }
    else
    {
        break;
    }
    $i++;
}

// 2. Include useful libraries and classes
// Here are the libraries
foreach ( $config[ 'utils' ] as $className => $classFile )
{
    require_once $config[ 'dirs' ][ 'fp_utils' ] . $classFile;
}

// Here are the classes
foreach ( $config[ 'classes' ] as $className => $classFile )
{
    require_once $config[ 'dirs' ][ 'fp_classes' ] . $classFile;
}

// 3. Include core engines
foreach ( $config[ 'core' ] as $className => $classFile )
{
    require_once $config[ 'dirs' ][ 'fp_core' ] . $classFile;
}

$config[ 'USER_LOGIN' ] = extractLogin ( $config[ 'REMOTE_USER' ] );


// Attach Smarty Framework
// Currently it was done in ugly way :(
// In future it needs to be rewritten more pretty
// TODO: redesign connection with Smarty
define('SMARTY_DIR',
        filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/../lib/smarty/');
(require SMARTY_DIR . 'Smarty.class.php') or die;

// 4. Call to Router
$router = new Router ( $config );
$router->run ();
