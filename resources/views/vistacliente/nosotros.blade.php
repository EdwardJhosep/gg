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
            background-color: #f9f2f2;
            color: #4b134f;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            background-color: #ffe8e8;
        }

        .navbar-brand h2 {
            font-weight: bold;
            color: #c94b4b;
        }

        .nav-link {
            color: #4b134f !important;
        }

        .nav-link:hover {
            color: #c94b4b !important;
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
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
        }

        .robot-btn {
            bottom: 80px;
            background-color: #c94b4b;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
        }

        .robot-btn:hover {
            background-color: #a83535;
        }

        header {
            background: linear-gradient(to right, #c94b4b, #4b134f);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-bottom: 20px;
        }

        footer {
            background-color: #4b134f;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
            padding: 10px;
        }

        .footer-link {
            color: #ffe8e8;
            text-decoration: none;
        }

        .info-card {
            background-color: #fff5f5;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            color: #4b134f;
        }

        .iframe-container {
        position: relative;
        width: 100%;
        height: 70vh; /* Ajusta la altura a un 70% de la altura del viewport */
        overflow: hidden; /* Evita que el contenido se desborde */
    }

    iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%; /* Asegura que el iframe use todo el espacio disponible */
        border: none; /* Elimina el borde del iframe */
        b

        .social-icons {
            margin-top: 10px;
        }

        .social-icon {
            color: white;
            margin: 0 10px;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .whatsapp-btn, .robot-btn {
                font-size: 18px;
                padding: 10px;
            }
            header {
                padding: 20px 10px;
            }
            .navbar-brand h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2>Hilo Rojo</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav">
                    <a href="{{ route('inicio') }}" class="nav-link active">Inicio</a>
                    <a href="{{ route('productos') }}" class="nav-link">Compra de Productos</a>
                    <a href="{{ route('nosotros') }}" class="nav-link">Acerca de Nosotros</a>
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="content container">
        <div class="info-card">
            <p>Tienda de regalos en Huánuco</p>
            <p><strong>Opciones de servicio:</strong> Ofrece entrega el mismo día</p>
            <p><strong>Dirección:</strong> Jr. Jirón Gral. Prado 326, Huánuco 10000</p>
            <p><strong>Teléfono:</strong> 942 113 752</p>
            <p><strong>Horario:</strong> Cierra pronto ⋅ 8 p.m. ⋅ Abre a las 10 a.m. del mar</p>
        </div>
        <!-- Sección de Onirix -->
        <div class="iframe-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d622.3304364170314!2d-76.24435667408923!3d-9.927525933361878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1731622734101!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. <a href="#" class="footer-link">Desarrollado por Luis Miguel Espinoza Laveriano</a></p>
        <div class="social-icons">
            <a href="https://www.facebook.com/tu_pagina" target="_blank" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/suarez_barberstudio" target="_blank" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="https://wa.me/51942113752" target="_blank" class="social-icon"><i class="bi bi-whatsapp"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</body>
</html>
