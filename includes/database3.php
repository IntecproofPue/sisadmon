<?php
require_once("config.php");

class SQLSRV_DB
{

    private $con;
    public $query_id;

    function __construct()
    {
        $this->db_connect();
    }

    /*--------------------------------------------------------------*/
    /* Función para conectar mediante SQL Server a la DB
    /*--------------------------------------------------------------*/
    public function db_connect()
    {

        $connectionInfo = array("Database" => $GLOBALS['DB_NAME'], "UID" => $GLOBALS['DB_USER'], "PWD" => $GLOBALS['DB_PASS'], "CharacterSet" => $GLOBALS['DB_CHARACTER']);
        $serverName = "192.168.100.39, 1433"; //serverName\instanceName, portNumber (por defecto es 1433)
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        $GLOBALS['conn'] = $conn;


        if ($conn) {

            //echo "Conexión establecida. <i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br /> ";
        } else {
            echo "Conexión no se pudo establecer. <i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br />";
            die(print_r(sqlsrv_errors(), true));
        }

    }
    /*--------------------------------------------------------------*/
    /* Function for Close database connection
    /*--------------------------------------------------------------*/

    public function db_disconnect()
    {
        sqlsrv_close($GLOBALS['conn']);

    }

}


$db = new SQLSRV_DB();


?>