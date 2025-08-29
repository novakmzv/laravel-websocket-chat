<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en Tiempo Real</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4 max-w-4xl">

    <h1 class="text-3xl font-bold text-center mb-6">Chat en Tiempo Real</h1>

    <div id="messages" class="bg-white rounded-lg shadow-lg p-4 h-96 overflow-y-auto mb-4">

    </div>

    <form id="chat-form" class="flex gap-2">
        <input
            autocomplete="off"
            type="text" id="user" placeholder="Tu nombre"
            class="px-4 py-2 border rounded-lg flex-shrink-0 w-32">
        <input
            autocomplete="off"
            type="text" id="message" placeholder="Escribe tu mensaje..."
            class="px-4 py-2 border rounded-lg flex-1">
        <button type="submit"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Enviar
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('chat-form');
        const messagesDiv = document.getElementById('messages');
        const userInput = document.getElementById('user');
        const messageInput = document.getElementById('message');

        window.Echo.channel('chat')
            .listen('MessageSent', (e) => {
                displayMessage(e.user, e.message, e.timestamp);
            });

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const userData = userInput.value.trim();
            const messageData = messageInput.value.trim();

            if (userData && messageData) {
                sendMessage(userData, messageData);
                messageInput.value = '';
            }
        });

        function sendMessage(user, message) {
            fetch('/api/chat/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    user: user,
                    message: message
                })
            });
        }

        function displayMessage(user, message, timestamp) {
            const messageElement = document.createElement('div');
            messageElement.className = 'mb-3 p-3 bg-gray-50 rounded';
            messageElement.innerHTML = `
            <div class="font-semibold text-blue-600">${user}</div>
            <div class="text-gray-800">${message}</div>
            <div class="text-xs text-gray-500 mt-1">${new Date(timestamp).toLocaleTimeString()}</div>
        `;
            messagesDiv.appendChild(messageElement);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    });
</script>
</body>
</html>
