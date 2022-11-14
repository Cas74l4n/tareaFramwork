<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('alumnos')->html();
} elseif ($_instance->childHasBeenRendered('ZO4rauN')) {
    $componentId = $_instance->getRenderedChildComponentId('ZO4rauN');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZO4rauN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZO4rauN');
} else {
    $response = \Livewire\Livewire::mount('alumnos');
    $html = $response->html();
    $_instance->logRenderedChild('ZO4rauN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>     
    </div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/alumnos/index.blade.php ENDPATH**/ ?>