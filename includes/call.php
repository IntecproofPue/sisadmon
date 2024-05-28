<?php
$serverName = "192.168.100.39, 1433";
$connectionInfo = array( "Database"=>"BDSistemaIntegral_PRETEST", "UID"=>"Development", "PWD"=>"Development1234*");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false)
{
    echo "No se puede conectar.\n";
    die( print_r( sqlsrv_errors(), true));
}else {

    echo "Se conectó a DB<br>";
}


// Assume the stored procedure spTestProcedure exists, which retrieves a bigint value of some large number
// e.g. 9223372036854
$bigintOut = 0;
$outSql = "EXEC prcEjemplo 5";
echo "<br> Se va a ejecutar el comando : $outSql";
$stmt = sqlsrv_prepare($conn, $outSql, array(array($bigintOut, SQLSRV_PARAM_OUT, null, SQLSRV_SQLTYPE_CHAR)));
//$stmt= sqlsrv_prepare($conn,)
sqlsrv_execute($stmt);
echo "<br>El resultado es = $bigintOut\n";   // Expect 9223372036854

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);




?>