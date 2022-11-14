<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('maestros')->html();
} elseif ($_instance->childHasBeenRendered('Z89Ex0Y')) {
    $componentId = $_instance->getRenderedChildComponentId('Z89Ex0Y');
    $componentTag = $_instance->getRenderedChildComponentTagName('Z89Ex0Y');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Z89Ex0Y');
} else {
    $response = \Livewire\Livewire::mount('maestros');
    $html = $response->html();
    $_instance->logRenderedChild('Z89Ex0Y', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>     
    </div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/maestros/index.blade.php ENDPATH**/ ?>