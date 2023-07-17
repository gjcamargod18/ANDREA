@section('title')
    Prestamos
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
@endsection
<x-app-layout>
    @if (session('status'))
        <div data-popover id="popover-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="px-3 py-2">
                <p>{{ session('status') }}</p>
            </div>
            <div data-popper-arrow></div>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prestamos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            @if (session('estado'))
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
                        <a href="#" class="block max-w-sm p-6 bg-red-500 border border-red-200 rounded-lg shadow">
                            <p class="font-normal text-white dark:text-white">{{ session('estado') }}</p>
                        </a>
                    </div>
                </div>
            @endif
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="">
                    <table id="prestamos-abiertos" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                        <thead class="text-xs text-white uppercase shadow bg-gray-800 bg-gray-800 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">ID Llave</th>
                                <th scope="col" class="px-6 py-3">Ambiente</th>
                                <th scope="col" class="px-6 py-3">Instructor</th>
                                <th scope="col" class="px-6 py-3">Usuario</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Fecha</th>
                                <th scope="col" class="px-6 py-3">Hora</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        @foreach ($prestamos as $prestamo)
                            @if ($prestamo->estado_prestamo == 'Abierto' || $prestamo->estado_prestamo == 'Devolucion en solicitud')
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                        <td class="px-6 py-4">
                                            {{ $prestamo->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->id_llave }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->nombre_ambiente }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->usuario }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->estado_prestamo }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->fecha }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->hora }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @role('Instructor')
                                                @if ($prestamo->estado_prestamo == 'Abierto')
                                                    <button id="btn-devolver" data-id-prestamo={{ $prestamo->id }}
                                                        data-modal-target="devolver" data-modal-toggle="devolver"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Devolver llave
                                                    </button>
                                                @endif
                                                @include('components.devolver-llave')
                                            @endrole

                                            @role('Administrador de prestamos')
                                                @if ($prestamo->estado_prestamo == 'Abierto')
                                                    <span>Esperando devolucion</span>
                                                @else
                                                    <button id="btn-cerrar-prestamo" data-id-prestamo={{ $prestamo->id }}
                                                        data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Cerrar prestamo
                                                    </button>
                                                    @include('components.cerrar-prestamo')
                                                @endif
                                            @endrole
                                            @role('Administrador')
                                                @if ($prestamo->estado_prestamo == 'Abierto')
                                                    <span>Esperando devolucion</span>
                                                @else
                                                    <button id="btn-cerrar-prestamo" data-id-prestamo={{ $prestamo->id }}
                                                        data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Cerrar prestamo
                                                    </button>
                                                    @include('components.cerrar-prestamo')
                                                @endif
                                            @endrole

                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        @endforeach
                    </table>

                </div>
            </div>

            @role('Administrador')
                <div class="mt-5">
                    @include('components.abrir-prestamo-modal')
                </div>
            @endrole
            @role('Administrador de prestamos')
                <div class="mt-5">
                    @include('components.abrir-prestamo-modal')
                </div>
            @endrole
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                        Historial de prestamos
                    </h2>
                    <table id="prestamos" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                        <thead class="text-xs text-white uppercase shadow bg-gray-800 bg-gray-800 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">ID Llave</th>
                                <th scope="col" class="px-6 py-3">Ambiente</th>
                                <th scope="col" class="px-6 py-3">Instructor</th>
                                <th scope="col" class="px-6 py-3">Usuario</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                                <th scope="col" class="px-6 py-3">Fecha</th>
                                <th scope="col" class="px-6 py-3">Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prestamos as $prestamo)
                                @if ($prestamo->estado_prestamo == 'Cerrado')
                                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                        <td class="px-6 py-4">
                                            {{ $prestamo->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->id_llave }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->nombre_ambiente }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->usuario }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->estado_prestamo }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->fecha }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $prestamo->hora }}
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    @section('js')
        @livewireScripts()
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="module" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
        <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <script type="module">
        $(document).ready(function () {
            $('#prestamos').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ entradas",
                    "infoEmpty": "mostrando 0 de 0 de un total de 0 entradas",
                    "infoFiltered": "(filtrado de un total de _MAX_ entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "loadingRecords": "cargando...",
                    "processing": "",
                    "search": "Buscar: ",
                    "zeroRecords": "No se encontraron registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": active para ordenar la columna en orden ascendente",
                        "sortDescending": ": active para ordenar la columna en orden descendente"
                    }
                }
            });
        });
        $(document).ready(function () {
            $('#prestamos-abiertos').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay prestamos abiertos",
                    "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ entradas",
                    "infoEmpty": "mostrando 0 de 0 de un total de 0 entradas",
                    "infoFiltered": "(filtrado de un total de _MAX_ entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "loadingRecords": "cargando...",
                    "processing": "",
                    "search": "Buscar: ",
                    "zeroRecords": "No se encontraron registros",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": active para ordenar la columna en orden ascendente",
                        "sortDescending": ": active para ordenar la columna en orden descendente"
                    }
                }
            });
        });
    </script>
    @endsection
</x-app-layout>
