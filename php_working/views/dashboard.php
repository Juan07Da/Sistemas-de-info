<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


// Ruta absoluta
$ruta_absoluta = $_SESSION['user_imagen'];
// Convertir a ruta relativa
$ruta_relativa = str_replace('C:/xampp/htdocs/php_working/imagen/', '', $ruta_absoluta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h2 {
            color: #bb86fc;
            margin: 10px 0;
        }
        p {
            font-size: 18px;
            margin: 5px 0;
        }
        img {
            width: 100px; /* Ajusta el tamaño según sea necesario */
            height: 100px; /* Ajusta el tamaño según sea necesario */
            border-radius: 50%; /* Hace la imagen circular */
            object-fit: cover; /* Mantiene la proporción de la imagen */
            border: 2px solid #bb86fc; /* Borde alrededor de la imagen */
            margin-bottom: 15px; /* Espacio debajo de la imagen */
        }
        a {
            color: #bb86fc;
            text-decoration: none;
            padding: 10px;
            border: 1px solid #bb86fc;
            border-radius: 5px;
            margin: 5px;
            display: inline-block; /* Para que los enlaces se comporten como botones */
        }
        a:hover {
            background-color: #bb86fc;
            color: #121212;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="../imagen/<?php echo htmlspecialchars($ruta_relativa); ?>" alt="Imagen de usuario no disponible">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
        <p>Tu rol es: <?php echo htmlspecialchars($_SESSION['user_role']); ?></p>
        <p>Tu correo es: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        
        <a href="admin.php">Administración</a>
        <a href="../logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
