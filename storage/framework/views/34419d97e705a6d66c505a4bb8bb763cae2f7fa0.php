

<?php $__env->startSection('content'); ?>
<div class="container">

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Bienvenido Administrador <?php echo e(Auth::user()->name); ?></h4>
  <p>Ahora tienes acceso a agregar nuevas promociones o productos, actualizar o incluso eliminar contenido, en general, eres el Adminstrador.</p>
  <hr>
  <p class="mb-0">¿Qué harás hoy? <img src="/img/sun.svg"> </p>
</div>

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Panel
  </a>
  <a href="<?php echo e(url('promotions')); ?>" class="list-group-item list-group-item-action">
   <img src="/img/checklist.svg"> Administrar Promociones
  </a>
  <a href="<?php echo e(url('products')); ?>" class="list-group-item list-group-item-action">
  <img src="/img/checklist.svg"> Adminstrar Productos
  </a>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/admin.blade.php ENDPATH**/ ?>