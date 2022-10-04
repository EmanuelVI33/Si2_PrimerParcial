@extends('layouts.app')

@section('contenido')
    <h3 class="text-2xl text-center font-bold mb-5">{{$fumigacion->nombre}}</h3>

    <div class="flex justify-center flex-col sm:flex-row">
        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 text-center">
            <img class="rounded-t-lg" src="{{asset('fumigacion'.'/'.$fumigacion->imagen)}}" alt="Imagen de fumigacion" />
            
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$fumigacion->nombre}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$fumigacion->descripcion}}</p>
            </div>
        </div>
    </div>

@endsection