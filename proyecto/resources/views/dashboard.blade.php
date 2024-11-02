<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Hardware de Computadoras</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #E0E0E0;
        }

        header {
            background: #1E1E1E;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            margin: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 10px;
        }

        nav ul li a:hover {
            background-color: #333;
        }

        .account-menu {
            position: relative;
        }

        .account-menu > a {
            cursor: pointer;
        }

        .account-menu ul {
            display: none;
            position: absolute;
            background-color: #1E1E1E;
            padding: 0;
            list-style: none;
            margin: 0;
            top: 100%;
            right: 0;
            width: 200px;
            border: 1px solid #333;
            z-index: 1;
            border-radius: 10px;
        }

        .account-menu:hover ul {
            display: block;
        }

        .account-menu ul li {
            width: 100%;
        }

        .account-menu ul li a {
            padding: 10px 15px;
            display: block;
            border-radius: 10px;
        }

        .account-menu ul li a:hover {
            background-color: #333;
        }

        main {
            padding: 20px;
        }

        .product-card {
            background: #1E1E1E;
            border: 1px solid #333;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        button {
            background-color: #2A52BE;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1A40A2;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #1E1E1E;
            color: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>TechnoCity</h1>
        <nav>
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#products">Productos</a></li>
                <li><a href="#about">Acerca de</a></li>
                <li><a href="#contact">Contacto</a></li>
                <li class="account-menu">
                    <a href="#">Cuenta</a>
                    <ul>
                        <li><a href="#profile">Perfil</a></li>
                        <li><a href="#logout">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Bienvenido a nuestra tienda</h2>
            <p>Aquí encontrarás los mejores componentes de hardware para tu computadora.</p>
        </section>

        <section id="products">
            <h2>Productos Destacados</h2>
            <div class="product-card">
                <h3>Placa Base</h3>
                <img src="motherboard.jpg" alt="Placa Base">
                <p>Placa madre ATX con soporte para procesadores Intel y AMD.</p>
                <button onclick="showDetails('motherboard')">Ver Detalles</button>
            </div>
            <div class="product-card">
                <h3>Tarjeta Gráfica</h3>
                <img src="graphics_card.jpg" alt="Tarjeta Gráfica">
                <p>Tarjeta gráfica con 8GB de VRAM para juegos en alta definición.</p>
                <button onclick="showDetails('graphics_card')">Ver Detalles</button>
            </div>
            <div class="product-card">
                <h3>Fuente de Poder</h3>
                <img src="power_supply.jpg" alt="Fuente de Poder">
                <p>Fuente de poder de 750W, certificación 80 PLUS Gold.</p>
                <button onclick="showDetails('power_supply')">Ver Detalles</button>
            </div>
        </section>

        <section id="about">
            <h2>Acerca de Nosotros</h2>
            <p>Somos una tienda especializada en la venta de componentes de hardware de computadoras.</p>
        </section>

        <section id="contact">
            <h2>Contacto</h2>
            <p>Puedes contactarnos a través de nuestro correo: ventas@tiendahardware.com</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Tienda de Hardware de Computadoras</p>
    </footer>

    <script>
        function showDetails(product) {
            alert("Detalles de " + product);
        }
    </script>
</body>
</html>
