@section('title')Ambientes @endsection
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
            {{ __('Ambientes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="">
                    <table id="ambientes" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                        <thead class="text-xs text-white uppercase shadow bg-gray-800 bg-gray-800 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre del ambiente
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambientes as $ambiente)
                                <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                    <td class="px-6 py-4">
                                        {{ $ambiente->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ambiente->nombre_ambiente }}
                                    </td>
                                    <td>
                                        <button data-modal-target="actualizar-ambiente" id="btn-actualizar-ambiente" data-modal-toggle="actualizar-ambiente"
                                        data-id-ambiente="{{ $ambiente->id }}"
                                        data-nombre-ambiente="{{ $ambiente->nombre_ambiente }}"
                                        class="block text-white bg-lime-500 hover:bg-lime-600 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-lime-600 dark:hover:bg-lime-600 dark:focus:ring-lime-200"
                                        type="button">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    @include('components.actualizar-ambiente-modal')
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('borrar-ambiente', $ambiente) }}" method="POST">
                                           <x-delete-button></x-delete-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <x-crear-ambientes-modal></x-crear-ambientes-modal>
            </div>
        </div>
    </div>

    </div>
    @section('js')
    @livewireScripts()
    <script type="module" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="module" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="module" src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <script type="module">
        $(document).ready(function () {
            $('#ambientes').DataTable({
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
    </script>
    @endsection
</x-app-layout>
