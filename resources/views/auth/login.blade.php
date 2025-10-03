<!DOCTYPE html>
<html lang="es-BO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión - Fiesta Bolivia</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-dark-bg via-gray-900 to-dark-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo y título -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-2xl mb-4 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Fiesta Bolivia</h1>
            <p class="text-gray-400">Sistema de Gestión de Alquileres</p>
        </div>

        <!-- Credenciales de prueba -->
        <div class="bg-primary/10 border border-primary/30 rounded-xl p-4 mb-6">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-primary mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="text-sm font-medium text-primary mb-1">Credenciales de Prueba</p>
                    <p class="text-xs text-gray-400">Email: <span class="text-white font-mono">admin@fiestabolivia.com</span></p>
                    <p class="text-xs text-gray-400">Contraseña: <span class="text-white font-mono">password</span></p>
                </div>
            </div>
        </div>

        <!-- Tarjeta de login -->
        <div class="bg-card-bg rounded-2xl shadow-card p-8 border border-gray-800">
            <h2 class="text-2xl font-semibold text-white mb-6">Iniciar Sesión</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-4 bg-accent/10 border border-accent rounded-lg text-accent text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Correo Electrónico
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        autofocus 
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-dark-bg border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                        placeholder="correo@ejemplo.com"
                    />
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Contraseña
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password"
                        required 
                        autocomplete="current-password"
                        class="w-full px-4 py-3 bg-dark-bg border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                        placeholder="••••••••"
                    />
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="rounded border-gray-700 bg-dark-bg text-primary focus:ring-primary focus:ring-offset-gray-900"
                        />
                        <span class="ml-2 text-sm text-gray-300">Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-primary hover:text-blue-400 transition-colors">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full bg-primary hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-gray-900"
                >
                    Iniciar Sesión
                </button>
            </form>

            <!-- Registro -->
            @if (Route::has('register'))
                <div class="mt-6 text-center">
                    <p class="text-gray-400 text-sm">
                        ¿No tienes una cuenta? 
                        <a href="{{ route('register') }}" class="text-primary hover:text-blue-400 font-medium transition-colors">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} Fiesta Bolivia. Todos los derechos reservados.
            </p>
        </div>
    </div>
</body>
</html>
