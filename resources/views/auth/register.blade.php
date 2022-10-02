<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 p-4" />
            </a>
        </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
            <h3 class="text-center text-xl font-bold">
                Registro de Clientes
            </h3>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <!-- Nombre -->
                <div class="mt-4">
                    <x-input-label for="nombre" :value="__('Nombre')" />

                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
                </div>

                {{-- Apellido --}}
                <div class="mt-4">
                    <x-input-label for="apellido" :value="__('Apellido')" />

                    <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required />
                </div>

                {{-- Carnet de Identidad --}}
                <div class="mt-4">
                    <x-input-label for="ci" :value="__('Carnet de Identidad')" />

                    <x-text-input id="ci" class="block mt-1 w-full" type="number" name="ci" :value="old('ci')" required />
                </div>

                {{-- Telefono --}}
                <div class="mt-4">
                    <x-input-label for="telefono" :value="__('Teléfono')" />

                    <x-text-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Repetir Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="image" :value="__('Foto de Perfil')" />

                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
                </div>

                <div class="flex justify-between my-5">
                    <x-link
                        :href="route('login')"
                    >
                        Iniciar Sección
                    </x-link>

                    <x-link
                        :href="route('password.request')"
                    >
                        Olvidaste tu Contraseña?
                    </x-link>
                </div>

                <input name="rol" type="text" value="cliente" class="hidden">

                <x-primary-button class="w-full justify-center">
                    {{ __('Crear Cuenta') }}
                </x-primary-button>

            </form>
    </x-auth-card>
</x-guest-layout>
