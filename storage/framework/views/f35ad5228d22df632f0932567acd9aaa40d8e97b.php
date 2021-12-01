<?php $__env->startSection('template_title'); ?>
    Promotion
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="welcome">
        <div class="info">
           <h1>¡Bienvenido/a a su tienda <b>Great Style</b>! </h1> <br>
            <h2>Lo mejor en accesorios para damas y caballeros.</h2> 
        </div>
        
        <video muted autoplay loop>
            <source src="/img/bg.mp4" type="video/mp4">
        </video>
        <div class="capa"></div>
    </div>
    <div class="promo">
        <br>
        <div class="intro">
            <h2>Viste bien con éstas promociones especiales para Diciembre.</h2>
        </div>
        <br>

        <!-- Titulo  -->
        <?php if(Auth::check()): ?>
        <div class="admin">
            <span id="card_title">
                <?php echo e(__('Promociones')); ?>

            </span>

            <div class="float-none">
                <span id="card_title">
                <?php echo e(__('Bienvenido Administrador')); ?>

                <?php echo e(Auth::user()->name); ?>

                </span>
                <a onclick="f_new_product()" class="btn btn-primary btn-sm float-none"  data-placement="none">
                <img src="/img/plus-circle.svg">
                <?php echo e(__('Crear Nueva Promoción')); ?>

                </a>
            </div>

            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>

        </div>
        <?php endif; ?>

        <br>
        <div class="nombre_cat">
            <h1>Accesorios para damas</h1>
        </div>
        <br>

        <!-- Promociones para damas-->

        <?php $__currentLoopData = $categoriaD; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="c-promo" id="card01">

                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo e($categoria->cat); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <img src="/promo/<?php echo e($categoria->image); ?>" alt="Imagen del producto" class="img-fluid" style="width: 80%;">
                            </th>
                        </tr>
                        <?php if(Auth::check()): ?>
                        <tr>
                            <th scope="row">Disponible</th>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?php echo e($categoria->name); ?></th>
                        <tr>
                        <tr>
                            <th scope="row"><?php echo e($categoria->description); ?></th>
                        </tr>
                        <tr>
                            <th scope="row">$ <?php echo e($categoria->price); ?></th>
                        </tr>
                        <?php if(Auth::check()): ?>
                        <tr>
                        <th scope="row">
                                <form action="<?php echo e(route('promotions.destroy',$categoria->id)); ?>" method="POST">
                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('promotions.show',$categoria->id)); ?>">
                                        <i class="fa fa-fw fa-eye"></i>
                                        <img src="/img/eye.svg">
                                        Ver
                                    </a>
                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('promotions.edit',$categoria->id)); ?>">
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
                            </th>
                        </tr>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <!-- Final Promociones para damas-->

        <br> <br>
        <div class="nombre_cat">
            <h1>Accesorios para caballeros</h1>
        </div>
        <br>

        <!-- Promociones para caballeros-->

        <?php $__currentLoopData = $categoriaC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="c-promo" id="card01">

                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo e($categoria->cat); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <img src="/promo/<?php echo e($categoria->image); ?>" alt="Imagen del producto" class="img-fluid" style="width: 80%;">
                            </th>
                        </tr>
                        <?php if(Auth::check()): ?>
                        <tr>
                            <th scope="row">Disponible</th>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?php echo e($categoria->name); ?></th>
                        <tr>
                        <tr>
                            <th scope="row"><?php echo e($categoria->description); ?></th>
                        </tr>
                        <tr>
                            <th scope="row">$ <?php echo e($categoria->price); ?></th>
                        </tr>

                        <?php if(Auth::check()): ?>
                        <tr>
                            <th scope="row">
                                <form action="<?php echo e(route('promotions.destroy',$categoria->id)); ?>" method="POST">
                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('promotions.show',$categoria->id)); ?>">
                                        <i class="fa fa-fw fa-eye"></i>
                                        <img src="/img/eye.svg">
                                        Ver
                                    </a>
                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('promotions.edit',$categoria->id)); ?>">
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
                            </th>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                
            </div>
            
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <!-- Final Promociones para caballeros-->

        <!-- Admin -->
        <?php if(Auth::check()): ?>
        <br> <br>
        <div class="nombre_cat">
            <h1>Accesorios No publicados</h1>
        </div>
        <br>
        <?php $__currentLoopData = $categoriaNP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="c-promo" id="card01">

                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"><?php echo e($categoria->cat); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <img src="/promo/<?php echo e($categoria->image); ?>" alt="Imagen del producto" class="img-fluid" style="width: 80%;">
                            </th>
                        </tr>
                        <?php if(Auth::check()): ?>
                        <tr>
                            <th scope="row">No Publicado</th>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?php echo e($categoria->name); ?></th>
                        <tr>
                        <tr>
                            <th scope="row"><?php echo e($categoria->description); ?></th>
                        </tr>
                        <tr>
                            <th scope="row">$ <?php echo e($categoria->price); ?></th>
                        </tr>

                        <?php if(Auth::check()): ?>
                        <tr>
                            <th scope="row">
                                <form action="<?php echo e(route('promotions.destroy',$categoria->id)); ?>" method="POST">
                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('promotions.show',$categoria->id)); ?>">
                                        <i class="fa fa-fw fa-eye"></i>
                                        <img src="/img/eye.svg">
                                        Ver
                                    </a>
                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('promotions.edit',$categoria->id)); ?>">
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
                            </th>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                
            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <!-- Final Admin -->
    </div>

    <div class="jumbotron jumbotron-fluid" id="jb01">
        <div class="container">
            <h3 class="display-6">Ver todos nuestros Productos en el siguiente enlace</h3>
            <button type="button" class="btn btn-dark" > <a href="<?php echo e('products'); ?>">Todos los productos</a> </button>   
        </div>
        
    </div>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Ahora puedes hacer tus pagos con <img class="btc" src="/img/btc.png" alt="BTC" srcset=""></h1>
            <p class="lead">Tienes toda libertad para poder cancelar con Bitcoin, recuarda que si deseas pagar en efectivo también puedes hacerlo.</p>
            <a href="<?php echo e('contact'); ?>">Ver más información</a>
        </div>
    </div>
    
    <script>
        function f_new_product() {
        
            // abre una nueva window como popup //
            var page = '<?php echo e(route('promotions.create')); ?>';
            var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
            
            // enfoque en la nueva window //
            myWindow.focus();

        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/promotion/index.blade.php ENDPATH**/ ?>