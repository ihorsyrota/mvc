<?php

/**
 * Application routes.
 * Name of this file is written in settings.php file as value of key 'routes'
 * 
 *  @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
return array (
    '^request/console/([0-9]+)$' => 'request/detail/console/$1',
    '^request/user/([0-9]+)$'    => 'request/detail/user/$1',
    '^user/stats$'               => 'user/stats',
    '^user/request$'             => 'user/request',
    '^user/view$'                => 'user/default',
    '^user$'                     => 'user/default',
    '^dm/approve/([0-9]+)$'      => 'dm/approve/$1',
    '^dm/approve$'               => 'dm/approve',
    '^dm/reject/([0-9]+)$'       => 'dm/reject/$1',
    '^dm/reject$'                => 'dm/reject',
    '^dm/view$'                  => 'dm/default',
    '^dm$'                       => 'dm/default',
    '^its/approve/([0-9]+)$'     => 'its/approve/$1',
    '^its/approve$'              => 'its/approve',
    '^its/reject/([0-9]+)$'      => 'its/reject/$1',
    '^its/reject$'               => 'its/reject',
    '^its/view$'                 => 'its/default',
    '^its$'                      => 'its/default',
    '^sec/approve/([0-9]+)$'     => 'sec/approve/$1',
    '^sec/approve$'              => 'sec/approve',
    '^sec/reject/([0-9]+)$'      => 'sec/reject/$1',
    '^sec/reject$'               => 'sec/reject',
    '^sec/view$'                 => 'sec/default',
    '^sec'                       => 'sec/default',
    '^console$'                  => 'console/view',
    '^404$'                      => '_404/default',
    '^$'                         => 'user/default',
    '.+'                         => '_404/default',
);
