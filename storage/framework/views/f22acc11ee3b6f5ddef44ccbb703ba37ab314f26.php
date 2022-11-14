<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('clases')->html();
} elseif ($_instance->childHasBeenRendered('JzFXtmr')) {
    $componentId = $_instance->getRenderedChildComponentId('JzFXtmr');
    $componentTag = $_instance->getRenderedChildComponentTagName('JzFXtmr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JzFXtmr');
} else {
    $response = \Livewire\Livewire::mount('clases');
    $html = $response->html();
    $_instance->logRenderedChild('JzFXtmr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>     
    </div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/clases/index.blade.php ENDPATH**/ ?>