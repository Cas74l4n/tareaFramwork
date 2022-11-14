<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Clase;

class Clases extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $HoraSemana, $id_Maestro, $id_Alumno, $id_HorarioClase, $id_Asistencia;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.clases.view', [
            'clases' => Clase::latest()
						->orWhere('HoraSemana', 'LIKE', $keyWord)
						->orWhere('id_Maestro', 'LIKE', $keyWord)
						->orWhere('id_Alumno', 'LIKE', $keyWord)
						->orWhere('id_HorarioClase', 'LIKE', $keyWord)
						->orWhere('id_Asistencia', 'LIKE', $keyWord)
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
		$this->HoraSemana = null;
		$this->id_Maestro = null;
		$this->id_Alumno = null;
		$this->id_HorarioClase = null;
		$this->id_Asistencia = null;
    }

    public function store()
    {
        $this->validate([
		'HoraSemana' => 'required',
		'id_Maestro' => 'required',
		'id_Alumno' => 'required',
		'id_HorarioClase' => 'required',
		'id_Asistencia' => 'required',
        ]);

        Clase::create([ 
			'HoraSemana' => $this-> HoraSemana,
			'id_Maestro' => $this-> id_Maestro,
			'id_Alumno' => $this-> id_Alumno,
			'id_HorarioClase' => $this-> id_HorarioClase,
			'id_Asistencia' => $this-> id_Asistencia
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Clase Successfully created.');
    }

    public function edit($id)
    {
        $record = Clase::findOrFail($id);

        $this->selected_id = $id; 
		$this->HoraSemana = $record-> HoraSemana;
		$this->id_Maestro = $record-> id_Maestro;
		$this->id_Alumno = $record-> id_Alumno;
		$this->id_HorarioClase = $record-> id_HorarioClase;
		$this->id_Asistencia = $record-> id_Asistencia;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'HoraSemana' => 'required',
		'id_Maestro' => 'required',
		'id_Alumno' => 'required',
		'id_HorarioClase' => 'required',
		'id_Asistencia' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Clase::find($this->selected_id);
            $record->update([ 
			'HoraSemana' => $this-> HoraSemana,
			'id_Maestro' => $this-> id_Maestro,
			'id_Alumno' => $this-> id_Alumno,
			'id_HorarioClase' => $this-> id_HorarioClase,
			'id_Asistencia' => $this-> id_Asistencia
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Clase Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Clase::where('id', $id);
            $record->delete();
        }
    }
}
