@php
    $contador = 0;

    $estado = [
        1 => 'En Espera',
        2 => 'Aceptado',
        3 => 'Terminado',
        4 => 'Rechazado',
    ];
@endphp

@extends('layouts.app')

@section('contenido')
<h3 class="col-span-3 font-bold text-2xl p-3 text-center">
    Solicitudes en Espera
</h3>

<div class="overflow-x-auto relative">
    <table class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
        <thead class="font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nro 
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha
                </th>
                <th scope="col" class="py-3 px-6">
                    Ver dirreción
                </th>
                <th scope="col" class="py-3 px-6">
                    Estado
                </th>
                <th scope="col" class="py-3 px-6">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-300">
            @forelse ($servicios as $servicio)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="py-1 px-6">
                        {{ $contador+=1 }}
                    </td>
                    <td class="py-1 px-6">
                        {{$servicio->fecha}}
                    </td>
                    <td class="py-1 px-6">
                        {{$estado[$servicio->estado]}}   
                    </td>
                    <td class="py-1 px-6">
                        <a href="">
                            Ver dirección
                        </a>
                    </td>
                
                    <td class="py-3 px-1">
                        @role('administrador')
                        <div class="flex justify-center gap-2">
                            <div class="flex justify-center items-center">
                                <div class="col-span-1 bg-indigo-700 hover:bg-indigo-800 hover:font-bold text-white p-1 rounded-md ">
                                    <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('servicio.aceptar', $servicio->id) }}">Aceptar Solicitud</a>
                                </div>
                            </div>

                            <form action="{{ route('servicio.destroy', $servicio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button-delete>
                                    Eliminar
                                </x-button-delete>
                            </form>
                        </div>
                        @endrole
                    </td>
                </tr>
                @empty
                <h3 class="text-xl p-2 bg-slate-600 text-white rounded-lg text-center font-bold mb-3">
                    No se ha encontrado resultados
                </h3>  
                @endforelse
        </tbody>
    </table>
</div>

@endsection