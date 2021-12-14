<?php
$serverName = "demo2.database.windows.net"; 
$connectionInfo = array( "Database"=>"TABHR", "UID"=>"PublicUser", "PWD"=>"Public!321", 'ReturnDatesAsStrings'=> true, "CharacterSet" => 'utf-8');

$conn = sqlsrv_connect($serverName, $connectionInfo);

ini_set('default_charset', 'ISO-8859-1');                                 

if( !$conn ) {
     echo "Connection could not be established.<br>";
     die( print_r( sqlsrv_errors(), true));
}

$version = "1.0";



?>