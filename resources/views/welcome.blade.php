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
            margin-bottom: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .search-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .search-result {
            margin-top: 10px;
            text-align: center; /* Centrar resultados */
        }

        .result-card {
    margin-bottom: 5px;
    font-size: 0.9em;
    text-align: center; /* Centrar el texto dentro de la tarjeta */
}

.result-card img {
    max-width: 150px; /* Tamaño de la imagen */
    height: auto;
    margin: 0 auto; /* Centrar la imagen */
}


        .created-at {
            font-size: 0.75em;
            color: #6c757d;
        }

        .category-card {
            margin-bottom: 30px;
        }

        .category-image {
            height: 200px;
            object-fit: cover;
        }

        .category-title {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 1.2em;
        }

        .section-title {
            margin-top: 40px;
            font-weight: bold;
            font-size: 1.5em;
            text-align: center;
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
        <h1>Tienda De Regalos Y Detalles Hilo Rojo</h1>
        <p>Ofrecemos detalles únicos y especiales para cada momento importante.</p>
    </header>

    <div class="content">
        <div class="container">
            <h2 class="text-center my-4">Bienvenidos a Hilo Rojo</h2>
            <p class="text-center">Aquí encontrarás los mejores productos para hacer de tus eventos algo memorable. Explora nuestras categorías y encuentra lo que necesitas.</p>
            
            <div class="search-container">
                <div class="search-box">
                    <h4 class="text-center">Buscar Venta por DNI</h4>
                    <form action="{{ route('buscar.venta') }}" method="GET" class="d-flex flex-column">
                        <input type="text" name="dni" class="form-control mb-2" placeholder="Ingresa el DNI" required>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <!-- Resultados de Búsqueda -->
                    <div class="search-result mt-3">
                        @if(isset($ventas) && count($ventas) > 0)
                            <h5 class="text-center">Resultados:</h5>
                            @foreach($ventas as $venta)
                                <div class="card result-card">
                                    <img src="{{ asset('storage/' . $venta->product->imagen) }}" alt="{{ $venta->product->nombre }}" class="card-img-top" width="100">
                                    <div class="card-body p-1">
                                        <h6 class="card-title">{{ $venta->product->nombre }}</h6>
                                        <p>Precio: ${{ number_format($venta->product->precio, 2) }}</p>
                                        <p class="created-at">Fecha: {{ $venta->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No se encontraron resultados.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Servicios -->
            <h2 class="section-title">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="/imagenes/rosas.png" alt="Flores y Plantas" class="card-img-top category-image">
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
                        <img src="/imagenes/regalos.png" alt="Regalos y Sorpresas" class="card-img-top category-image">
                        <div class="card-body">
                            <h5 class="category-title">Regalos y Sorpresas</h5>
                            <ul>
                                <li>Peluches</li>
                                <li>Chocolates</li>
                                <li>Globos metálicos</li>
                                <li>Accesorios</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="/imagenes/embalaje.png" alt="Embalaje y Presentación" class="card-img-top category-image">
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
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date('Y'); ?> Hilo Rojo. Todos los derechos reservados.</p>
    </footer>

    <a href="https://wa.me/51992278319" target="_blank" class="whatsapp-btn">
        <img src="https://img.icons8.com/color/48/000000/whatsapp.png" class="whatsapp-icon" alt="WhatsApp">
    </a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
