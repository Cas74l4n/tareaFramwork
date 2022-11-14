<?php $__env->startSection('title', __('Welcome')); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h5><span class="text-center fa fa-home"></span> <?php echo $__env->yieldContent('title'); ?></h5></div>
            <div class="card-body">
              <h5>  
            <?php if(auth()->guard()->guest()): ?>
				
				<?php echo e(__('Welcome to')); ?> <?php echo e(config('app.name', 'Laravel')); ?> !!! </br>
				Please contact admin to get your Login Credentials or click "Login" to go to your Dashboard.
                
			<?php else: ?>
					Hi <?php echo e(Auth::user()->name); ?>, Welcome back to <?php echo e(config('app.name', 'Laravel')); ?>.
            <?php endif; ?>	
				</h5>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/welcome.blade.php ENDPATH**/ ?>