@extends('layouts.app')

@section('contenido')
    <h3 class="text-center font-bold text-2xl py-3">
        Clientes Registrados
    </h3>

    <div class="grid p-2">
        <div class="grid-cols-12">
            <form action="{{ route('cliente.index') }}" method="GET">
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
            <thead class="text-xs font-bold text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Nombre 
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Apellido
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Carnet de Identidad
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Teléfono
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Foto
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @if (count($clientes) <= 0)
                    <h3 class="text-xl p-2 bg-slate-600 text-white rounded-lg text-center font-bold mb-3">
                        No se ha encontrado resultados
                    </h3>    
                @else
                    @foreach ($clientes as $cliente)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-1 px-6">
                            {{ $cliente->nombre }}
                        </td>
                        <td class="py-1 px-6">
                            {{ $cliente->apellido }}
                        </td>
                        <td class="py-1 px-6">
                            {{ $cliente->ci }}
                        </td>
                        <td class="py-1 px-6">
                            {{ $cliente->telefono }}
                        </td>
                        <td class="py-1 px-6 w-40 h-40">
                            <img src="{{ asset('cliente-fotos' . '/' . $cliente->image ) }}" alt="">
                        </td>
                    </tr>
                    @endforeach
                @endif
                
            </tbody>
        </table>
    </div>
@endsection