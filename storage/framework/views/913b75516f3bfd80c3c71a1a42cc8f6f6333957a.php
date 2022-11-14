<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('asistencias')->html();
} elseif ($_instance->childHasBeenRendered('36SOrXG')) {
    $componentId = $_instance->getRenderedChildComponentId('36SOrXG');
    $componentTag = $_instance->getRenderedChildComponentTagName('36SOrXG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('36SOrXG');
} else {
    $response = \Livewire\Livewire::mount('asistencias');
    $html = $response->html();
    $_instance->logRenderedChild('36SOrXG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>     
    </div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/asistencias/index.blade.php ENDPATH**/ ?>