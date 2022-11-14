<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('disiplinas')->html();
} elseif ($_instance->childHasBeenRendered('Siv6sSo')) {
    $componentId = $_instance->getRenderedChildComponentId('Siv6sSo');
    $componentTag = $_instance->getRenderedChildComponentTagName('Siv6sSo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Siv6sSo');
} else {
    $response = \Livewire\Livewire::mount('disiplinas');
    $html = $response->html();
    $_instance->logRenderedChild('Siv6sSo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>     
    </div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/disiplinas/index.blade.php ENDPATH**/ ?>