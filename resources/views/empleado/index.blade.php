@php
    $contador = 0;
@endphp

@extends('layouts.app')

@section('contenido')
<div class="grid grid-cols-4">
    <div class="flex justify-center items-center">
        <div class="col-span-1 bg-indigo-700 hover:bg-indigo-900 hover:font-bold text-white px-4 p-2 rounded-md ">
            <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('empleado.create') }}">Registrar Empleado</a>
        </div>
    </div>

    <h3 class="col-span-3 font-bold text-2xl p-3">
        Empleados Registrados
    </h3>
</div>

<div class="grid p-2 text-center">
    <div class="grid-cols-12">
        <form action="{{ route('empleado.index') }}" method="GET">
            <input type="text" class="w-1/2 mr-5 rounded-lg border-stone-900" name="texto" value="{{ $texto }}">
            <div class="inline p-2 bg-cyan-500  hover:bg-cyan-400 font-bold rounded-md text-lg">
                <input type="submit" class="pr-2" value="Buscar">
                <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
            </div>
        </form>
    </div>
</div>

<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nro 
                </th>
                <th scope="col" class="py-3 px-6">
                    Nombre 
                </th>
                <th scope="col" class="py-3 px-6">
                    Apellido
                </th>
                <th scope="col" class="py-3 px-6">
                    Carnet 
                </th>
                <th scope="col" class="py-3 px-6">
                    Telefono
                </th>
                <th scope="col" class="py-3 px-6">
                    Contrato
                </th>
                <th scope="col" class="py-3 px-6 text-center">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="text-gray-300">
            @if (count($empleados) <= 0)
                <h3 class="text-xl p-2 bg-slate-600 text-white rounded-lg text-center font-bold mb-3">
                    No se ha encontrado resultados
                </h3>    
            @else
                @foreach ($empleados as $empleado)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                    <td class="py-1 px-6">
                        {{ $contador+=1 }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $empleado->nombre }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $empleado->apellido }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $empleado->ci }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $empleado->telefono }}
                    </td>
                    <td class="py-1 px-6">
                        @if ( $empleado->contrato_id)
                            Tiene Contrato
                        @else 
                            @role('administrador')
                            <div class="flex justify-center items-center">
                                <div class="col-span-1 bg-green-700 hover:bg-green-900 hover:font-bold text-white px-4 p-1 rounded-md ">
                                    <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('contrato.create', $empleado->id) }}">Crear Contrato</a>
                                </div>
                            </div>   
                            @endrole 
                        @endif
                    </td>
                    <td class="py-3 px-1">
                        <div class="flex justify-center gap-2">
                            <div class="flex justify-center items-center">
                                <div class="col-span-1 bg-indigo-700 hover:bg-indigo-800 hover:font-bold text-white p-1 rounded-md ">
                                    <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('empleado.show', $empleado->id) }}">Mostrar</a>
                                </div>
                            </div>

                            @role('administrador')
                            <form action="{{ route('empleado.edit', $empleado->id) }}" method="GET">
                                @csrf
                                <x-button-edit>
                                    Editar    
                                </x-button-edit>
                            </form>

                            <form action="{{ route('empleado.destroy', $empleado->id) }}" method="POST">
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