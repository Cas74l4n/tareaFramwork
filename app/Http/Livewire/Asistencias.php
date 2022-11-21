<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Asistencia;

class Asistencias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_clase, $id_alumno, $id_maestro;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.asistencias.view', [
            'asistencias' => Asistencia::latest()
						->orWhere('id_clase', 'LIKE', $keyWord)
						->orWhere('id_alumno', 'LIKE', $keyWord)
						->orWhere('id_maestro', 'LIKE', $keyWord)
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
		$this->id_clase = null;
		$this->id_alumno = null;
		$this->id_maestro = null;
    }

    public function store()
    {
        $this->validate([
		'id_clase' => 'required',
		'id_alumno' => 'required',
		'id_maestro' => 'required',
        ]);

        Asistencia::create([ 
			'id_clase' => $this-> id_clase,
			'id_alumno' => $this-> id_alumno,
			'id_maestro' => $this-> id_maestro
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Asistencia Successfully created.');
    }

    public function edit($id)
    {
        $record = Asistencia::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_clase = $record-> id_clase;
		$this->id_alumno = $record-> id_alumno;
		$this->id_maestro = $record-> id_maestro;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_clase' => 'required',
		'id_alumno' => 'required',
		'id_maestro' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Asistencia::find($this->selected_id);
            $record->update([ 
			'id_clase' => $this-> id_clase,
			'id_alumno' => $this-> id_alumno,
			'id_maestro' => $this-> id_maestro
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
