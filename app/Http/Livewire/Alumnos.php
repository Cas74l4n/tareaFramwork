<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alumno;

class Alumnos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre, $Celular;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alumnos.view', [
            'alumnos' => Alumno::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
						->orWhere('Celular', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
        ]);

        Alumno::create([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alumno Successfully created.');
    }

    public function edit($id)
    {
        $record = Alumno::findOrFail($id);

        $this->selected_id = $id; 
		$this->Nombre = $record-> Nombre;
		$this->Celular = $record-> Celular;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
		'Celular' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alumno::find($this->selected_id);
            $record->update([ 
			'Nombre' => $this-> Nombre,
			'Celular' => $this-> Celular
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alumno Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alumno::where('id', $id);
            $record->delete();
        }
    }
}
