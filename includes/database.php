<?php
$serverName = "192.168.100.39, 1433"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"BDSistemaIntegral_PRETEST", "UID"=>"Development", "PWD"=>"Development1234*");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {

    echo "Conexión establecida.<br />";
}else{
    echo "Conexión no se pudo establecer.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>