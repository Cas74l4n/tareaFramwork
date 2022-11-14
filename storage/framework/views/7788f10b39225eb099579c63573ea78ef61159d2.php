<?php $__env->startSection('title', __('Maestros')); ?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Maestro Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5><?php echo e(now()->format('H:i:s')); ?> UTC</h5></code>
						</div>
						<?php if(session()->has('message')): ?>
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> <?php echo e(session('message')); ?> </div>
						<?php endif; ?>
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Maestros">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Maestros
						</div>
					</div>
				</div>
				
				<div class="card-body">
						<?php echo $__env->make('livewire.maestros.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php echo $__env->make('livewire.maestros.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Celular</th>
								<th>Id Disiplina</th>
								<th>Id Horariotrabajo</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $maestros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td> 
								<td><?php echo e($row->Nombre); ?></td>
								<td><?php echo e($row->Celular); ?></td>
								<td><?php echo e($row->id_Disiplina); ?></td>
								<td><?php echo e($row->id_HorarioTrabajo); ?></td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit(<?php echo e($row->id); ?>)"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Maestro id <?php echo e($row->id); ?>? \nDeleted Maestros cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy(<?php echo e($row->id); ?>)"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>						
					<?php echo e($maestros->links()); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/maestros/view.blade.php ENDPATH**/ ?>