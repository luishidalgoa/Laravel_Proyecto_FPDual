<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre Completo -->
            <div>
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" 
                        :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Correo Electrónico -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" 
                        :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Edad -->
            <div class="mt-4">
                <x-label for="age" value="{{ __('Edad') }}" />
                <x-input id="age" class="block mt-1 w-full" type="number" name="age" 
                        :value="old('age')" min="18" max="100" required autocomplete="age" />
            </div>

            <!-- Género -->
            <div class="mt-4">
                <x-label for="gender" value="{{ __('Género') }}" />
                <select id="gender" name="gender" required
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" disabled {{ !old('gender') ? 'selected' : '' }}>Seleccione género</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Masculino</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femenino</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <!-- Dirección -->
            <div class="mt-4">
                <x-label for="address" value="{{ __('Dirección') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" 
                        :value="old('address')" maxlength="150" required autocomplete="street-address" />
            </div>

            <!-- Teléfono -->
            <div class="mt-4">
                <x-label for="telephone" value="{{ __('Teléfono') }}" />
                <x-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" 
                        :value="old('telephone')" pattern="[0-9]{9}" title="9 dígitos numéricos" 
                        placeholder="Ej. 612345678" required autocomplete="tel" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" 
                        name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" 
                        name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Términos de Servicio').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                    href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>