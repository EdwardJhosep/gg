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

        .search-box {
            margin-bottom: 20px;
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

        .chat-box {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 10px;
        }

        .chat-message {
            margin: 5px 0;
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

        <div class="search-box">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar productos..." onkeyup="filterProducts()">
        </div>
        <div class="row" id="productList">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 product" data-name="{{ strtolower($product->nombre) }}" data-product-id="{{ $product->id }}">
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

        <!-- Formulario Flotante -->
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
    </div>

    <!-- Footer -->
    <footer class="text-center py-4">
        <p>© 2024 Hilo Rojo. Todos los derechos reservados.</p>
        <a href="#" class="footer-link">Política de privacidad</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Botón de Robot -->
    <button class="robot-btn">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/robot.png" class="robot-icon" alt="Robot">
    </button>

<!-- Botón de Robot -->
<button class="robot-btn" onclick="toggleChatbot()">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/robot.png" class="robot-icon" alt="Robot">
</button>

<!-- Botón de Robot -->
<button class="robot-btn" onclick="toggleChatbot()">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/robot.png" class="robot-icon" alt="Robot">
</button>

<div class="floating-form" id="chatbot">
    <button class="btn-close" onclick="closeChatbot()">&times;</button> <!-- Botón de cerrar como X -->
    <h5>Chatbot</h5>
    <div class="chat-box" id="chatBox">
        <!-- Mensajes del chatbot aparecerán aquí -->
    </div>
    <div class="input-group mb-3">
        <input type="text" id="chatInput" class="form-control" placeholder="Escribe un mensaje..." aria-label="Escribe un mensaje...">
        <button class="btn btn-primary" id="sendButton">Enviar</button>
    </div>
</div>

<script>
// Función para cerrar el formulario del chatbot
function closeChatbot() {
    document.getElementById('chatbot').style.display = 'none'; // Ocultar el formulario
}

// Función para alternar la visibilidad del chatbot
function toggleChatbot() {
    var chatbot = document.getElementById('chatbot');
    if (chatbot.style.display === 'none' || chatbot.style.display === '') {
        chatbot.style.display = 'block'; // Mostrar el chatbot
    } else {
        chatbot.style.display = 'none'; // Ocultar el chatbot
    }
}
</script>

<style>
.floating-form {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    padding: 15px;
    display: none; /* Oculto por defecto */
    z-index: 1000;
}

.btn-close {
    background: none;
    border: none;
    color: #dc3545; /* Color rojo para la X */
    font-size: 24px; /* Tamaño de la X */
    position: absolute;
    top: 10px;
    right: 15px;
    cursor: pointer;
    padding: 0;
}
.btn-close:hover {
    color: #c82333; /* Color más oscuro al pasar el mouse */
}
</style>



<style>
    .chat-box {
        max-height: 300px; /* Altura máxima del cuadro de chat */
        overflow-y: auto; /* Permitir desplazamiento vertical */
        border: 1px solid #ccc; /* Borde del cuadro de chat */
        padding: 10px; /* Espaciado interno */
        background-color: #f9f9f9; /* Color de fondo del cuadro de chat */
    }

    .chat-message {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }

    .chat-message img {
        width: 30px; /* Ajusta el tamaño de la imagen según sea necesario */
        height: 30px; /* Ajusta el tamaño de la imagen según sea necesario */
        border-radius: 50%; /* Para hacer que las imágenes sean circulares */
        margin-right: 10px; /* Espaciado entre la imagen y el mensaje */
    }

    .text-right {
        justify-content: flex-end; /* Alinear mensajes del usuario a la derecha */
    }

    .text-left {
        justify-content: flex-start; /* Alinear mensajes del bot a la izquierda */
    }
</style>

    <script>
const faqs = {
    // Minúsculas
    "hola": "¡Hola! ¿En qué puedo ayudarte hoy?",
    "ubicacion": "Nuestra dirección es Jr. Jirón Gral. Prado 326, Huánuco 10000.",
    "telefono": "Puedes contactar al 942 113 752 para más información.",
    "horario": "Estamos cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "más horarios": "Nuestros horarios son de lunes a sábado de 10 a.m. a 6 p.",
    "domingos cerrados": "Nuestros domingos están cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "¿cómo enviar envio delibery un pedido?": "Para enviar un pedido, sigue estos pasos: 1. Compra tus productos en Hilo Rojo. 2. Llena el formulario de contacto y selecciona tu dirección de envío. 3. Elige el método de envío y pago que prefieras. 4. Confirma tu pedido y paga. 5. Recibe tu pedido en la dirección que seleccionaste.",
    "¿cómo cancelar un pedido?": "Para cancelar un pedido, debes contactar al 942 113 752 y explicar tu razón de cancelación.",
    "¿cómo hacer un reclamo?": "Para hacer un reclamo, debes contactar al 942 113 752 y",
    "buenos días": "¡Buenos días! ¿Cómo puedo asistirte en tu búsqueda de regalos?",
    "buenas tardes": "¡Buenas tardes! Estoy aquí para ayudarte a encontrar el regalo perfecto.",
    "buenas noches": "¡Buenas noches! Si necesitas algo, no dudes en preguntar.",
    "¿qué tal?": "¡Todo bien! ¿Y tú? ¿Buscas algo en particular?",
    "¡saludos!": "¡Saludos! Estoy aquí para ayudarte con cualquier pregunta.",
    "¿cómo estás?": "Estoy aquí para ayudarte. ¿En qué puedo asistirte?",
    "¡qué alegría verte!": "¡Qué alegría que estés aquí! ¿Cómo puedo ayudarte hoy?",
    "¿cómo va todo?": "Todo bien por aquí, ¿y tú? ¿En qué puedo ayudarte?",
    "¡hola, amigo/a!": "¡Hola, amigo/a! Estoy aquí para asistirte en tus compras.",
    
    // Nuevas respuestas sobre productos
    "flores y plantas": "Ofrecemos una variedad de flores y plantas, incluyendo rosas, orquídeas y ficus.",
    "rosas": "Nuestras rosas son frescas y vienen en diferentes colores. ¡Perfectas para cualquier ocasión!",
    "orquídeas": "Las orquídeas son elegantes y hermosas, ideales para regalar o decorar tu hogar.",
    "ficus": "Los ficus son plantas de interior fáciles de cuidar que añaden un toque verde a cualquier espacio.",
    
    "regalos y sorpresas": "Tenemos una amplia gama de regalos y sorpresas, incluyendo peluches, chocolates y globos metálicos.",
    "peluches": "Nuestros peluches son adorables y vienen en varias formas y tamaños, perfectos para regalar.",
    "chocolates": "Ofrecemos chocolates de alta calidad, ideales para cualquier celebración o como un dulce detalle.",
    "globos metálicos": "Los globos metálicos son perfectos para fiestas y celebraciones, ¡hay muchos diseños disponibles!",
    
    "embalaje y presentación": "También tenemos opciones de embalaje y presentación, incluyendo listones, papel de regalo, bolsas y cajas.",
    "listones": "Los listones son perfectos para agregar un toque especial a tus regalos.",
    "papel de regalo": "Contamos con una variedad de papeles de regalo en diferentes diseños y colores.",
    "bolsas y cajas": "Ofrecemos bolsas y cajas para presentar tus regalos de manera elegante y práctica.",

    // Información de servicios
    "opciones de servicio": "Ofrecemos entrega el mismo día para tu comodidad.",
    "dirección": "Nuestra dirección es Jr. Jirón Gral. Prado 326, Huánuco 10000.",
    "teléfono": "Puedes llamarnos al 942 113 752 para más información.",
    "horario": "Estamos cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "más horarios": "Nuestros horarios son de lunes a sábado de 10 a.m. a 6 p.m. y domingos cerrados.",

    // Mayúsculas
    "HOLA": "¡Hola! ¿En qué puedo ayudarte hoy?",
    "UBICACION": "Nuestra dirección es Jr. Jirón Gral. Prado 326, Huánuco 10000.",
    "TELEFONO": "Puedes contactar al 942 113 752 para más información.",
    "HORARIO": "Estamos cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "MÁS HORARIOS": "Nuestros horarios son de lunes a sábado de 10 a.m. a 6 p.",
    "DOMINGOS CERRADOS": "Nuestros domingos están cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "¿CÓMO ENVIAR ENVIO DELIBERY UN PEDIDO?": "Para enviar un pedido, sigue estos pasos: 1. Compra tus productos en Hilo Rojo. 2. Llena el formulario de contacto y selecciona tu dirección de envío. 3. Elige el método de envío y pago que prefieras. 4. Confirma tu pedido y paga. 5. Recibe tu pedido en la dirección que seleccionaste.",
    "¿CÓMO CANCELAR UN PEDIDO?": "Para cancelar un pedido, debes contactar al 942 113 752 y explicar tu razón de cancelación.",
    "¿CÓMO HACER UN RECLAMO?": "Para hacer un reclamo, debes contactar al 942 113 752 y",
    "BUENOS DÍAS": "¡Buenos días! ¿Cómo puedo asistirte en tu búsqueda de regalos?",
    "BUENAS TARDES": "¡Buenas tardes! Estoy aquí para ayudarte a encontrar el regalo perfecto.",
    "BUENAS NOCHES": "¡Buenas noches! Si necesitas algo, no dudes en preguntar.",
    "¿QUÉ TAL?": "¡Todo bien! ¿Y tú? ¿Buscas algo en particular?",
    "¡SALUDOS!": "¡Saludos! Estoy aquí para ayudarte con cualquier pregunta.",
    "¿CÓMO ESTÁS?": "Estoy aquí para ayudarte. ¿En qué puedo asistirte?",
    "¡QUÉ ALEGRÍA VERTE!": "¡Qué alegría que estés aquí! ¿Cómo puedo ayudarte hoy?",
    "¿CÓMO VA TODO?": "Todo bien por aquí, ¿y tú? ¿En qué puedo ayudarte?",
    "¡HOLA, AMIGO/A!": "¡Hola, amigo/a! Estoy aquí para asistirte en tus compras.",
    
    // Nuevas respuestas sobre productos
    "FLORES Y PLANTAS": "Ofrecemos una variedad de flores y plantas, incluyendo rosas, orquídeas y ficus.",
    "ROSAS": "Nuestras rosas son frescas y vienen en diferentes colores. ¡Perfectas para cualquier ocasión!",
    "ORQUÍDEAS": "Las orquídeas son elegantes y hermosas, ideales para regalar o decorar tu hogar.",
    "FICUS": "Los ficus son plantas de interior fáciles de cuidar que añaden un toque verde a cualquier espacio.",
    
    "REGALOS Y SORPRESAS": "Tenemos una amplia gama de regalos y sorpresas, incluyendo peluches, chocolates y globos metálicos.",
    "PELUCHES": "Nuestros peluches son adorables y vienen en varias formas y tamaños, perfectos para regalar.",
    "CHOCOLATES": "Ofrecemos chocolates de alta calidad, ideales para cualquier celebración o como un dulce detalle.",
    "GLOBOS METÁLICOS": "Los globos metálicos son perfectos para fiestas y celebraciones, ¡hay muchos diseños disponibles!",
    
    "EMBALAJE Y PRESENTACIÓN": "También tenemos opciones de embalaje y presentación, incluyendo listones, papel de regalo, bolsas y cajas.",
    "LISTONES": "Los listones son perfectos para agregar un toque especial a tus regalos.",
    "PAPEL DE REGALO": "Contamos con una variedad de papeles de regalo en diferentes diseños y colores.",
    "BOLSAS Y CAJAS": "Ofrecemos bolsas y cajas para presentar tus regalos de manera elegante y práctica.",

    // Información de servicios
    "OPCIONES DE SERVICIO": "Ofrecemos entrega el mismo día para tu comodidad.",
    "DIRECCIÓN": "Nuestra dirección es Jr. Jirón Gral. Prado 326, Huánuco 10000.",
    "TELÉFONO": "Puedes llamarnos al 942 113 752 para más información.",
    "HORARIO": "Estamos cerrados, pero abrimos a las 10 a.m. del miércoles. ¡Te esperamos!",
    "MÁS HORARIOS": "Nuestros horarios son de lunes a sábado de 10 a.m. a 6 p.m. y domingos cerrados."
};


function filterProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        const productName = product.getAttribute('data-name').toLowerCase();
        product.style.display = productName.includes(searchInput) ? '' : 'none';
    });
}

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

function calculateTotal() {
        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('total').value;
        document.getElementById('total').value = (quantity * price).toFixed(2);
    }

document.querySelector('.robot-btn').addEventListener('click', function() {
    const chatbot = document.getElementById('chatbot');
    chatbot.classList.toggle('show');
});

document.getElementById('sendButton').addEventListener('click', function() {
    const input = document.getElementById('chatInput');
    const userMessage = input.value.trim();

    if (userMessage) {
        addMessageToChat('Tú: ' + userMessage, 'text-right');

        // Retraso de 3 segundos antes de enviar la respuesta del chatbot
        setTimeout(() => {
            const response = getChatbotResponse(userMessage);
            addMessageToChat('Bot: ' + response.text, 'text-left');

            if (response.suggestions.length > 0) {
                addMessageToChat('¿PREGUNTA SUGERIDAD SI NO ES LA RESPUESTA ADECUADA: ' + response.suggestions.join(', ') + '?', 'text-left');
            }
        }, 3000); // 3000 milisegundos = 3 segundos

        input.value = ''; // Limpiar el campo de entrada
    } else {
        alert("Por favor, escribe un mensaje antes de enviar.");
    }
});


function addMessageToChat(message, alignment, isBot = false) {
    const chatBox = document.getElementById('chatBox');
    const messageDiv = document.createElement('div');
    messageDiv.className = 'chat-message ' + alignment;

    // Verificar si isBot se recibe correctamente
    console.log("isBot:", isBot);

    // Crear imagen según el remitente (bot o usuario)
    const img = document.createElement('img');
    img.src = isBot ? '/imagenes/chatbot.png' : '/imagenes/usuario.png'; // Asegúrate de que las rutas sean correctas
    img.className = 'chat-avatar'; // Clase para el estilo de la imagen
    messageDiv.appendChild(img);

    // Crear el mensaje de texto
    const textDiv = document.createElement('div');
    textDiv.className = 'message-text'; // Clase para el estilo del mensaje
    textDiv.textContent = message;
    messageDiv.appendChild(textDiv);

    // Añadir el mensaje al chatBox y hacer scroll hacia abajo
    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
}



function normalizeString(str) {
    return str.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

function getChatbotResponse(userMessage) {
    const normalizedUserMessage = normalizeString(userMessage);
    let bestMatch = '';
    let highestMatchCount = 0;
    let suggestions = [];

    for (const question in faqs) {
        const normalizedQuestion = normalizeString(question);
        const score = calculateSimilarity(normalizedUserMessage, normalizedQuestion);
        if (score > highestMatchCount) {
            highestMatchCount = score;
            bestMatch = faqs[question];
            suggestions = [question]; // Reiniciar sugerencias con la mejor coincidencia
        } else if (score > 0) {
            suggestions.push(question); // Agregar a las sugerencias si hay coincidencia
        }
    }

    return { text: bestMatch || "Lo siento, no tengo una respuesta para eso.", suggestions };
}

function calculateSimilarity(userMessage, question) {
    const userWords = userMessage.split(' ');
    let matchCount = 0;

    userWords.forEach(userWord => {
        if (question.includes(userWord)) {
            matchCount++;
        }
    });

    return matchCount / Math.max(1, question.split(' ').length); // Evitar división por cero
}
</script>


</body>
</html>
