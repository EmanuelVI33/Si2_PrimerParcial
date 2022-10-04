@php
    $contador = 0;
@endphp

@extends('layouts.app')

@section('contenido')

<h3 class="font-bold text-xl md:text-2xl p-3 text-center bg-slate-900 text-white mb-3 rounded-xl">
    Servicios de Fumigacion
</h3>

<div class="rounded-lg bg-slate-900">
    <div class="flex justify-end items-center p-3">
        <div class="col-span-1 bg-indigo-700 hover:bg-indigo-900 hover:font-bold text-white px-4 p-2 rounded-md ">
            <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('fumi.create') }}">Registrar fumigación</a>
        </div>
    </div>

    

    @forelse ($fumigaciones as $fumi)
    <div class="flex  flex-col lg:flex-row justify-center p-2">
        <a href="{{route('fumi.show', $fumi)}}" class="flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row md:max-w-4xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            @if($fumi->imagen)
                <img src="{{asset('fumigacion'.'/'.$fumi->imagen)}}" alt="Imagen de Servicio de Fumigación"
                    class="object-cover w-full h-72 rounded-t-lg md:h-auto md:w-64 md:rounded-none md:rounded-l-lg" 
                >
            @else
                <img src="{{asset('imagenes/fumigacion-plagas.jpg')}}" alt="Imagen de Servicio de Fumigación"
                    class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-64 md:rounded-none md:rounded-l-lg" 
                >
            @endif

            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$fumi->nombre}}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$fumi->descripcion}}</p>
            </div>
        </a>
        
        @role('administrador')
        <div class="flex lg:flex-col justify-evenly text-lg lg:ml-4 p-2 bg-gray-800 rounded-xl mt-2">
            <form action="{{ route('fumi.edit', $fumi->id) }}" method="GET">
                @csrf
                <x-button-edit class="text-white w-24 lg:w-40">
                    Editar    
                </x-button-edit>
            </form>

            <form action="{{ route('fumi.destroy', $fumi->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-button-delete class="text-white w-24 lg:w-40">
                    Eliminar
                </x-button-delete>
            </form>
        </div>
        @endrole
    </div>    
    @empty
    <div class="bg-slate-800 mt-5">
        <h5 class="text-2xl text-white font-bold p-5 text-center">No existe Servicios</h5>
    </div>
    @endforelse
</div>



@endsection