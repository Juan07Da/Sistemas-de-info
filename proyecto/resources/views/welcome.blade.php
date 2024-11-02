<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechnoCity</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            background-color: #0e131f;
            color: white;
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1000px; /* Ancho máximo para la página */
        }
        .text-section {
            flex: 1;
            margin-right: 20px;
            text-align: left;
            display: flex;
            justify-content: center; /* Centrado vertical */
            flex-direction: column;
        }
        .title {
            font-size: 3rem; /* Tamaño de fuente reducido */
            font-weight: bold;
            margin-bottom: 15px; /* Margen inferior */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Sombra para el texto del título */
        }
        .buttons-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 50px; /* Margen izquierdo de 50px */
        }
        .label {
            font-size: 1.1rem; /* Tamaño de fuente reducido */
            margin-bottom: 10px;
        }
        .btn {
            background-color: #182e6e;
            color: white;
            border: none;
            padding: 12px 20px; /* Tamaño de botón reducido */
            margin: 10px 0;
            font-size: 1.1rem; /* Tamaño de fuente reducido */
            cursor: pointer;
            border-radius: 25px; /* Bordes más redondeados */
            transition: background-color 0.3s, transform 0.2s; /* Transición de fondo y transformación */
            text-align: center;
            text-decoration: none; /* Sin subrayado */
            width: 100%; /* Asegura que los botones sean del mismo ancho */
        }
        .btn:hover {
            background-color: #0e1f4c; /* Color más oscuro al pasar el mouse */
            transform: scale(1.05); /* Efecto de crecimiento al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-section">
            <div class="title">
                TechnoCity
            </div>
        </div>
        <div class="buttons-section">
            <div class="label">Selecciona el dispositivo de tu preferencia</div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
