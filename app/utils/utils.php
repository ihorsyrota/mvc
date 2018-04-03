<?php

/**
 * Removes all occurences of $subString in given $string
 * @param string $string
 * @param string $subString
 * @return string
 */
function removeSubstr ( $string, $subString )
{
    while ( !(strpos ( $string, $subString ) === false ) )
    {
        $string = str_replace ( $subString, '', $string );
    }
    return $string;
}

/**
 * Removes all doubled slashes in given $string
 * @param string $string
 * @return string
 */
function removeDoubledSlashes ( $string )
{
    while ( !(strpos ( $string, '//' ) === false ) )
    {
        $string = str_replace ( '//', '/', $string );
    }
    return $string;
}

/*
** Returns Login part from $_SERVER['REMOTE_USER'] value
** $remoteUser = UBANK\AHryts1
** Returns = AHryts1
*/ 
function extractLogin ( $remoteUser )
{
    $pos = strpos ( $remoteUser, '\\' );
    if ($pos !== false)
    {
        $remoteUser = substr ( $remoteUser, $pos + 1, strlen ( $remoteUser ) - $pos - 1 );
    }
    return $remoteUser;
}
