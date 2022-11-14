<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HorarioClase;

class HorarioClases extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $DiaSemana, $HoraDeInicio, $HoraFin;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horarioClases.view', [
            'horarioClases' => HorarioClase::latest()
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

        HorarioClase::create([ 
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'HorarioClase Successfully created.');
    }

    public function edit($id)
    {
        $record = HorarioClase::findOrFail($id);

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
			$record = HorarioClase::find($this->selected_id);
            $record->update([ 
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'HorarioClase Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = HorarioClase::where('id', $id);
            $record->delete();
        }
    }
}
