@php
    $contador = 0;
@endphp

@extends('layouts.app')

@section('contenido')
<h3 class="col-span-3 font-bold text-2xl p-3 text-center">
    Contratos Registrados
</h3>

<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
        <thead class="font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nro 
                </th>
                <th scope="col" class="py-3 px-6">
                    Duración
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha de Inicio
                </th>
                <th scope="col" class="py-3 px-6">
                    Sueldo
                </th>
                <th scope="col" class="py-3 px-6">
                    Empleado    
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-300">
            @if (count($contratos) <= 0)
                <h3 class="text-xl p-2 bg-slate-600 text-white rounded-lg text-center font-bold mb-3">
                    No se ha encontrado resultados
                </h3>    
            @else
                @foreach ($contratos as $contrato)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="py-1 px-6">
                        {{ $contador+=1 }}
                    </td>
                    <td class="py-1 px-6">
                        @if ($contrato->duracion)
                            {{ $contrato->duracion }}
                        @else
                            Indefinido
                        @endif
                    </td>
                    <td class="py-1 px-6">
                        {{ $contrato->fecha_inicio }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $contrato->sueldo }}
                    </td>
                    <td class="py-1 px-6">
                        @if($contrato->empleado)
                            {{ $contrato->empleado->nombre }}
                        @endif
                    </td>
                
                    <td class="py-3 px-1">
                        <div class="flex justify-center gap-2">
                            <div class="flex justify-center items-center">
                                <div class="col-span-1 bg-indigo-700 hover:bg-indigo-800 hover:font-bold text-white p-1 rounded-md ">
                                    <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('contrato.show', $contrato->id) }}">Mostrar</a>
                                </div>
                            </div>
                            @role('administrador')
                            <form action="{{ route('contrato.edit', $contrato->id) }}" method="GET">
                                @csrf
                                <x-button-edit>
                                    Editar    
                                </x-button-edit>
                            </form>

                            <form action="{{ route('contrato.destroy', $contrato->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button-delete>
                                    Eliminar
                                </x-button-delete>
                            </form>
                            @endrole
                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>
</div>
@endsection