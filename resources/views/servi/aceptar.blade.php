@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Aceptar Solicitud de Servicio
</h3>
    <div class="w-3/4 m-auto p-2 bg-slate-300 rounded-lg border-black">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('servicio.aceptarStore', $id) }}" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- Fecha  -->
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="hora" :value="__('Fecha para la fumigación')" />
                <x-text-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('hora')" required />
            </div>

            {{-- Seleccionar empleado --}}
            <div class="mt-4">
                <x-input-label class="text-gray-800" for="empleado_id" :value="__('empleado del Empleado')" />  
                <select id="empleado_id" name="empleado_id" class="block w-full px-6 py-2 my-4 text-md text-center text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($empleados as $empleado)
                        <option selected value="{{$empleado->id}}"> {{ $empleado->nombre . ':  ' . $empleado->precio }}  </option>
                    @endforeach
                </select>
            </div>

            {{-- Id del empleado --}}
            <input type="number" name="estado" value="{{$id}}" class="hidden">

            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Aceptar Solicitud') }}
            </x-primary-button>
        </form>   
    </div>  
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
    
@endsection