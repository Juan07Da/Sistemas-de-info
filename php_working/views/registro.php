<?php
session_start();
require_once '../inc/conexion.php';
require_once '../inc/funciones.php';

$errores = [
    'nombre' => '',
    'email' => '',
    'password' => '',
    'exito' => ''
];

$nombre = '';
$email = '';
$password = '';
$rol = 'invitado'; // Rol predeterminado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = limpiar_dato($_POST['nombre']);
    $email = limpiar_dato($_POST['email']);
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $imagenPerfil = $_FILES['imagen']['name'];

    // Validaciones
    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email no es válido.';
    }
    if (strlen($password) < 6) {
        $errores['password'] = 'La contraseña debe tener al menos 6 caracteres.';
    }

    // Verificar si el email ya existe en la base de datos
    $sqlVerificacion = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
    $stmtVerificacion = $conexion->prepare($sqlVerificacion);
    $stmtVerificacion->bindParam(':email', $email);
    $stmtVerificacion->execute();
    $emailExiste = $stmtVerificacion->fetchColumn();

    if ($emailExiste) {
        $errores['email'] = 'El correo electrónico ya está registrado.';
    }

    // Si no hay errores, proceder con el registro
    if (empty(array_filter($errores))) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Definir la ruta donde se guardará la imagen
        $rutaImagen = 'C:/xampp/htdocs/php_working/imagen/' . $imagenPerfil;

        $sql = "INSERT INTO usuarios (nombre, email, password, rol, imagen) VALUES (:nombre, :email, :password, :rol, :imagen)";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':imagen', $rutaImagen); // Guardar la ruta completa

        if ($stmt->execute()) {
            // Subir imagen de perfil
            move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

            $errores['exito'] = 'Usuario registrado exitosamente.';
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        header{
            display: flex; /* Activa el modo flexbox */
            justify-content: flex-end; /* Alinea horizontalmente el contenido a la derecha */
            align-items: center; /* Centra verticalmente el contenido dentro del header */
            height: 50px;
            background-color: white; /* Color de fondo opcional */

        }
        a{
            padding-right: 20px;
            text-decoration: none; /* Elimina el subrayado del enlace */
            color: black;
            font-size: 27px;
        }
        .caja {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            .c
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px; /* Ajusta el ancho del formulario */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        select {
            padding: 1px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .ex ito {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1px;
        }
        .rol-cuadro, .selector-cuadro, .imagen-cuadro, .archivo-cuadro {
            background-color: #f9f9f9;
            padding: 5px; /* Reducir padding para hacer los cuadros más angostos */
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: auto; /* Permitir que los cuadros se ajusten automáticamente */
        }
        .rol-cuadro, .imagen-cuadro {
            margin-left: 0px;
        }
        .selector-cuadro, .archivo-cuadro {
            margin-right: 0px;
        }
        .rol-cuadro label, .selector-cuadro select, .imagen-cuadro label, .archivo-cuadro input {
            margin: 0;
            font-size: 12px; /* Ajustar el tamaño del texto */
            line-height: 1.2; /* Ajustar el espacio entre líneas */
        }
        .rol-cuadro, .imagen-cuadro {
            text-align: center;
        }
        .rol-cuadro label, .imagen-cuadro label {
            font-size: 15px; 
        }
        .selector-cuadro select, .archivo-cuadro input {
            margin-right: 12px;
            margin-left: 12px;
        }
        .archivo-cuadro input {
            font-size: 10px; 
        }
    </style>
</head>
<body>

    <header>
        <a href="../index.php">Index</a>
        <a href="./login.php">Login</a>
    </header>

    <div class="caja">
        <form method="post" enctype="multipart/form-data">
            <h2>Registro de Usuario</h2>
            <?php if (!empty($errores['exito'])): ?>
                <p class="exito"><?php echo $errores['exito']; ?></p>
            <?php endif; ?>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            <?php if (!empty($errores['nombre'])): ?>
                <p class="error"><?php echo $errores['nombre']; ?></p>
            <?php endif; ?>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
            <?php if (!empty($errores['email'])): ?>
                <p class="error"><?php echo $errores['email']; ?></p>
            <?php endif; ?>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
            <?php if (!empty($errores['password'])): ?>
                <p class="error"><?php echo $errores['password']; ?></p>
            <?php endif; ?>

            <!-- Contenedor flex para los cuadros -->
            <div class="flex-container">
                <!-- Cuadro para el label del rol -->
                <div class="rol-cuadro">
                    <label for="rol">Rol:</label>
                </div>

                <!-- Cuadro para el selector de rol -->
                <div class="selector-cuadro">
                    <select name="rol" id="rol">
                        <option value="invitado" <?php echo $rol === 'invitado' ? 'selected' : ''; ?>>Invitado</option>
                        <option value="administrador" <?php echo $rol === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                </div>
            </div>

            <!-- Cuadro para imagen de perfil -->
            <div class="flex-container">
                <div class="imagen-cuadro">
                    <label for="imagen">Imagen de Perfil:</label>
                </div>
                <div class="archivo-cuadro">
                    <input type="file" name="imagen" id="imagen">
                </div>
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>