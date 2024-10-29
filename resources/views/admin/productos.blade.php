<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .header {
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            text-align: center;
            border-bottom: 3px solid #0056b3;
        }
        .nav {
            background-color: #333;
            padding: 10px 20px;
        }
        .nav a {
            color: white;
            padding: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .nav a:hover {
            background-color: #575757;
        }
        .container {
            padding: 20px;
        }
        .product-card {
            margin: 10px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centrar contenido */
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05); /* Efecto de hover */
        }
        .product-card img {
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: none; /* Ocultar por defecto */
        }
        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 50%;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            font-size: 24px;
        }
        #productForm {
            position: fixed;
            bottom: 100px;
            right: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none; /* Ocultar por defecto */
        }
        #productForm input, #productForm textarea {
            margin-bottom: 10px;
        }
        #productForm button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Productos</h1>
    </div>
    <div class="nav">
        <a href="{{ route('admin.home') }}">Inicio</a>
        <a href="{{ route('admin.productos') }}">Productos</a>
        <a href="{{ route('admin.empleados') }}">Empleados</a>
        <a href="{{ route('admin.ventas') }}">Ventas</a>
    </div>

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="product-card">
                        <h5>{{ $product->nombre }}</h5>
                        <p>{{ $product->descripcion }}</p>
                        <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        @if($product->imagen)
                            <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" style="max-width: 100%;">
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                        <div>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="alert alert-success" id="successMessage">¡Producto agregado con éxito!</div>

    <div class="floating-button" onclick="toggleForm()">
        <i class="fas fa-plus"></i>
    </div>

    <div id="productForm">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" onsubmit="showSuccessMessage(event)">
            @csrf
            <h5>Agregar Producto</h5>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" accept="image/*" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
            <button type="button" class="btn btn-secondary" onclick="toggleForm()">Cerrar</button>
        </form>
    </div>

    <script>
        function toggleForm() {
            const productForm = document.getElementById('productForm');
            productForm.style.display = productForm.style.display === 'none' ? 'block' : 'none';
        }

        function showSuccessMessage(event) {
            event.preventDefault(); // Evitar que el formulario se envíe de inmediato
            const form = event.target; // Obtener el formulario
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block'; // Mostrar el mensaje de éxito
            setTimeout(() => {
                successMessage.style.display = 'none'; // Ocultar después de 3 segundos
            }, 3000);
            form.submit(); // Enviar el formulario
        }
    </script>
</body>
</html>