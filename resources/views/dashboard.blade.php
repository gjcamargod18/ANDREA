@section('title') Inicio @endsection
<x-app-layout>
    <x-slot name="header">
        @role('administrador')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido Administrador') }}
        </h2>
        @endrole
        @role('Administrador de prestamos')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido Administrador Prestamos') }}
        </h2>
        @endrole
        @role('Instructor')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido Instructor') }}
        </h2>
        @endrole
    </x-slot>
    <x-menu-vertical></x-menu-vertical>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
