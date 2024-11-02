<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <style>
                h1 {
                    font-size: 30px;
                    font-family: Arial;
                    text-align: center; /* Centrar el título */
                    margin-bottom: 20px; /* Espaciado debajo del título */
                }

                /* Estilos para los botones */
                .button {
                    background-color: #1e3a8a; /* Azul oscuro */
                    color: white; /* Color del texto */
                    font-weight: bold;
                    padding: 0.5rem 1rem; /* Espaciado */
                    border-radius: 0.375rem; /* Bordes redondeados */
                    transition: background-color 0.3s ease; /* Transición */
                    text-align: center; /* Alinear texto al centro */
                    text-decoration: none; /* Sin subrayado para el enlace */
                    display: inline-block; /* Para que el enlace se comporte como un botón */
                }

                .button:hover {
                    background-color: #1e40af; /* Azul más claro al pasar el ratón */
                }
            </style>
            
            <!-- Título en lugar del círculo -->
            <h1>TechnoCity</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div> 
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('welcome') }}" class="button">
                    {{ __('Regresar') }}
                </a>

                <button type="submit" class="button ms-4">
                    {{ __('Registro') }}
                </button>

                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ms-4" href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
