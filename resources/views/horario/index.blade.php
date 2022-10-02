@extends('layouts.app')

@section('contenido')
<div class="grid grid-cols-4">
    <div class="flex justify-center items-center">
        <button class="col-span-1 bg-indigo-700 hover:bg-indigo-900 hover:font-bold text-white px-4 p-2 rounded-md ">
            <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('horario.create') }}">Crear Horarios</a>
        </button>
    </div>

    <h3 class="col-span-3 font-bold text-2xl p-3">
        Horarios Registrados
    </h3>
</div>

@if (count($horarios) > 0):
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-md font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hora de inicio 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hora de finalización
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Día Libre
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach ($horarios as $horario)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-1 px-6">
                        {{ $horario->nombre }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $horario->hora_entrada }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $horario->hora_salida }}
                    </td>
                    <td class="py-1 px-6">
                        @switch($horario->dia_libre)
                            @case(1)
                                Lunes
                                @break
                            @case(2)
                                Martes
                                @break
                            @case(3)
                                Miércoles
                                @break
                            @case(4)
                                Jueves
                                @break
                            @case(5)
                                Viernes
                                @break
                            @case(6)
                                Sábado
                                @break
                            @case(7)
                                Domingo
                                @break

                            @default
                                No Definido    
                        @endswitch
                    </td>
                    <td class="py-1 px-6">
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('horario.edit', $horario->id) }}" method="GET">
                                @csrf
                                <x-button-edit>
                                    Editar    
                                </x-button-edit>                                
                            </form>

                            <form action="{{ route('horario.destroy', $horario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button-delete>
                                    Editar    
                                </x-button-delete>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <h3 class="text-xl p-4 bg-slate-600 text-white rounded-xl text-center font-bold mb-3">
        No existe ningún Registro
    </h3> 
@endif

@endsection