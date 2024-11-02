<?php
session_start();
require_once '../inc/conexion.php';
require_once '../inc/funciones.php';

$errores = [
    'error' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = limpiar_dato($_POST['email']);
    $password = $_POST['password'];

    // Consultamos si el email existe
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nombre'];
        $_SESSION['user_role'] = $usuario['rol'];
        $_SESSION['user_email'] = $usuario['email'];
        $_SESSION['user_imagen'] = $usuario['imagen']; // Imagen de usuario
        
        header("Location: dashboard.php");
        exit;
    } else {
        $errores['error'] = 'Email o contraseña incorrectos.';
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        body {
            margin: 0;
            background-image: url('../imagen/111.gif');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        .caja {
            display: grid;
            place-items: center;
            min-height: 100vh;
            border-radius: 10px;
            padding: 0px;
            position: relative;
            background-color: transparent;
        }

        header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 50px;
            background-color: transparent;
            margin-bottom: 25px; /* Reducido de 60px a 10px para acercar el formulario al círculo */
        }

        a {
            padding-right: 30px;
            text-decoration: none;
            color: white;
            font-size: 27px;
            font-family:'Arial', sans-serif;
            margin-top: 2px;
        }

        form {
            width: 100%;
            max-width: 300px;
            background-color: #fff;
            padding: 3px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            top: 0px;
            background-color: transparent;
            color: white;

        }

        h2 {
            text-align: center;
            color: white;
        }

        input {
            width: -webkit-fill-available;
            margin-bottom: 10px;
        }

        .error {
            text-align: center;
            color: red;
            font-weight: bold;
            font-size: 0.9em;
        }

        /* Estilo para el círculo */
        .circulo {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background-image: url('../imagen/in.gif'); /* Reemplaza con la imagen deseada */
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0px; /* Ajustado para bajar el círculo */
            left: 50%;
            transform: translateX(-50%);
        }

        /* Ajuste para reducir espacio entre el círculo y el formulario */
        form {
            margin-top: 70px; /* Reducido de 60px a 10px para acercar el formulario al círculo */
        }

    </style>
</head>
<body>

    <header>
        <a href="../index.php">Index</a>
        <a href="registro.php">Registrar</a>
    </header>

    <div class="caja">
        <!-- Círculo encima del formulario -->
        <div class="circulo"></div>
        
        <form method="post">
            <h2>Inicio de Sesión</h2>
    
            <?php if (!empty($errores['error'])): ?>
                <p class="error"><?php echo $errores['error']; ?></p>
            <?php endif; ?>
    
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" style="height: 16px;width: 280px;" >
    
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" style="height: 16px;width: 280px;">
    
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>