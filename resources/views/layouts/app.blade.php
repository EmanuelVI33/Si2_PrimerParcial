@php
    // dd(Auth()->user()->cliente->id)
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <aside class="fixed h-screen w-16 lg:w-64 bg-gray-500" aria-label="Sidebar">
            <div class="h-screen overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
                <ul class="space-y-2">
                    {{-- Solicitar Servicios --}}
                    <li>
                        <button id="boton" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Servicos</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            @role('cliente')
                            <li>
                                <a href="{{route('servicio.solicitar', Auth()->user()->cliente->id)}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Solicitar Servicio</a>
                            </li>
                            @endrole      
                            <li>
                                <a href="{{route('servicio.index')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Servicos en Espera</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Servicios --}}
                    
                    <li>
                       
                        <button id="btnServicio" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap text-sm" sidebar-toggle-item>Servicios de Fumigación</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="servicio" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{route('fumi.index')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visializar Servicio</a>
                            </li>
                            @role('administrador')
                            <li>
                                <a href="{{route('fumi.create')}}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Registrar Servicio</a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    

                    {{-- Clientes --}}
                    <li>
                        <button id="btnCliente" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Gestionar Clientes</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="cliente" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('cliente.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualiazar Clientes</a>
                            </li>
                         
                        </ul>
                    </li>

                    {{-- Empleados --}}
                    <li>
                        <button id="btnEmpleado" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-user-tie"></i>
                            
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Gestionar Empleados</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="empleado" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('empleado.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualizar Empleados</a>
                            </li>
                            @role('administrador')
                            <li>
                                <a href="{{ route('empleado.create') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Registrar Empleado</a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    
                    {{-- Administrar Roles --}}
                    {{-- <li>
                        <button id="btnRol" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-users"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Administrar Roles</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="rol" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualizar Roles</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Editar Roles</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Asignar Permisos</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Agregar Rol</a>
                            </li>
                        </ul>   
                    </li> --}}

                    {{-- Horario --}}
                    <li>
                        <button id="btnHorario" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-calendar-days"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Gestionar Horarios</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="horario" class="hidden py-2 space-y-2">
                            @role('administrador')
                            <li>
                                <a href="{{ route('horario.create') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Registrar Horario</a>
                            </li>
                            @endrole
                            <li>
                                <a href="{{ route('horario.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualizar Horarios</a>
                            </li>
                        </ul>   
                    </li>

                    {{-- Cargo --}}
                    <li>
                        <button id="btnCargo" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-chart-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Administrar Cargos</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="cargo" class="hidden py-2 space-y-2">
                            @role('administrador')
                            <li>
                                <a href="{{ route('cargo.create') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Registrar Cargo</a>
                            </li>
                            @endrole
                            <li>
                                <a href="{{ route('cargo.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualizar Cargos</a>
                            </li>
                        </ul>   
                    </li>

                    {{-- Contrato --}}
                    <li>
                        <button id="btnContrato" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-chart-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Administrar Contrato</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="contrato" class="hidden py-2 space-y-2">
    
                            <li>
                                <a href="{{ route('contrato.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Visualizar Contratos</a>
                            </li>
                        </ul>   
                    </li>

                    {{-- Reportes --}}
                    <li>
                        <button id="btnReportes" type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <i class="fa-sharp fa-solid fa-chart-user"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Reportes</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <ul id="reportes" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('cargo.create') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Empleados en Vacaciones</a>
                            </li>
                            <li>
                                <a href="{{ route('cargo.index') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Empleados en día Libre</a>
                            </li>
                        </ul>   
                    </li>
                    
                </ul>
            </div>
        </aside>
  
        <div class="pl-16 lg:pl-64 h-screen w-full flex flex-col">
            <header class="bg-gray-400">
                @include('layouts.navigation')
            </header>
        
            <main class="flex-grow bg-gray-200">
                <div class="container p-4">
                    @yield('contenido')  
                </div>
            </main>

            <footer class="text-center font-bold p-3 bg-gray-400 text-white">
                <span class="text-lg">&copy; Emanuel Aroldo Vaca Ibañez {{ now()->year }}</span>
            </footer>
        </div>

        {{-- Font Awesome - Iconos --}}
        <script src="https://kit.fontawesome.com/2989636ed8.js" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    const boton = document.querySelector("#boton");
    const submenu = document.querySelector("#dropdown-example");
    boton.addEventListener("click", function () {
        submenu.classList.toggle("hidden");
    });

    // Servicio
    const btnServicio = document.querySelector("#btnServicio");
    const servicio = document.querySelector("#servicio");
    btnServicio.addEventListener("click", function () {
        servicio.classList.toggle("hidden");
    });

    // Cliente
    const btnCliente = document.querySelector("#btnCliente");
    const cliente = document.querySelector("#cliente");
    btnCliente.addEventListener("click", function () {
        cliente.classList.toggle("hidden");
    });

    // Empleado
    const btnEmpleado = document.querySelector("#btnEmpleado");
    const empleado = document.querySelector("#empleado");
    btnEmpleado.addEventListener("click", function () {
        empleado.classList.toggle("hidden");
    });

    // Roles
    // const btnRol = document.querySelector("#btnRol");
    // const rol = document.querySelector("#rol");
    // btnRol.addEventListener("click", function () {
    //     rol.classList.toggle("hidden");
    // });

    // Horarios
    const btnHorario = document.querySelector("#btnHorario");
    const horario = document.querySelector("#horario");
    btnHorario.addEventListener("click", function () {
        horario.classList.toggle("hidden");
    });

    // Cargos
    const btnCargo = document.querySelector("#btnCargo");
    const cargo = document.querySelector("#cargo");
    btnCargo.addEventListener("click", function () {
        cargo.classList.toggle("hidden");
    });    

    // Contrato
    const btnContrato = document.querySelector("#btnContrato");
    const contrato = document.querySelector("#contrato");
    btnContrato.addEventListener("click", function () {
        contrato.classList.toggle("hidden");
    }); 

    // Reporte
    const btnReporte = document.querySelector("#btnReportes");
    const reporte = document.querySelector("#reportes");
    btnReporte.addEventListener("click", function () {
        reporte.classList.toggle("hidden");
    }); 

</script>
