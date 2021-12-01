<?php $__env->startSection('template_title'); ?>
    <?php echo e($promotion->name ?? 'Mostrar Promoción'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles de la Promoción</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="<?php echo e(route('promotions.index')); ?>"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            <?php echo e($promotion->cat); ?>

                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            <?php echo e($promotion->status); ?>

                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <?php echo e($promotion->name); ?>

                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            <?php echo e($promotion->description); ?>

                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            <?php echo e($promotion->price); ?>

                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong> <br>
                            <img src="/promo/<?php echo e($promotion->image); ?>" alt="Imagen del producto" class="img-thumbnail" style="width: 20%;">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/promotion/show.blade.php ENDPATH**/ ?>