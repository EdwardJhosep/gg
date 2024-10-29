<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
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
            margin-bottom: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .info {
            margin-top: 20px;
        }

        .info-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 20px;
        }

        iframe {
            border-radius: 8px;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icon {
            color: white;
            margin: 0 10px;
            font-size: 20px;
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
        <div class="container">
            <div class="info-card">
                <p>Tienda de regalos en Huánuco</p>
                <p><strong>Opciones de servicio:</strong> Ofrece entrega el mismo día</p>
                <p><strong>Dirección:</strong> Jr. Jirón Gral. Prado 326, Huánuco 10000</p>
                <p><strong>Teléfono:</strong> 942 113 752</p>
                <p><strong>Horario:</strong> Cierra pronto ⋅ 8 p.m. ⋅ Abre a las 10 a.m. del mar</p>
            </div>
            <h3>Cómo llegar</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d588.5759068163253!2d-76.24417851215046!3d-9.927656712636125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a7c3f98d99951f%3A0x5f038db0b730b3ee!2sHilo%20Rojo%20Tienda%20de%20Regalos%20y%20Detalles!5e1!3m2!1ses-419!2spe!4v1730165086329!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. <a href="#" class="footer-link">Desarrollado por</a></p>
        <div class="social-icons">
            <a href="https://www.facebook.com/tu_pagina" target="_blank" class="social-icon"><i class="bi bi-facebook"></i> Facebook</a>
            <a href="https://www.instagram.com/suarez_barberstudio" target="_blank" class="social-icon"><i class="bi bi-instagram"></i> Instagram</a>
            <a href="https://wa.me/51942113752" target="_blank" class="social-icon"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</body>
</html>
