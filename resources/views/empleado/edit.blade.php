@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Editar Empleado {{ $empleado->nombre . ' ' . $empleado->apellido }}
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('empleado.update', $empleado->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $empleado->nombre }}" />
        </div>

        {{-- Apellido --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{ $empleado->apellido }}"  />
        </div>

        {{-- Carnet de Identidad --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="ci" :value="__('Carnet de Identidad')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="number" name="ci" value="{{ $empleado->ci }}" />
        </div>

        {{-- Fecha de nacimiento--}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="ci" :value="__('Fecha de Nacimiento')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="date" name="fecha_nacimiento" value="{{ $empleado->fecha_nacimiento }}" />
        </div>

        {{-- Telefono --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="telefono" :value="__('Teléfono')" />

            <x-text-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" value="{{ $empleado->telefono }}" />
        </div>

        <div class="mt-4">
            <x-input-label class="text-gray-800" for="image" :value="__('Foto de Perfil')" />

            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ $empleado->image }}" />
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Actualizar Datos') }}
        </x-primary-button>

    </form>   
</div> 
@endsection