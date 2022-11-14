<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php if (! empty(trim($__env->yieldContent('title')))): ?> <?php echo $__env->yieldContent('title'); ?> | <?php endif; ?> <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	 <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					<?php if(auth()->guard()->check()): ?>
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">
                            <a href="<?php echo e(url('/maestros')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Maestros</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/horario_trabajos')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Horario_trabajos</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/horario_clases')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Horario_clases</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/disiplinas')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Disiplinas</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/clases')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Clases</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/asistencias')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Asistencias</a> 
                        </li>
						<li class="nav-item">
                            <a href="<?php echo e(url('/alumnos')); ?>" class="nav-link"><i class="fab fa-laravel text-info"></i> Alumnos</a> 
                        </li>
                    </ul>
					<?php endif; ?>
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>