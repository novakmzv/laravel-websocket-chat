<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en Tiempo Real</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4 max-w-4xl">

    <h1 class="text-3xl font-bold text-center mb-6">Chat en Tiempo Real</h1>

    <div id="messages" class="bg-white rounded-lg shadow-lg p-4 h-96 overflow-y-auto mb-4">

    </div>

    <form id="chat-form" class="flex gap-2">
        <input type="text" id="user" placeholder="Tu nombre"
               class="px-4 py-2 border rounded-lg flex-shrink-0 w-32">
        <input type="text" id="message" placeholder="Escribe tu mensaje..."
               class="px-4 py-2 border rounded-lg flex-1">
        <button type="submit"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Enviar
        </button>
    </form>
</div>
</body>
</html>
