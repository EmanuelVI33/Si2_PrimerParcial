@extends('layouts.app')

@section('contenido')

<h3 class="text-center font-bold text-2xl py-3">
    Registrar Contrato del empleado 
</h3>

<div class="m-auto w-3/4 p-1 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('contrato.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <!-- Tipo de Contrato -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="tipo" :value="__('Tipo de Contrato')" />
            <div class="flex gap-3 justify-center content-center p-2 bg-slate-200 rounded-lg">
                <label for="">Contrato indefinido</label>
                <input type="radio" name="tipo" id="tipo1" value="1">
                <label for="">Contrato determinado</label>
                <input type="radio" name="tipo" id="tipo2" value="2">
            </div>
        </div>

        <!-- Duración Contrato -->
        <div id="duracion" class="mt-4">
            <x-input-label class="text-gray-800" for="duracion" :value="__('Duración de Contrato (meses)')" />
            <x-text-input id="duracion" class="block mt-1 w-full" type="number" name="duracion" required />
        </div>

        <!-- Fecha de inicio -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="fecha_inicio" :value="__('Fecha de Inicio')" />
            <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" :value="old('fecha_inicio')" required />
        </div>

        <!-- Sueldo -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="sueldo" :value="__('Sueldo')" />
            <x-text-input id="sueldo" class="block mt-1 w-full" type="number" name="sueldo" :value="old('sueldo')" required />
        </div>

        {{-- Seleccionar Empleado --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="empleado_id" :value="__('Selecionar Empleado')" />  
            <select id="empleado_id" name="empleado_id" class="block w-full px-6 py-2 my-4 text-md text-center text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($empleados as $empleado)
                    <option selected value="{{$empleado->id}}"> {{$empleado->nombre . ' ' . $empleado->apellido . ' | CI: ' . $empleado->ci}}</option>
                @endforeach
            </select>
        </div>

        {{-- Seleccionar Empleado --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="cargo_id" :value="__('Cargo del Empleado')" />  
            <select id="cargo_id" name="cargo_id" class="block w-full px-6 py-2 my-4 text-md text-center text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($cargos as $cargo)
                    <option selected value="{{$cargo->id}}"> {{ $cargo->nombre . ':  ' . $cargo->salario_min . '-' . $cargo->salario_max }}  </option>
                @endforeach
            </select>
        </div>

        {{-- Seleccionar Horario --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="horario_id" :value="__('Horario del Empleado')" />  
            <select id="horario_id" name="horario_id" class="block w-full px-6 py-2 my-4 text-md text-center text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-400 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($horarios as $horario)
                    <option selected value="{{$horario->id}}"> {{ $horario->nombre . ':  ' . $horario->hora_entrada . '-' . $horario->hora_salida }} </option>
                @endforeach
            </select>
        </div>

        <h3 class="text-center text-lg font-bold">Datos de Vacación</h3>

        {{-- Fecha de Inicio --}}
        <div class="mt-2">
            <x-input-label class="text-gray-800" for="vacacion_fecha_inicio" :value="__('Fecha de Inicio Vacacion')" />
            <x-text-input id="vacacion_fecha_inicio" class="block mt-1 w-full" type="date" name="vacacion_fecha_inicio" :value="old('vacacion_fecha_inicio')" required />
        </div>

        {{-- Fecha de Fin --}}
        <div class="mt-2">
            <x-input-label class="text-gray-800" for="vacacion_fecha_fin" :value="__('Fecha de Finalizacion')" />
            <x-text-input id="vacacion_fecha_fin" class="block mt-1 w-full" type="date" name="vacacion_fecha_fin" :value="old('vacacion_fecha_fin')" required />
        </div>

        <div class="mt-2">
            <x-input-label class="text-gray-800" for="vacacion_duracion" :value="__('Duración')" />
            <x-text-input id="vacacion_duracion" class="block mt-1 w-full" type="number" name="vacacion_duracion" :value="old('vacacion_duracion')" required />
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Registrar Cargo') }}
        </x-primary-button>

    </form>   
</div> 
@endsection

