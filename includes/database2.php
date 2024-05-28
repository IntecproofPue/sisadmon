<?php
require_once("config.php");

class SQLSRV_DB {

    private $con;
    public $query_id;

    function __construct() {
      $this->db_connect();
    }

/*--------------------------------------------------------------*/
/* Función para conectar mediante SQL Server a la DB
/*--------------------------------------------------------------*/
public function db_connect()
{
	
$connectionInfo = array( "Database"=>$GLOBALS['DB_NAME'], "UID"=>$GLOBALS['DB_USER'], "PWD"=>$GLOBALS['DB_PASS']);
$serverName = "192.168.100.39, 1433"; //serverName\instanceName, portNumber (por defecto es 1433)
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$GLOBALS['conn']=$conn;
	

if( $conn ) {

    echo "Conexión establecida. <i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br /> ";
}else{
    echo "Conexión no se pudo establecer. <i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br />";
    die( print_r( sqlsrv_errors(), true));
}
	
}
/*--------------------------------------------------------------*/
/* Function for Close database connection
/*--------------------------------------------------------------*/

public function db_disconnect()
{
    sqlsrv_close($GLOBALS['conn']);


	
}
/*--------------------------------------------------------------*/
/* Función para la ejecución de sentencias SQL en SQL Server
Luis Mtz
/*--------------------------------------------------------------*/
public function query($sql)
   {

       if (trim($sql != "")) {

           $result = sqlsrv_query($GLOBALS["conn"],$sql);
           //$this->query_id = $this->$conn->query($sql);
           echo "<br>";
           print_r($result);

       }

       if($result === false){
           die("<br><i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>Error en esta consulta :<pre> " . $sql ."</pre>");
       }else{
           echo"<br><i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>Consulta exitosa :<pre> " . $sql ."</pre>";


           while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {


               print_r($row);
               $GLOBALS['row']=$row;

               echo sizeof($row);



       }



       }
       //  die("Error on Query");

       return $this->query_id;

   }

    /*--------------------------------------------------------------*/
    /* Function for Query Helper
    /*--------------------------------------------------------------*/
    public function fetch_array($statement)
    {
        return mysqli_fetch_array($statement);
    }
    public function fetch_object($statement)
    {
        return mysqli_fetch_object($statement);
    }
    public function fetch_assoc($statement)
    {
        //return mysqli_fetch_assoc($statement);

        //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        return "";


    }
    public function num_rows($statement)
    {
        $row=$GLOBALS['row'];
        return $row;
        //sqlsrv_num_rows($statement);
    }
    public function insert_id()
    {
        return mysqli_insert_id($this->con);
    }
    public function affected_rows()
    {
        return mysqli_affected_rows($this->con);
    }
    /*--------------------------------------------------------------*/
    /* Function for Remove escapes special
    /* characters in a string for use in an SQL statement
    /*--------------------------------------------------------------*/
    public function escape($str){

        //return $this-> $conn->real_escape_string($str);

        if (!isset($str) or empty($str))
            return '';

        if (is_numeric($str))
            return $str;

        $non_displayables = array(
            '/%0[0-8bcef]/',        // URL encoded 00-08, 11, 12, 14, 15
            '/%1[0-9a-f]/',         // url encoded 16-31
            '/[\x00-\x08]/',        // 00-08
            '/\x0b/',               // 11
            '/\x0c/',               // 12
            '/[\x0e-\x1f]/',        // 14-31
            '/\27/'
        );
        foreach ($non_displayables as $regex)
            $str = preg_replace( $regex, '', $str);
        $reemplazar = array('"', "'", '=');
        $str = str_replace($reemplazar, "*", $str);
        return $str;


    }
    /*--------------------------------------------------------------*/
    /* Function for while loop
    /*--------------------------------------------------------------*/
    public function while_loop($loop){
        global $db;
        $results = array();
        while ($result = $this->fetch_array($loop)) {
            $results[] = $result;
        }
        return $results;
    }



}

$db = new SQLSRV_DB();

?>
