<?php
/*Connect to the local server using Windows Authentication and
specify the AdventureWorks database as the database in use. */
$serverName = "192.168.100.39, 1433";
$connectionInfo = array( "Database"=>"BDSistemaIntegral_PRETEST", "UID"=>"Development", "PWD"=>"Development123*");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false)
{
    echo "No se puede conectar.\n";
    die( print_r( sqlsrv_errors(), true));
}else {

    echo "Se conectó a DB<br>";
}


$sql = "EXEC prcEjemplo 5";

print "Sentencia SQL: $sql<br>";

    $result = sqlsrv_query($conn, $sql);
    print_r($result);


if($result == false) {
    die(print_r(sqlsrv_errors(), true));
    echo "<br>No se ejecutó el EXEC<br>";
}
else{
    echo "<br>Se ejecutó el EXEC<br>";

    #Fetching Data by array
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        print_r($row);
    }


}











/* Free the statement and connection resources. */
sqlsrv_free_stmt( $result);





sqlsrv_close( $conn);
?>