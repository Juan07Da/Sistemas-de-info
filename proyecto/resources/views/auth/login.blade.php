<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <style>
                h1 {
                    font-size: 30px;
                    font-family: Arial;
                }

                /* Estilos para ambos botones */
                .button {
                    background-color: #1e3a8a; /* Azul oscuro */
                    color: white; /* Color del texto */
                    font-weight: bold;
                    padding: 0.5rem 1rem; /* Espaciado */
                    border-radius: 0.375rem; /* Bordes redondeados */
                    transition: background-color 0.3s ease; /* Transición */
                }

                .button:hover {
                    background-color: #1e40af; /* Azul más claro al pasar el ratón */
                }
            </style>
            <h1 class="text-8xl font-extrabold text-gray-800 dark:text-gray-200 tracking-tight text-center">
                TechnoCity
            </h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Clave') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <a href="{{ route('welcome') }}" 
                   class="button ms-4">
                    {{ __('Regresar') }}
                </a>

                <x-button class="button ms-4">
                    {{ __('Iniciar sesión') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
