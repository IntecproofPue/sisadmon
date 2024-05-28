
<?php

$params=array();

// Setup connection
$serverName = "192.168.100.39";
$connectionInfo = array( "Database"=>"BDSistemaIntegral_PRETEST", "UID"=>"Development", "PWD"=>"Development123*");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}


// Execute the stored procedure
$sql = "declare @result as int,
        @msg as varchar(100);

exec prcUno 
     @iIdPersona = 800,
	 @iIdResultado = @result output,
	 @vchMessage   = @msg output

select @result as BLA  , @msg as BLE";
$stmt = sqlsrv_query($conn, $sql);
echo "contenido smt <br>";
print_r($stmt);
echo "<br>";

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the output
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['BLA']."<br>";
    echo $row['BLE']."<br>";

    print_r($row);

}

// Close statement and connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);



?>