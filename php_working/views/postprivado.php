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
    <title>Crear Post Privado</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        body {
            margin: 0;
        }
        .caja {
            display: grid;
            place-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 50px;
        }
        a {
            padding-right: 20px;
            text-decoration: none;
            color: black;
            font-size: 27px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            gap: 10px;
        }
        input, textarea, button {
            padding: 8px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .mensaje {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .mensaje.exito {
            background-color: #d4edda;
            color: #155724;
        }
        .mensaje.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
    <script>
    function validarFormulario() {
        document.getElementById('error-titulo').innerText = '';
        document.getElementById('error-descripcion').innerText = '';

        let valido = true;

        const titulo = document.getElementById('titulo').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();

        if (titulo === '') {
            document.getElementById('error-titulo').innerText = 'El título es obligatorio.';
            valido = false;
        }
        if (descripcion === '') {
            document.getElementById('error-descripcion').innerText = 'La descripción es obligatoria.';
            valido = false;
        }

        return valido;
    }
    </script>
</head>
<body>
    <header>
        <a href="dashboard.php">Volver al Dashboard</a>
        <a href="formulario.php">Post con Imagen</a>
    </header>

    <div class="caja">
        <div>
            <h2>Crear Post Privado</h2>

            <?php if ($mensaje): ?>
                <div class="mensaje <?php echo strpos($mensaje, 'Error') !== false ? 'error' : 'exito'; ?>">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <form id="miFormulario" action="guardar_post.php" method="post" onsubmit="return validarFormulario()">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo">
                <div id="error-titulo" class="error"></div>

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"></textarea>
                <div id="error-descripcion" class="error"></div>

                <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                <button type="submit">Crear Post</button>
            </form>
        </div>
    </div>
</body>
</html>
