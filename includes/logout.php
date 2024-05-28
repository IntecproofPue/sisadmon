<?php

// Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_unset();
// Finalmente, destruir la sesión.

session_destroy();

$GLOBALS['DB_LOGOUT'] = 1; //se actualiza el valor para redireccionar correctamente desde index.html


?>

<script>
    localStorage.clear();
</script>

<script type="text/javascript">
    //Redireccionamiento tras 5 segundos
    setTimeout( function() { window.location.href = "../index.html"; }, 0 );
</script>
