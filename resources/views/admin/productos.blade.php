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
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .nav a:hover {
            background-color: #575757;
        }
        .menu-icon {
            display: none;
            cursor: pointer;
            font-size: 24px;
        }
        .nav-links {
            display: flex;
            flex-direction: row;
        }
        .nav-links.active {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            background-color: #333;
            z-index: 1000;
        }
        .nav-links a {
            padding: 10px;
            width: 100%;
            text-align: left;
        }
        .close-menu {
            display: none;
            cursor: pointer;
            color: white;
            padding: 14px 20px;
            position: absolute;
            right: 20px;
            top: 10px;
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .menu-icon {
                display: block;
            }
            .close-menu {
                display: block;
            }
        }
        .container {
            padding: 20px;
        }
        .product-card {
            margin: 15px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 400px;
            width: 100%; /* Ocupa el ancho completo del contenedor */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        .product-card img {
            border-radius: 8px;
            max-height: 150px;
            margin-bottom: 10px;
            width: 100%;
            object-fit: cover;
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
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
            display: none;
            width: 300px;
        }
        #productForm input, #productForm textarea {
            margin-bottom: 10px;
            width: 100%;
        }
        #productForm button {
            margin-top: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
@if(session('token'))
<script>
        // Si el token existe, se puede usar en el backend sin mostrarlo al usuario.
        // Puedes usarlo en el siguiente script o en tu lógica del lado del servidor.
        var token = "{{ session('token') }}";
    </script>
@else
    <script>
        window.location.href = "/login"; // Cambia la ruta según tu aplicación
    </script>
@endif
    <div class="header">
        <h1>Productos</h1>
    </div>
    <div class="nav">
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="nav-links" id="navLinks">
        <div class="close-menu" onclick="toggleMenu()">
            <i class="fas fa-times"></i>
        </div>
        <!-- Formulario para cerrar sesión -->

        <a href="{{ route('admin.home') }}">Inicio</a>
        <a href="{{ route('admin.productos') }}">Productos</a>
        <a href="{{ route('admin.empleados') }}">Empleados</a>
        <a href="{{ route('admin.ventas') }}">Ventas</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Salir</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="product-card">
                        <h5>{{ $product->nombre }}</h5>
                        <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}">
                        <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <p>{{ $product->descripcion }}</p>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="editProduct({{ $product }})">Editar</button>
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
            <h5 id="formTitle">Agregar Producto</h5>
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" accept="image/*" class="form-control">
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
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <button type="button" class="btn btn-secondary" onclick="toggleForm()">Cerrar</button>
        </form>
    </div>

    <script>
            function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }
        function toggleForm() {
            const productForm = document.getElementById('productForm');
            document.getElementById('formTitle').innerText = 'Agregar Producto';
            productForm.querySelector('input[name="_method"]').value = 'POST';
            productForm.querySelector('input[name="nombre"]').value = '';
            productForm.querySelector('input[name="stock"]').value = '';
            productForm.querySelector('input[name="precio"]').value = '';
            productForm.querySelector('textarea[name="descripcion"]').value = '';
            productForm.style.display = productForm.style.display === 'none' ? 'block' : 'none';
        }

        function editProduct(product) {
            document.getElementById('formTitle').innerText = 'Editar Producto';
            document.querySelector('input[name="nombre"]').value = product.nombre;
            document.querySelector('input[name="stock"]').value = product.stock;
            document.querySelector('input[name="precio"]').value = product.precio;
            document.querySelector('textarea[name="descripcion"]').value = product.descripcion;

            const form = document.querySelector('#productForm form');
            form.action = `/products/${product.id}`;
            form.method = 'POST';
            form.querySelector('input[name="_method"]').value = 'PUT';

            document.getElementById('productForm').style.display = 'block';
        }

        function showSuccessMessage(event) {
            event.preventDefault();
            const form = event.target;
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
            form.submit();
        }
    </script>
</body>
</html>
