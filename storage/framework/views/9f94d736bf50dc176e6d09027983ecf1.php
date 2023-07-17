<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Inicio
    </h2>
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'administrador')): ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\ADSI\Documents\Project\sistema_llaves-main\resources\views/components/welcome.blade.php ENDPATH**/ ?>