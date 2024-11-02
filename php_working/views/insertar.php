<?php
session_start();
require_once '../inc/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $usuario_id = $_POST['usuario_id'];

    // Verificar si se ha subido un archivo
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];
        $dest_path = '../uploads/' . basename($fileName);

        // Mover el archivo a su destino final
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $_SESSION['mensaje'] = 'Imagen subida con éxito.';
        } else {
            $_SESSION['mensaje'] = 'Error al mover el archivo.';
        }
    } else {
        $_SESSION['mensaje'] = 'Error al subir la imagen.';
    }

    header('Location: formulario.php'); // Redirigir a la página del formulario
    exit;
}
