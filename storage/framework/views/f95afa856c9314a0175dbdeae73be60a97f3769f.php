<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Great Style Store</title>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <script src="<?php echo e(asset('js/windows.js')); ?>"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body class="container-fluid">
         
        <nav class="navbar navbar-expand-md nav justify-content-center " >

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon">Menú</span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e('/'); ?>">GSS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e('products'); ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e('contact'); ?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e('about'); ?>">Sobre Nosotros</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar sesión')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::check()): ?>
                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Vista Admin</a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Cerrar sesión')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
           
        </nav>
    
        <nav class=" menu sticky-top ">
            <p class="logo"><b>Great Style Store</b></p>
        </nav>

        <!-- Intereactive Content-->
        <?php echo $__env->yieldContent('title'); ?>      
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->yieldContent('contacts'); ?>
        <?php echo $__env->yieldContent('admin'); ?>
        <?php echo $__env->yieldContent('create'); ?>

        <footer>
            <p>Visita También  </p> <a href="<?php echo e('/'); ?>">Home</a> | <a href="<?php echo e('products'); ?>">Productos</a> | <a href="<?php echo e('contact'); ?>">Contacto</a> | <a href="<?php echo e('about'); ?>">Sobre Nosotros</a>
            <div class="media">
                <a href="http://instagram.com" target="_blank" rel="noopener noreferrer"><img id="media" src="/img/instagram.png" alt="Instagram"></a>
                <a href="http://fb.com" target="_blank" rel="noopener noreferrer"><img id="media" src="/img/facebook.png" alt="Facebook"></a>
                <a href="mailto:eduar.mdrr@gmail.com"><img id="media" src="/img/mail.png" alt="Correo"></a>
            </div>
            <hr>
            <h6>Great Style Store, Derechos Reservados 2021</h6>
        </footer>

    </body>
</html><?php /**PATH C:\xampp\htdocs\Laravel\proLar02\resources\views/layout.blade.php ENDPATH**/ ?>