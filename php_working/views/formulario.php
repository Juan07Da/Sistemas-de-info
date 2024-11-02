<?php
session_start();
require_once '../inc/funciones.php';

if (!verificar_rol('administrador')) {
    echo "Acceso denegado.";
    exit;
}

$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        /* Estilos aquí... */
    </style>
    <script>
    function validarFormulario() {
        // Validaciones aquí...
    }
    </script>
</head>
<body>
    <header>
        <a href="dashboard.php">Volver al Dashboard</a>
        <a href="postprivado.php">Post privado</a>
    </header>

    <div class="caja">
        <div>
            <h2>Área de Administración</h2>
            <?php if ($mensaje): ?>
                <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <form id="miFormulario" action="insertar.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo">
                <div id="error-titulo" class="error"></div>

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"></textarea>
                <div id="error-descripcion" class="error"></div>

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">
                <div id="error-imagen" class="error"></div>

                <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>
