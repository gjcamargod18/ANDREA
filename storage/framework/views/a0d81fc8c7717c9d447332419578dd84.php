
<div>
    <!-- Modal toggle -->
    <button data-modal-target="staticModal" data-modal-toggle="staticModal"
        class="block text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-800 dark:focus:ring-gray-200"
        type="button">
        Crear llave
    </button>



  <!-- Main modal -->
  <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Crear llaves
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form class="space-y-6" method="POST" action="<?php echo e(route('crear-llave')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div>
                            <table id="ambientes-modal-table" class="w-full text-sm text-left text-gray-700 dark:text-gray-700">
                                <thead class="text-xs text-white uppercase shadow bg-lime-500 bg-lime-500 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre del ambiente
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $ambientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ambiente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-white border-b dark:bg-white dark:border-gray-200">
                                            <td class="px-6 py-4">
                                                <input id="default-radio-1" type="radio" value="<?php echo e($ambiente->id); ?>" id="id-ambiente" name="id-ambiente" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($ambiente->nombre_ambiente); ?></label>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!--<select id="id-ambiente" name="id-ambiente"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 dark:bg-white dark:border-bg-white dark:placeholder-gray-400 dark:text-black dark:focus:ring-lime-500 dark:focus:border-lime-500">
                            <option selected value="0">Seleccione un ambiente</option>
                        </select>-->
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'ml-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-4']); ?>
                    <?php echo e(__('Crear Llave')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </form>
                  <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cerrar</button>
              </div>
          </div>
      </div>
  </div>

    </div>
</div>
<script type="module">
    $(document).ready(function () {
        $('#ambientes-modal-table').DataTable({
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
<?php /**PATH C:\Users\ADSI\Documents\Project\sistema_llaves-main\resources\views/components/crear-l-lave.blade.php ENDPATH**/ ?>