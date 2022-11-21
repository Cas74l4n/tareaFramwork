<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Maestro;

class Maestros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $Celular, $id_disiplina, $id_horario_trabajo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.maestros.view', [
            'maestros' => Maestro::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('Celular', 'LIKE', $keyWord)
						->orWhere('id_disiplina', 'LIKE', $keyWord)
						->orWhere('id_horario_trabajo', 'LIKE', $keyWord)
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
		$this->id_disiplina = null;
		$this->id_horario_trabajo = null;
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
        ]);

        Maestro::create([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular,
			'id_disiplina' => $this-> id_disiplina,
			'id_horario_trabajo' => $this-> id_horario_trabajo
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
		$this->id_disiplina = $record-> id_disiplina;
		$this->id_horario_trabajo = $record-> id_horario_trabajo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Maestro::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular,
			'id_disiplina' => $this-> id_disiplina,
			'id_horario_trabajo' => $this-> id_horario_trabajo
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
