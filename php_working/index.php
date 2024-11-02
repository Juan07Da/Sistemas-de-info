<?php
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Bienvenido</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background: linear-gradient(150deg, #013750, #6e1e62);
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color: #ffffff;
        }

    
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .conteiner_bienvenida {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
            display: flex;
            flex-direction: column;
            margin-left: 100px;

        }
        .animaciones{
            animation: fadeIn 2s ease-in-out;
            margin-left: 130px;
            display: flex;
            justify-content: space-between;
        }
        .ubi_patico{
            display: flex;
            flex-direction: column;
            justify-content: end;


        }
        .patico{
            width: 100px;
                height: 200px;
                background-image: url('./imagen/patico.gif');
                background-size: cover;
                background-position: center;
                top: 0px;
                left: 50%;
                transform: translateX(-50%);
                margin-left: 90px;

        }
        .bailando{
                width: 200px;
                height: 400px;
                background-image: url('./imagen/baila.gif');
                background-size: cover;
                background-position: center;
                top: 0px;
                left: 50%;
                transform: translateX(-50%);
                

            }


        h1 {
            font-size: 3rem;
            letter-spacing: 5px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            animation: float 3s infinite ease-in-out;
        }

        p {
            margin-top: 20px;
            font-size: 1.2rem;
            opacity: 0.8;
        }

        .boton {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 1rem;
            font-weight: bold;
            color: #013750;
            background-color: #ffffff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .boton:hover {
            background-color: #013750;
            color: #ffffff;
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

    <div class="conteiner_bienvenida">
            <h1>! Bienvenido !</h1>
            <p>Registrate o inicia secion con nosotros</p>
            <button class="boton" onclick=Login() >Inciar Sesion</button>
            <button class="boton" onclick=Registro() >Registrarce</button>
    </div>
    
    <div class="animaciones">
            <div class="bailando"></div>
            <div class="ubi_patico">
               <div class="patico"></div> 
            </div>
            
    </div>

    

    <script>
        function Login() {
            window.location.href = './views/login.php'
        }
        function Registro() {
            window.location.href = './views/registro.php'
        }

    </script>
</body>
</html>


