<?php $__env->startSection('title'); ?>
    Usuarios Registrados
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
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <a href="#"
            class="block max-w-sm p-6 bg-red-500 border border-red-200 rounded-lg shadow">
            <p class="font-normal text-white dark:text-white"><?php echo e(session('status')); ?></p>
        </a>
        </div>
    </div>
    <?php endif; ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Usuarios')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="">
                    <table id="users" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                        <thead class="text-xs text-white uppercase shadow bg-gray-800 bg-gray-800 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombres
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo de documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Documento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rol de usuario
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                    <td class="px-6 py-4">
                                        <?php echo e($user->name); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo e($user->tipo_documento); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo e($user->documento); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <?php echo e($user->rol); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="actualizar" id="btn-actualizar"
                                            data-modal-toggle="actualizar" data-id="<?php echo e($user->id); ?>"
                                            data-nom="<?php echo e($user->name); ?>" data-documento="<?php echo e($user->documento); ?>"
                                            class="block text-white bg-lime-500 hover:bg-lime-500 focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                                            type="button">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <?php echo $__env->make('components.actualizar-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="<?php echo e(route('borrar', $user)); ?>" method="POST">
                                            <?php if (isset($component)) { $__componentOriginal2550ac35d7599d92e03b1bde3934d26a = $component; } ?>
<?php $component = App\View\Components\DeleteButton::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DeleteButton::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2550ac35d7599d92e03b1bde3934d26a)): ?>
<?php $component = $__componentOriginal2550ac35d7599d92e03b1bde3934d26a; ?>
<?php unset($__componentOriginal2550ac35d7599d92e03b1bde3934d26a); ?>
<?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <?php if (isset($component)) { $__componentOriginal49ba20637ae5d4bd4634ca635c7fd8d1 = $component; } ?>
<?php $component = App\View\Components\RegisterModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('register-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RegisterModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49ba20637ae5d4bd4634ca635c7fd8d1)): ?>
<?php $component = $__componentOriginal49ba20637ae5d4bd4634ca635c7fd8d1; ?>
<?php unset($__componentOriginal49ba20637ae5d4bd4634ca635c7fd8d1); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    </div>
    <?php $__env->startSection('js'); ?>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <script type="module" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script type="module" src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
        <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
        <script type="module">
        $(document).ready(function () {
            $('#users').DataTable({
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
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ADSI\Documents\Project\sistema_llaves-main\resources\views/admin/usuarios.blade.php ENDPATH**/ ?>