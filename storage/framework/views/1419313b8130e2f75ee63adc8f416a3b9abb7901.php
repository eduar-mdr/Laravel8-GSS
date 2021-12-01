<?php $__env->startSection('template_title'); ?>
    Productos | Great Style Store
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="promo">
        <br>
        <div class="intro">
            <br><br>
            <h2>Los <b>mejores</b> accesosrios para ti.</h2>
        </div>
        <br>

        <!-- Titulo  -->
        <br>
        <?php if(Auth::check()): ?>
        <div class="admin">

            <span id="card_title">
                <?php echo e(__('Productos')); ?>

            </span>
            <div class="float-none">
                <span id="card_title">
                <?php echo e(__('Bienvenido Administrador')); ?>

                <?php echo e(Auth::user()->name); ?>

                </span>
                <a  onclick="f_new_product()" class="btn btn-primary btn-sm float-none"  data-placement="none">
                <img src="/img/plus-circle.svg">
                <?php echo e(__('Crear Nuevo Producto')); ?>

                </a>
            </div>

            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <br>
        <?php endif; ?>


        <!-- Prductos -->
        <?php $__currentLoopData = $productsR; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-promo" id="card02">
                <div class="p-promo-c-l">
                    <img src="/image/<?php echo e($product->image); ?>" alt="Imagen del producto" class="img-fluid" style="width: 80%;">
                </div>
                <div class="p-promo-c-r">
                    
                    <div class="details"><b><?php echo e($product->cat); ?></b></div> 

                    <?php if(Auth::check()): ?>
                    <div class="details">Publicado</div>
                    <?php endif; ?>

                    <div class="details"><?php echo e($product->name); ?></div>
                    <div class="details"><?php echo e($product->description); ?></div>
                    <div class="details">$ <?php echo e($product->price); ?></div>

                    <?php if(Auth::check()): ?>
                    <div class="details">
                        <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
                            <a class="btn btn-sm btn-primary " href="<?php echo e(route('products.show',$product->id)); ?>">
                            <i class="fa fa-fw fa-eye"></i> 
                            <img src="/img/eye.svg">
                            Ver
                            </a>
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('products.edit',$product->id)); ?>">
                            <i class="fa fa-fw fa-edit"></i> 
                            <img src="/img/pencil.svg">
                            Editar
                            </a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-fw fa-trash"></i> 
                            <img src="/img/x-circle.svg">
                            Borrar
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php echo $products->links(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(Auth::check()): ?>

        <br> <br>
        <div class="nombre_cat">
            <h1>Accesorios No Publicados</h1>
        </div>
        <br>
        
        <?php $__currentLoopData = $productsNP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-promo" id="card02">
                <div class="p-promo-c-l">
                    <img src="/image/<?php echo e($product->image); ?>" alt="Imagen del producto" class="img-fluid" style="width: 80%;">
                </div>
                <div class="p-promo-c-r">
                    
                    <div class="details"><b><?php echo e($product->cat); ?></b></div> 

                    <?php if(Auth::check()): ?>
                    <div class="details">No Publicado</div>
                    <?php endif; ?>

                    <div class="details"><?php echo e($product->name); ?></div>
                    <div class="details"><?php echo e($product->description); ?></div>
                    <div class="details">$ <?php echo e($product->price); ?></div>

                    <?php if(Auth::check()): ?>
                    <div class="details">
                    <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
                            <a class="btn btn-sm btn-primary " href="<?php echo e(route('products.show',$product->id)); ?>">
                            <i class="fa fa-fw fa-eye"></i> 
                            <img src="/img/eye.svg">
                            Ver
                            </a>
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('products.edit',$product->id)); ?>">
                            <i class="fa fa-fw fa-edit"></i> 
                            <img src="/img/pencil.svg">
                            Editar
                            </a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-fw fa-trash"></i> 
                            <img src="/img/x-circle.svg">
                            Borrar
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php echo $products->links(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
    
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Ahora puedes hacer tus pagos con <img class="btc" src="/img/btc.png" alt="BTC" srcset=""></h1>
        <p class="lead">Tienes toda libertad para poder cancelar con Bitcoin, recuarda que si deseas pagar en efectivo tambien puedes hacerlo.</p>
        <a href="<?php echo e('contact'); ?>">Ver más información</a>
    </div>
    </div>

    <script>
        function f_new_product() {
        
            // open the page as popup //
            var page = '<?php echo e(route('products.create')); ?>';
            var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
            
            // focus on the popup //
            myWindow.focus();

        }
    </script>
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/product/index.blade.php ENDPATH**/ ?>