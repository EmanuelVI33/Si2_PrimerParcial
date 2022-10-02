@php
    $dias = [
        1 => 'Lunes',
        2 => 'Martes', 
        3 => 'Miércoles', 
        4 => 'Jueves',
        5 => 'Viernes', 
        6 => 'Sábado', 
        7 => 'Domingo'
    ];   

    $dia =  'Día Libre:' . ' ' . $dias[$horario->dia_libre - 1];
@endphp

@extends('layouts.app')

@section('contenido')
<h3 class="text-center font-bold text-2xl py-3">
    Editar Horario 
</h3>

<div class="m-auto w-3/4 p-2 bg-slate-300 rounded-lg border-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('horario.update', $horario->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <!-- Nombre -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $horario->nombre }}" />
        </div>

        <!-- Hora de Entrada -->
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="hora_entrada" :value="__('Hora de Entrada')" />
            <x-text-input id="hora_entrada" class="block mt-1 w-full" type="time" name="hora_entrada" value="{{ $horario->hora_entrada }}" required />
        </div>

        {{-- Hora de Salida --}}
        <div class="mt-4">
            <x-input-label class="text-gray-800" for="hora_salida" :value="__('Hora de Salida')" />
            <x-text-input id="hora_salida" class="block mt-1 w-full" type="time" name="hora_salida" value="{{ $horario->hora_salida }}" required />
        </div>

        {{-- Día Libre --}}

        <div class="mt-4">
            <x-input-label class="text-gray-800" for="ci" value="{{ $dia }}" />
            <select id="small" name="dia_libre" class="block p-2 mb-6 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miércoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sábado</option>
                <option value="7">Domingo</option>
            </select>
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Actualizar Datos') }}
        </x-primary-button>

    </form>   
</div> 
@endsection