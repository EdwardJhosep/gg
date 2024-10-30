<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            background-color: white;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .floating-form {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            display: none; /* Oculto por defecto */
            z-index: 1001;
        }

        .floating-form.show {
            display: block;
        }

        .search-box {
            margin-bottom: 20px;
        }

        .chatbot-message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .chatbot-success {
            background-color: #d4edda;
            color: #155724;
        }

        .chatbot-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .loading-message {
            background-color: #e2e3e5;
            color: #856404;
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

    <div class="container content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row" id="productList">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 product" data-product-id="{{ $product->id }}">
                    <div class="product-card">
                        <h5>{{ $product->nombre }}</h5>
                        <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="img-fluid">
                        <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <p>{{ $product->descripcion }}</p>
                        <button class="btn btn-primary compare-btn" data-price="{{ $product->precio }}">Comparar</button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Formulario Flotante para comparar productos -->
        <div class="floating-form" id="compareForm">
            <h5>Comparar Producto</h5>
            <form id="formCompare" action="{{ route('ventas.store') }}" method="POST">
                @csrf <!-- Token CSRF -->
                <input type="hidden" name="product_id" id="productId"> <!-- Para almacenar el ID del producto -->
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="text" class="form-control" name="dni" id="dni" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="quantity" value="1" min="1" required oninput="calculateTotal()">
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total:</label>
                    <input type="text" class="form-control" name="total" id="total" readonly>
                </div>
                <button type="button" class="btn btn-secondary" onclick="closeForm()">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <!-- Formulario Flotante para búsqueda -->
        <div class="floating-form" id="searchForm">
            <h5>Asitente de compra inteligente</h5>
            <div class="search-box">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar productos..." onkeyup="filterProducts()">
            </div>
            <div id="chatbotMessage" class="chatbot-message"></div> <!-- Área para mensajes del chatbot -->
            <button type="button" class="btn btn-secondary" onclick="closeSearchForm()">Cerrar</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4">
        <p>© 2024 Hilo Rojo. Todos los derechos reservados.</p>
        <a href="#" class="footer-link">Política de privacidad</a>
    </footer>
    <button class="robot-btn">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/robot.png" class="robot-icon" alt="Robot Icon">
    </button>
    <button class="whatsapp-btn">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" class="whatsapp-icon" alt="WhatsApp Icon">
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.compare-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.closest('.product').getAttribute('data-product-id');
                const productPrice = this.getAttribute('data-price');

                document.getElementById('productId').value = productId;
                document.getElementById('total').value = productPrice;
                document.getElementById('compareForm').classList.add('show');
            });
        });

        function closeForm() {
            document.getElementById('compareForm').classList.remove('show');
        }

        function filterProducts() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const products = document.querySelectorAll('.product');
        let found = false; // Variable para verificar si se encontró algún producto

        // Crear un nuevo mensaje de "cargando" para la búsqueda actual
        const chatbotMessage = document.getElementById('chatbotMessage');
        const loadingMessage = document.createElement('div');
        loadingMessage.classList.add('chatbot-message', 'loading-message');
        loadingMessage.innerText = 'Cargando...';
        chatbotMessage.appendChild(loadingMessage);

        // Simular un retraso para mostrar el mensaje de carga
        setTimeout(() => {
            products.forEach(product => {
                const productName = product.querySelector('h5').innerText.toLowerCase();
                if (productName.includes(searchInput)) {
                    product.style.display = '';
                    found = true; // Se encontró un producto
                } else {
                    product.style.display = 'none';
                }
            });

            // Crear un mensaje de éxito o error para la búsqueda actual
            const resultMessage = document.createElement('div');
            resultMessage.classList.add('chatbot-message');

            if (searchInput.trim() !== '') {
                if (found) {
                    resultMessage.classList.add('chatbot-success');
                    resultMessage.innerText = 'Producto(s) encontrado(s) para: "' + searchInput + '". ¡Sigue buscando!';
                } else {
                    resultMessage.classList.add('chatbot-error');
                    resultMessage.innerText = 'No se encontraron productos que coincidan con: "' + searchInput + '". Intenta otro término.';
                }
                chatbotMessage.appendChild(resultMessage); // Agregar el mensaje al historial
            }

            // Eliminar el mensaje de "cargando" una vez que se muestran los resultados
            loadingMessage.remove();
        }, 2000); // Retraso de 500 ms para simular carga
    }

    function closeSearchForm() {
        document.getElementById('searchForm').classList.remove('show');
    }

    // Botón flotante de robot
    document.querySelector('.robot-btn').addEventListener('click', function() {
        const searchForm = document.getElementById('searchForm');
        searchForm.classList.toggle('show'); // Alternar la visibilidad del formulario de búsqueda
    });

    function calculateTotal() {
        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('total').value;
        document.getElementById('total').value = (quantity * price).toFixed(2);
    }

    // Botón flotante de WhatsApp
    document.querySelector('.whatsapp-btn').addEventListener('click', function() {
        window.open('https://wa.me/51967463961', '_blank');
    });
    </script>
</body>
</html>
