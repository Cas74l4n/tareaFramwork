<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HorarioTrabajo;

class HorarioTrabajos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $DiaSemana, $HoraDeInicio, $HoraFin;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horarioTrabajos.view', [
            'horarioTrabajos' => HorarioTrabajo::latest()
						->orWhere('DiaSemana', 'LIKE', $keyWord)
						->orWhere('HoraDeInicio', 'LIKE', $keyWord)
						->orWhere('HoraFin', 'LIKE', $keyWord)
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
		$this->DiaSemana = null;
		$this->HoraDeInicio = null;
		$this->HoraFin = null;
    }

    public function store()
    {
        $this->validate([
		'DiaSemana' => 'required',
		'HoraDeInicio' => 'required',
		'HoraFin' => 'required',
        ]);

        HorarioTrabajo::create([ 
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'HorarioTrabajo Successfully created.');
    }

    public function edit($id)
    {
        $record = HorarioTrabajo::findOrFail($id);

        $this->selected_id = $id; 
		$this->DiaSemana = $record-> DiaSemana;
		$this->HoraDeInicio = $record-> HoraDeInicio;
		$this->HoraFin = $record-> HoraFin;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'DiaSemana' => 'required',
		'HoraDeInicio' => 'required',
		'HoraFin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = HorarioTrabajo::find($this->selected_id);
            $record->update([ 
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'HorarioTrabajo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = HorarioTrabajo::where('id', $id);
            $record->delete();
        }
    }
}
