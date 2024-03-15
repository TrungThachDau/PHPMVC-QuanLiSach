<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "qlsach",
    "Uid" => "sa",
    "PWD" => "123"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

?>
