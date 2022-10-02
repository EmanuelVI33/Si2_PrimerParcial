@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Cargos Registrados
</h3>

<div class="m-auto w-1/2 p-1 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('cargo.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required />
        </div>

        <!-- Descripcion -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="descripcion" :value="__('Descripción del Cargo')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required />
        </div>

        <!-- Salario Minimo -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="salario_min" :value="__('Salario Minimo del Cargo')" />
            <x-text-input id="salario_min" class="block mt-1 w-full" type="number" name="salario_min" :value="old('salario_min')" required />
        </div>

        <!-- Salario Maximo -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="salario_max" :value="__('Salario Máximo del Cargo')" />
            <x-text-input id="salario_max" class="block mt-1 w-full" type="text" name="salario_max" :value="old('salario_max')" required />
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Registrar Cargo') }}
        </x-primary-button>

    </form>   
</div> 
@endsection