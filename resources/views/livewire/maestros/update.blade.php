<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Maestro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="Nombre"></label>
                <input wire:model="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Celular"></label>
                <input wire:model="Celular" type="text" class="form-control" id="Celular" placeholder="Celular">@error('Celular') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_Disiplina"></label>
                <input wire:model="id_Disiplina" type="text" class="form-control" id="id_Disiplina" placeholder="Id Disiplina">@error('id_Disiplina') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_HorarioTrabajo"></label>
                <input wire:model="id_HorarioTrabajo" type="text" class="form-control" id="id_HorarioTrabajo" placeholder="Id Horariotrabajo">@error('id_HorarioTrabajo') <span class="error text-danger">{{ $message }}</span> @enderror
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
