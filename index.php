<?php
  //ob_start();
    require_once('includes/load.php');
    require_once ('includes/pandora.php');
    session_start();


function EjecutarConstante()
{

    $datosCatConstante = array(
        'iOpcion' => 4,
        'iAgrupador' => 0,
        'iClaveCatalogo' => 0,
        'iIdConstante' => 0
    );

    $procedureName = "EXEC prcConsultaCatConstante  @iOpcion = ?,
                                                        @iAgrupador = ?, 
                                                        @iClave = ?, 
                                                        @iIdConstante = ? 
                                                    ";

    $params = array(
        $datosCatConstante['iOpcion'],
        $datosCatConstante['iAgrupador'],
        $datosCatConstante['iClaveCatalogo'],
        $datosCatConstante['iIdConstante']
    );

    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    $CatConstante = array();

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));

    } else {
        do {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $CatConstante[] = $row;
            }
        } while (sqlsrv_next_result($result));
    }
    return $CatConstante;

    sqlsrv_close($GLOBALS['conn']);
}

$_SESSION['CatConstante'] = EjecutarConstante();



?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $tituloPagina; ?></title>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/et-line.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/css/plyr.css" />
    <link rel="stylesheet" href="assets/css/flag.css" />
    <link rel="stylesheet" href="assets/css/slick.css" /> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <header class="header-2 access-page-nav">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="index.php"><img src="images/logo-2.png" alt=""></a>
              </div>
              <!-- <div class="top-nav">
                <a href="register.html" class="account-page-link">Register</a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="padding-top-90 padding-bottom-90 access-page-bg">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="access-form">
              <div class="form-header">
                <h5><i data-feather="user"></i><?php echo $loginTxt; ?></h5>
              </div>
				<?php //echo display_msg($msg); 
				
				?>
				<?php
 
if(isset($_POST['submit']))
 
{

        require_once('includes/load.php');
 
        $emailAddress = $_POST['emailAddress'];
        $passwordInserted = $_POST['passwordInserted'];
 
        //echo "<i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>El usuario ha escrito : <b> $emailAddress </b><br>";
        //echo "El usuario ha escrito : <b> $passwordInserted </b>";
        //echo "<br>Aquí se inicia la validación de usuario.<br><br>";

        $pwd_peppered = hash_hmac("sha256", $passwordInserted, "Palabra Secreta");
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);

           // echo "<i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>    Usuario: $emailAddress<br>
           //                   PWD Sin encriptar: $passwordInserted <br>
           //                   PWD Encriptada: $pwd_hashed<bR>
           //                   Tamaño de cadena:". strlen($pwd_hashed);


                if(empty($errors)){

                    $user = authenticate_v2($emailAddress, $passwordInserted);
                    //print_r($GLOBALS['rolesUser']);
                    $row =$GLOBALS['rolesUser'];
                    $idUsuario = $row[0]['iIdUsuario'];
                    $bResult = $row[0]['bResult'];



                    if($bResult == 0){ ?>
                            <div style="background-color: #c82333; text-align: center"><?php echo "<i><span style='color: #ededee' size='-2'> $errorUsuPwdTxt</span></i><br />"; ?></div>
                         <?php
                    }elseif ($bResult == 1){ ?>
                        <div style="background-color: #117a8b; text-align: center">
                            <?php echo "<i><span style='color: #ededee' size='-2'> $bienUsuPwdTxt</span></i><br />"; ?>
                            <?php
                            //session_start();
                            //echo "Aquí sigo teniendo el valor de IDUSUARIO =".$idUsuario;
                            $_SESSION['user_id'] = $idUsuario;
                            //echo ($_SESSION['user_id']);
                            $_SESSION['instante']   = time();

                            if ( isset( $_SESSION['user_id'] )  ) {?>
                                <script type="text/javascript">
                                    setTimeout( function() { window.location.href = "inicio.php"; }, 1000 );
                                </script>
                                <?php


                                ?>
                            <?php }

                            ?>

                        </div>
                <?php    }else{

                    }
                }else{
echo "erorr====";

                }

}

?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <input type="email" placeholder="<?php echo $ingresarUsuarioTxt; ?>" class="form-control" name="emailAddress" required>
                </div>
                <div class="form-group">
                  <input type="password" placeholder="<?php echo $ingresarContraTxt; ?>" class="form-control" name="passwordInserted" required>
                </div>
                <div class="more-option">
                  <div class="mt-0 terms">
                  </div>
                  <a href="#"><?php echo $olvideContraTxt; ?></a>
                </div>
				  <input type="submit" name="submit" value="<?php echo $ingresarTxt; ?>" class="button primary-bg btn-block"><br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.nstSlider.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/visible.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/plyr.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
  </body>
</html>