<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer-link {
            color: white;
            text-decoration: none;
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

    <!-- Contenido Principal -->
    <div class="content">
        <!-- Aquí va tu contenido -->
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. <a href="#" class="footer-link">Desarrollado por</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
