<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maestro;

class Maestros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $Celular, $id_Disiplina, $id_HorarioTrabajo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.maestros.view', [
            'maestros' => Maestro::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('Celular', 'LIKE', $keyWord)
						->orWhere('id_Disiplina', 'LIKE', $keyWord)
						->orWhere('id_HorarioTrabajo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->Nombre = null;
		$this->Celular = null;
		$this->id_Disiplina = null;
		$this->id_HorarioTrabajo = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
		'id_Disiplina' => 'required',
		'id_HorarioTrabajo' => 'required',
        ]);

        Maestro::create([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular,
			'id_Disiplina' => $this-> id_Disiplina,
			'id_HorarioTrabajo' => $this-> id_HorarioTrabajo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Maestro Successfully created.');
    }

    public function edit($id)
    {
        $record = Maestro::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->Celular = $record-> Celular;
		$this->id_Disiplina = $record-> id_Disiplina;
		$this->id_HorarioTrabajo = $record-> id_HorarioTrabajo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
		'id_Disiplina' => 'required',
		'id_HorarioTrabajo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Maestro::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular,
			'id_Disiplina' => $this-> id_Disiplina,
			'id_HorarioTrabajo' => $this-> id_HorarioTrabajo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Maestro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Maestro::where('id', $id);
            $record->delete();
        }
    }
}
