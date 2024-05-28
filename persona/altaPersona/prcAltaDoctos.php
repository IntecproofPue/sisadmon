<?php
require_once('../../includes/load.php');
session_start();


var_dump($_FILES);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['documento'])) {
        echo "Archivo recibido.<br>";
        echo "Nombre del archivo: " . $_FILES['documento']['name'] . "<br>";
        echo "Tipo de archivo: " . $_FILES['documento']['type'] . "<br>";
        echo "Tamaño del archivo: " . $_FILES['documento']['size'] . "<br>";
        echo "Error en el archivo: " . $_FILES['documento']['error'] . "<br>";
        echo "Ruta temporal del archivo: " . $_FILES['documento']['tmp_name'] . "<br>";

        $nombre = basename($_FILES['documento']['name']);

        $carpeta = '\\\\PCSERVIDOR\\DocumentosSIA';

        echo $carpeta;

        if (!is_dir($carpeta)) {
            echo "La carpeta ya existe.<br>";
        }

        if ($_FILES['documento']['error'] == UPLOAD_ERR_OK) {
            $destino = $carpeta . DIRECTORY_SEPARATOR . $nombre;
            // Intentar mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES['documento']['tmp_name'], $destino)) {
                echo "Archivo movido a la carpeta con éxito.<br>";
            } else {
                echo "Hubo un error al mover el archivo.<br>";

                echo "Error: " . error_get_last()['message'] . "<br>";
            }
        } else {
            echo "Hubo un error al subir el archivo.<br>";
        }

        echo "Nombre final del archivo: $nombre<br>";
        echo "Carpeta de destino: $carpeta<br>";
    } else {
        echo "No se subió ningún archivo.<br>";
    }
} else {
    echo "Solicitud inválida.<br>";
}
?>
