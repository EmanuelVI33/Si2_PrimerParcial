@extends('layouts.app')

@section('contenido')

<div class="grid grid-cols-4">
    <div class="flex justify-center items-center">
        <div class="col-span-1 bg-indigo-700 hover:bg-indigo-900 hover:font-bold text-white px-4 p-2 rounded-md ">
            <i class="fa-solid fa-plus pr-2"></i> <a href="{{ route('cargo.create') }}">Crear Cargo</a>
        </div>
    </div>

    <h3 class="col-span-3 font-bold text-2xl p-3">
        Registrar Cargo de Empleados
    </h3>
</div>


@if (count($cargos) > 0):
    <div class="overflow-x-auto relative w-3-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-md font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Salario Mínimos
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Salario Máximo
                    </th>
                    <th scope="col" class="py-3 px-6 text-center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach ($cargos as $cargo)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-1 px-6">
                        {{ $cargo->nombre }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $cargo->salario_min }}
                    </td>
                    <td class="py-1 px-6">
                        {{ $cargo->salario_max }}
                    </td>
                    
                    <td class="py-1 px-6">
                        @role('adminstrador')
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('cargo.edit', $cargo->id) }}" method="GET">
                                @csrf
                                <x-button-edit >
                                    Editar
                                </x-button-edit>
                            </form>

                            <form action="{{ route('cargo.destroy', $cargo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button-delete >
                                    Eliminar
                                </x-button-delete>
                            </form>
                        </div>
                        @endrole
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