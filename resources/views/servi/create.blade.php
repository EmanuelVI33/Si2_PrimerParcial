@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Solicitar Servicio
</h3>

    
    <div class="w-3/4 m-auto p-2 bg-slate-300 rounded-lg border-black">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('servicio.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- Fecha  -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="fecha" :value="__('Fecha para la fumigación')" />
                <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required />
            </div>

            <h3 class="text-lg text-center mt-4 font-bold">Dirección</h3>

            <!-- Descripcion -->
            <div class="my-4">
                <x-input-label class="text-gray-800" for="descripcion" :value="__('Descripción de la dirección')" />
                <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Descripción..."></textarea>
            </div>

            {{-- Latitud --}}
            <div class="my-4">
                <x-input-label class="text-gray-800" for="latitud" :value="__('Latitud')" />
                <x-text-input id="latitud" class="block mt-1 w-full" type="text" name="latitud" :value="old('latitud')" required />
            </div>

            {{-- Longitud --}}
            <div class="my-4">
                <x-input-label class="text-gray-800" for="longitud" :value="__('Longitud')" />
                <x-text-input id="longitud" class="block mt-1 w-full" type="text" name="longitud" :value="old('longitud')" required />
            </div>

            {{-- Seleccionar Servicio --}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="servicio_id" :value="__('servicio del Empleado')" />  
                <select id="servicio_id" name="servicio_id" class="block w-full px-6 py-2 my-4 text-md text-center text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($servicios as $servicio)
                        <option selected value="{{$servicio->id}}"> {{ $servicio->nombre . ':  ' . $servicio->precio }}  </option>
                    @endforeach
                </select>
            </div>

            {{-- Estado en 1: En espera --}}
            <input type="number" name="estado" value="1" class="hidden">

            {{-- id del cliente --}}
            <input type="number" name="cliente_id" value="{{Auth()->user()->cliente->id}}" class="hidden">

            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Solicitar') }}
            </x-primary-button>
        </form>   
    </div>  
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
    
@endsection