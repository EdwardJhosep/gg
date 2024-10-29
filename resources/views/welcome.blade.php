<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilo Rojo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .navbar-brand h2 {
            font-weight: bold;
        }

        .whatsapp-btn,
        .robot-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            font-size: 24px;
            cursor: pointer;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .robot-btn {
            bottom: 80px;
            background-color: #007bff;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
        }

        .robot-btn:hover {
            background-color: #0056b3;
        }

        .whatsapp-icon,
        .robot-icon {
            width: 24px;
            height: 24px;
        }

        header {
            background: linear-gradient(to right, #c94b4b, #4b134f);
            color: white;
            text-align: center;
            padding: 50px 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .category-card {
            margin-bottom: 30px;
        }

        .category-image {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2>Hilo Rojo</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav">
                    <a href="{{ route('inicio') }}" class="nav-link active text-dark">Inicio</a>
                    <a href="{{ route('productos') }}" class="nav-link text-dark">Compra de Productos</a>
                    <a href="{{ route('nosotros') }}" class="nav-link text-dark">Acerca de Nosotros</a>
                    <a href="{{ route('login') }}" class="nav-link text-dark">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <header>
        <h1>Hilo Rojo</h1>
        <p>Ofrecemos detalles únicos y especiales para cada momento importante.</p>
    </header>

    <div class="content">
        <!-- Contenido principal aquí -->
        <div class="container">
            <h2 class="text-center my-4">Bienvenidos a Hilo Rojo</h2>
            <p>Aquí encontrarás los mejores productos para hacer de tus eventos algo memorable. Explora nuestras categorías y encuentra lo que necesitas.</p>
            
            <div class="row">
                <!-- Contenedor para Flores y Plantas -->
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="/imagenes/rosas.png" alt="Flores y Plantas" class="card-img-top category-image">
                        <div class="card-body">
                            <h5 class="card-title">Flores y Plantas</h5>
                            <ul>
                                <li>Rosas</li>
                                <li>Orquídeas</li>
                                <li>Ficus</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contenedor para Regalos y Sorpresas -->
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="/imagenes/regalos.png" alt="Regalos y Sorpresas" class="card-img-top category-image">
                        <div class="card-body">
                            <h5 class="card-title">Regalos y Sorpresas</h5>
                            <ul>
                                <li>Peluches</li>
                                <li>Chocolates</li>
                                <li>Globos metálicos</li>
                                <li>Accesorios</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contenedor para Embalaje y Presentación -->
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="/imagenes/embalaje.png" alt="Embalaje y Presentación" class="card-img-top category-image">
                        <div class="card-body">
                            <h5 class="card-title">Embalaje y Presentación</h5>
                            <ul>
                                <li>Listones</li>
                                <li>Papel de regalo</li>
                                <li>Bolsas y Cajas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. <a href="#" class="footer-link">Desarrollado por</a></p>
    </footer>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://wa.me/56987654321" target="_blank" class="whatsapp-btn">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="whatsapp-icon">
    </a>

    <!-- Botón flotante de Robot (Chatbot) -->
    <a class="robot-btn" title="Chat con nuestro Robot" onclick="openChatbot()">
        <img src="/imagenes/chatbot.png" alt="Robot" class="robot-icon">
    </a>

    <script>
        function openChatbot() {
            alert('¡Bienvenido al Chatbot! ¿En qué puedo ayudarte?');
            // Aquí puedes integrar la funcionalidad real del chatbot
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
