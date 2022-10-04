@extends('layouts.app')

@section('contenido')
    <h3 class="text-2xl text-center font-bold mb-5">Empleado: {{ $empleado->nombre . ' ' . $empleado->apellido }}</h3>

    <div class="flex justify-center flex-col sm:flex-row">
        <div class="text-sm lg:text-lg mx-5 text-white bg-slate-800 rounded-lg p-3 mb-2">
            
            <h3 class="font-bold text-center mb-2">Datos Personales</h3>

            {{-- Nombre --}} 
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Nombre: </label>
                <p> {{$empleado->nombre}}</p>
            </div>
            
            {{-- Apellido --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Apellido: </label>
                <p> {{$empleado->apellido}}</p>
            </div>

            {{-- Fecha de Nacimiento --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Fecha de Nacimiento: </label>
                <p> {{$empleado->fecha_nacimiento}}</p>
            </div>

            {{-- Telefono --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Teléfono: </label>
                <p> {{$empleado->telefono}}</p>
            </div>

            {{-- Estado --}}
            <div class="flex p-2 bg-slate-700 rounded-lg mb-2">
                <label for="" class="font-bold pr-2">Estado: </label>
                @if($empleado->contrato_id)
                    <p>Disponible</p>
                @else
                    <p>Ocupado</p>
                @endif
            </div>
        </div>

        <div class="border-black rounded-xl bg-slate-800 p-2">
            @if ($empleado->image)
                <img 
                    src="{{ asset('empleado-fotos' . '/' . $empleado->image ) }}" 
                    alt="Imagen de Empleado"
                    class="w-80 h-80 m-auto"
                >
            @else 
                <img src="imagenes/usuario-default.png" alt="Imagen por default">   
            @endif
        </div>
    </div>

@endsection