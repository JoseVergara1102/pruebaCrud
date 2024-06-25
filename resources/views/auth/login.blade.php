<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <x-guest-layout>
        <x-authentication-card class="bg-white shadow-md rounded-lg max-w-md w-full">
            <x-slot name="logo">
                <i class="fas fa-rocket fa-5x text-indigo-600"></i>
            </x-slot>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4 px-8 py-6">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Correo Electrónico') }}" class="text-gray-600" />
                    <x-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Contraseña') }}" class="text-gray-600" />
                    <x-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-gray-700">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 rounded focus:ring-indigo-500" />
                        <span class="ml-2 text-sm">{{ __('Recordar') }}</span>
                    </label>
                </div>

                <div>
                    <x-button class="w-full bg-indigo-500 hover:bg-indigo-600">
                        {{ __('Ingresar') }}
                    </x-button>
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu Contraseña?') }}
                    </a>
                </div>
            </form>

            <div class="mt-6 text-sm text-center">
                <p class="text-gray-600">
                    {{ __("¿No Tienes Cuenta?") }}
                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('register') }}">
                        {{ __('Registrar') }}
                    </a>
                </p>
            </div>
        </x-authentication-card>
    </x-guest-layout>
</body>
</html>
