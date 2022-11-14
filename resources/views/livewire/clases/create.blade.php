<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Clase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="HoraSemana"></label>
                <input wire:model="HoraSemana" type="text" class="form-control" id="HoraSemana" placeholder="Horasemana">@error('HoraSemana') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_Maestro"></label>
                <input wire:model="id_Maestro" type="text" class="form-control" id="id_Maestro" placeholder="Id Maestro">@error('id_Maestro') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_Alumno"></label>
                <input wire:model="id_Alumno" type="text" class="form-control" id="id_Alumno" placeholder="Id Alumno">@error('id_Alumno') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_HorarioClase"></label>
                <input wire:model="id_HorarioClase" type="text" class="form-control" id="id_HorarioClase" placeholder="Id Horarioclase">@error('id_HorarioClase') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_Asistencia"></label>
                <input wire:model="id_Asistencia" type="text" class="form-control" id="id_Asistencia" placeholder="Id Asistencia">@error('id_Asistencia') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
