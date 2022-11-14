<?php $__env->startSection('title', __('Asistencias')); ?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Asistencia Listing </h4>
						</div>
						<div wire:poll.60s>
							<code><h5><?php echo e(now()->format('H:i:s')); ?> UTC</h5></code>
						</div>
						<?php if(session()->has('message')): ?>
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> <?php echo e(session('message')); ?> </div>
						<?php endif; ?>
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Asistencias">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Add Asistencias
						</div>
					</div>
				</div>
				
				<div class="card-body">
						<?php echo $__env->make('livewire.asistencias.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<?php echo $__env->make('livewire.asistencias.update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Id Clase</th>
								<th>Id Alumno</th>
								<th>Id Maestro</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td> 
								<td><?php echo e($row->id_Clase); ?></td>
								<td><?php echo e($row->id_Alumno); ?></td>
								<td><?php echo e($row->id_Maestro); ?></td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit(<?php echo e($row->id); ?>)"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Asistencia id <?php echo e($row->id); ?>? \nDeleted Asistencias cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy(<?php echo e($row->id); ?>)"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>						
					<?php echo e($asistencias->links()); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\Laravel\example-app\resources\views/livewire/asistencias/view.blade.php ENDPATH**/ ?>