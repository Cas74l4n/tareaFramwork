<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Clase;

class Clases extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $HoraSemana, $id_maestro, $id_alumno, $id_hclase, $id_asistencia;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.clases.view', [
            'clases' => Clase::latest()
						->orWhere('HoraSemana', 'LIKE', $keyWord)
						->orWhere('id_maestro', 'LIKE', $keyWord)
						->orWhere('id_alumno', 'LIKE', $keyWord)
						->orWhere('id_hclase', 'LIKE', $keyWord)
						->orWhere('id_asistencia', 'LIKE', $keyWord)
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
		$this->id_maestro = null;
		$this->id_alumno = null;
		$this->id_hclase = null;
		$this->id_asistencia = null;
    }

    public function store()
    {
        $this->validate([
		'HoraSemana' => 'required',
        ]);

        Clase::create([ 
			'HoraSemana' => $this-> HoraSemana,
			'id_maestro' => $this-> id_maestro,
			'id_alumno' => $this-> id_alumno,
			'id_hclase' => $this-> id_hclase,
			'id_asistencia' => $this-> id_asistencia
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
		$this->id_maestro = $record-> id_maestro;
		$this->id_alumno = $record-> id_alumno;
		$this->id_hclase = $record-> id_hclase;
		$this->id_asistencia = $record-> id_asistencia;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'HoraSemana' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Clase::find($this->selected_id);
            $record->update([ 
			'HoraSemana' => $this-> HoraSemana,
			'id_maestro' => $this-> id_maestro,
			'id_alumno' => $this-> id_alumno,
			'id_hclase' => $this-> id_hclase,
			'id_asistencia' => $this-> id_asistencia
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
