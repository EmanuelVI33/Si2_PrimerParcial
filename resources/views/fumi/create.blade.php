@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Registrar Tipo de Fumigación
</h3>

<div class="m-auto w-1/2 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('fumi.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <!-- Nombre  -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre del Servicio')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>

        <!-- Descripcion -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="descripcion" :value="__('Descripción del Servicio')" />
            <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Descripción..."></textarea>
        </div>

        {{-- Precio --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="precio" :value="__('Precio')" />
            <x-text-input id="precio" class="block mt-1 w-full" type="number" name="precio" :value="old('precio')" required />
        </div>

        {{-- Imagen --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="imagen" :value="__('Foto del Servicio')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" required />
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Registrar Horario') }}
        </x-primary-button>
    </form>   
</div>  
    
@endsection