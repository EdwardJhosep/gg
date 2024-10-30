<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilo Rojo - Tienda de Regalos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec;
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
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand h2 {
            font-weight: bold;
            color: #c94b4b;
        }

        header {
            background: linear-gradient(135deg, #ffb6c1, #c94b4b);
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-bottom: 20px;
        }

        .carousel {
            margin-top: 20px;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item img:hover {
            transform: scale(1.1);
        }

        .carousel-caption h3 {
            font-size: 2em;
            font-weight: bold;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
        }

        footer {
            background-color: #4b134f;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        .footer-link {
            color: #ffebee;
            text-decoration: none;
            margin: 0 10px;
        }

        .section-title {
            margin-top: 40px;
            font-weight: bold;
            font-size: 1.5em;
            text-align: center;
            color: #4b134f;
        }

        .category-title {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-size: 1.2em;
            color: #4b134f;
            transition: color 0.3s ease;
        }

        .category-card:hover .category-title {
            color: #c94b4b;
        }

        .category-card img {
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .category-card:hover img {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .whatsapp-icon {
            width: 50px;
            height: 50px;
            transition: transform 0.3s ease;
        }

        .whatsapp-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h2>Tienda De Regalo Hilo Rojo</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <div class="navbar-nav">
                    <a href="{{ route('inicio') }}" class="nav-link active text-dark">Inicio</a>
                    <a href="{{ route('productos') }}" class="nav-link text-dark">Productos</a>
                    <a href="{{ route('nosotros') }}" class="nav-link text-dark">Nosotros</a>
                    <a href="{{ route('login') }}" class="nav-link text-dark">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Encabezado -->
    <header>
        <h1>Bienvenidos a Hilo Rojo</h1>
        <p>Detalles únicos para cada ocasión especial.</p>
    </header>

    <!-- Carrusel de Imágenes -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/imagenes/1.png" alt="Imagen de flores y plantas">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Flores y Plantas</h3>
                    <p>Los detalles que marcan la diferencia.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/imagenes/2.png" alt="Imagen de regalos y sorpresas">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Regalos y Sorpresas</h3>
                    <p>Perfectos para cualquier ocasión.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/imagenes/3.png" alt="Imagen de embalaje y presentación">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Embalaje y Presentación</h3>
                    <p>Un toque especial para tus regalos.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Servicios -->
    <div class="container content">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="/imagenes/rosas.png" alt="Flores y Plantas" class="card-img-top">
                    <div class="card-body">
                        <h5 class="category-title">Flores y Plantas</h5>
                        <ul>
                            <li>Rosas</li>
                            <li>Orquídeas</li>
                            <li>Ficus</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="/imagenes/regalos.png" alt="Regalos y Sorpresas" class="card-img-top">
                    <div class="card-body">
                        <h5 class="category-title">Regalos y Sorpresas</h5>
                        <ul>
                            <li>Peluches</li>
                            <li>Chocolates</li>
                            <li>Globos metálicos</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="/imagenes/embalaje.png" alt="Regalos y Sorpresas" class="card-img-top">
                    <div class="card-body">
                        <h5 class="category-title">Embalaje y Presentación</h5>
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

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. Todos los derechos reservados.</p>
    </footer>

    <a href="https://wa.me/51992278319" target="_blank" class="whatsapp-btn">
        <img src="https://img.icons8.com/color/48/000000/whatsapp.png" class="whatsapp-icon" alt="WhatsApp">
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
