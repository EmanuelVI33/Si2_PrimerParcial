@extends('layouts.app')

@section('contenido')
    <h3 class="text-center font-bold text-2xl py-3">
        Registrar Empleados
    </h3>

    <div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- Nombre -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
            </div>

            {{-- Apellido --}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="apellido" :value="__('Apellido')" />
                <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required />
            </div>

            {{-- Carnet de Identidad --}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="ci" :value="__('Carnet de Identidad')" />
                <x-text-input id="ci" class="block mt-1 w-full" type="number" name="ci" :value="old('ci')" required />
            </div>

            {{-- Fecha de nacimiento--}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="ci" :value="__('Fecha de Nacimiento')" />
                <x-text-input id="ci" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimento')" required />
            </div>

            {{-- Telefono --}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="telefono" :value="__('Teléfono')" />

                <x-text-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="password_confirmation" :value="__('Repetir Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <x-input-label class="text-gray-800" for="image" :value="__('Foto de Perfil')" />

                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
            </div>

            <input name="rol" type="text" value="empleado" class="hidden">

            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Crear Cuenta') }}
            </x-primary-button>

        </form>   
    </div>  

@endsection