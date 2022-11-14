<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asistencia;

class Asistencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_Clase, $id_Alumno, $id_Maestro;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.asistencias.view', [
            'asistencias' => Asistencia::latest()
						->orWhere('id_Clase', 'LIKE', $keyWord)
						->orWhere('id_Alumno', 'LIKE', $keyWord)
						->orWhere('id_Maestro', 'LIKE', $keyWord)
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
		$this->id_Clase = null;
		$this->id_Alumno = null;
		$this->id_Maestro = null;
    }

    public function store()
    {
        $this->validate([
		'id_Clase' => 'required',
		'id_Alumno' => 'required',
		'id_Maestro' => 'required',
        ]);

        Asistencia::create([ 
			'id_Clase' => $this-> id_Clase,
			'id_Alumno' => $this-> id_Alumno,
			'id_Maestro' => $this-> id_Maestro
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Asistencia Successfully created.');
    }

    public function edit($id)
    {
        $record = Asistencia::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_Clase = $record-> id_Clase;
		$this->id_Alumno = $record-> id_Alumno;
		$this->id_Maestro = $record-> id_Maestro;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_Clase' => 'required',
		'id_Alumno' => 'required',
		'id_Maestro' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Asistencia::find($this->selected_id);
            $record->update([ 
			'id_Clase' => $this-> id_Clase,
			'id_Alumno' => $this-> id_Alumno,
			'id_Maestro' => $this-> id_Maestro
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Asistencia Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Asistencia::where('id', $id);
            $record->delete();
        }
    }
}
