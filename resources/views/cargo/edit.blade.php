@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Editar Cargo: {{ $cargo->nombre }} 
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('cargo.update', $cargo->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre del Cargo')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $cargo->nombre }}" />
        </div>

        <!--descripcion -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="descripcion" :value="__('Descripción')" />
            <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Your message...">{{$cargo->descripcion}}</textarea>
        </div>

        {{-- Salario Mínimo --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="salario_min" :value="__('Salario Mínimo')" />
            <x-text-input id="salario_min" class="block mt-1 w-full" type="number" name="salario_min" value="{{ $cargo->salario_min }}" required />
        </div>

        {{-- Salario Mínimo --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="salario_max" :value="__('Salario Maximo')" />
            <x-text-input id="salario_max" class="block mt-1 w-full" type="number" name="salario_max" value="{{ $cargo->salario_max }}" required />
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Actualizar Datos') }}
        </x-primary-button>

    </form>   
</div> 
@endsection