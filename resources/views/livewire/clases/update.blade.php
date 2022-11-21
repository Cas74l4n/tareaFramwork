<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="HoraSemana"></label>
                <input wire:model="HoraSemana" type="text" class="form-control" id="HoraSemana" placeholder="Horasemana">@error('HoraSemana') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_maestro"></label>
                <input wire:model="id_maestro" type="text" class="form-control" id="id_maestro" placeholder="Id Maestro">@error('id_maestro') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_alumno"></label>
                <input wire:model="id_alumno" type="text" class="form-control" id="id_alumno" placeholder="Id Alumno">@error('id_alumno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_hclase"></label>
                <input wire:model="id_hclase" type="text" class="form-control" id="id_hclase" placeholder="Id Hclase">@error('id_hclase') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_asistencia"></label>
                <input wire:model="id_asistencia" type="text" class="form-control" id="id_asistencia" placeholder="Id Asistencia">@error('id_asistencia') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
