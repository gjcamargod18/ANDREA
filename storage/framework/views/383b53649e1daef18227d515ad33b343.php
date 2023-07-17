<?php $__env->startSection('title'); ?>
    Prestamos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css">
<?php $__env->stopSection(); ?>
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if(session('status')): ?>
        <div data-popover id="popover-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="px-3 py-2">
                <p><?php echo e(session('status')); ?></p>
            </div>
            <div data-popper-arrow></div>
        </div>
    <?php endif; ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Prestamos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <?php if(session('estado')): ?>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
                        <a href="#" class="block max-w-sm p-6 bg-red-500 border border-red-200 rounded-lg shadow">
                            <p class="font-normal text-white dark:text-white"><?php echo e(session('estado')); ?></p>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
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
                        <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($prestamo->estado_prestamo == 'Abierto' || $prestamo->estado_prestamo == 'Devolucion en solicitud'): ?>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->id); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->id_llave); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->nombre_ambiente); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->name); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->usuario); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->estado_prestamo); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->fecha); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->hora); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Instructor')): ?>
                                                <?php if($prestamo->estado_prestamo == 'Abierto'): ?>
                                                    <button id="btn-devolver" data-id-prestamo=<?php echo e($prestamo->id); ?>

                                                        data-modal-target="devolver" data-modal-toggle="devolver"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Devolver llave
                                                    </button>
                                                <?php endif; ?>
                                                <?php echo $__env->make('components.devolver-llave', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>

                                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Administrador de prestamos')): ?>
                                                <?php if($prestamo->estado_prestamo == 'Abierto'): ?>
                                                    <span>Esperando devolucion</span>
                                                <?php else: ?>
                                                    <button id="btn-cerrar-prestamo" data-id-prestamo=<?php echo e($prestamo->id); ?>

                                                        data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Cerrar prestamo
                                                    </button>
                                                    <?php echo $__env->make('components.cerrar-prestamo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Administrador')): ?>
                                                <?php if($prestamo->estado_prestamo == 'Abierto'): ?>
                                                    <span>Esperando devolucion</span>
                                                <?php else: ?>
                                                    <button id="btn-cerrar-prestamo" data-id-prestamo=<?php echo e($prestamo->id); ?>

                                                        data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Cerrar prestamo
                                                    </button>
                                                    <?php echo $__env->make('components.cerrar-prestamo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                </tbody>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                </div>
            </div>

            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Administrador')): ?>
                <div class="mt-5">
                    <?php echo $__env->make('components.abrir-prestamo-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Administrador de prestamos')): ?>
                <div class="mt-5">
                    <?php echo $__env->make('components.abrir-prestamo-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>
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
                            <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($prestamo->estado_prestamo == 'Cerrado'): ?>
                                    <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->id); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->id_llave); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->nombre_ambiente); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->name); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->usuario); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->estado_prestamo); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->fecha); ?>

                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo e($prestamo->hora); ?>

                                        </td>

                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php $__env->startSection('js'); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>

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
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ADSI\Documents\Project\sistema_llaves-main\resources\views/admin/prestamos.blade.php ENDPATH**/ ?>