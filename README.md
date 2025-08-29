# Chat en Tiempo Real con Laravel y Pusher 🚀

Una aplicación de chat en tiempo real construida con Laravel 12, Pusher WebSockets y Tailwind CSS que permite conversaciones instantáneas entre múltiples usuarios.


## Tecnologías Utilizadas 🔧

- **Backend**: Laravel 12, PHP 8.4+
- **Frontend**: Blade Templates, Tailwind CSS, JavaScript vanilla
- **WebSockets**: Pusher Channels
- **Procesamiento**: Sistema de colas de Laravel
- **Build Tools**: Vite

## Requisitos Previos 📝

- PHP 8.4+ (probado con PHP 8.4.8)
- Composer 2.8+ (probado con Composer 2.8.9)
- Node.js 20.19+ o superior
- MySQL
- Cuenta gratuita en [Pusher](https://pusher.com)

## Instalación 📦️

### 1. Clonar el repositorio
```bash
git clone https://github.com/novakmzv/laravel-websocket-chat.git
cd laravel-websocket-chat
```

### 2. Instalar dependencias
```bash
# Dependencias de PHP
composer install

# Dependencias de Node.js
npm install
```

### 3. Configurar entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configurar base de datos
Edita el archivo `.env` con tus credenciales de MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_websocket_chat
DB_USERNAME=root
DB_PASSWORD=
```

Crear la base de datos y ejecutar migraciones:
```bash
php artisan migrate
```

### 5. Configurar Pusher
1. Crea una cuenta en [Pusher](https://pusher.com)
2. Crea una nueva aplicación de tipo "Channels"
3. Copia las credenciales a tu archivo `.env`:

```env
BROADCAST_CONNECTION=pusher

PUSHER_APP_ID=tu_app_id
PUSHER_APP_KEY=tu_key
PUSHER_APP_SECRET=tu_secret
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=tu_cluster

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## Ejecutar la Aplicación ⚡️

**Necesitas 3 terminales abiertas simultáneamente:**

### Terminal 1 - Servidor Laravel
```bash
php artisan serve
```

### Terminal 2 - Procesador de Colas
```bash
php artisan queue:work
```

### Terminal 3 - Servidor de Desarrollo (Vite)
```bash
npm run dev
```

## Uso 🧪

1. Abre tu navegador en `http://localhost:8000/chat`
2. Para probar el tiempo real, abre múltiples pestañas/ventanas con la misma URL
3. Ingresa tu nombre y mensaje
4. Los mensajes aparecerán instantáneamente en todas las pestañas abiertas

## Estructura del Proyecto 🧱

```
app/
├── Events/
│   └── MessageSent.php          # Evento de mensaje enviado
├── Http/
│   ├── Controllers/Api/
│   │   └── ChatController.php   # Controlador API del chat
│   └── Requests/
│       └── StoreChatMessageRequest.php  # Validación de mensajes
resources/
├── views/
│   └── chat/
│       └── index.blade.php      # Vista principal del chat
└── js/
    ├── app.js                   # Aplicación principal
    ├── bootstrap.js             # Configuración base
    └── echo.js                  # Configuración de Echo/Pusher
routes/
├── api.php                      # Rutas API
└── web.php                      # Rutas web
```


## 🤝 Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/nueva-caracteristica`)
3. Commit tus cambios (`git commit -am 'Agregar nueva característica'`)
4. Push a la rama (`git push origin feature/nueva-caracteristica`)
5. Crear un Pull Request

---

**Desarrollado con ❤️**
