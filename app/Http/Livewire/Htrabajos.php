<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Htrabajo;

class Htrabajos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Id, $DiaSemana, $HoraDeInicio, $HoraFin;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.htrabajos.view', [
            'htrabajos' => Htrabajo::latest()
						->orWhere('Id', 'LIKE', $keyWord)
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
		$this->Id = null;
		$this->DiaSemana = null;
		$this->HoraDeInicio = null;
		$this->HoraFin = null;
    }

    public function store()
    {
        $this->validate([
		'Id' => 'required',
		'DiaSemana' => 'required',
		'HoraDeInicio' => 'required',
		'HoraFin' => 'required',
        ]);

        Htrabajo::create([ 
			'Id' => $this-> Id,
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Htrabajo Successfully created.');
    }

    public function edit($id)
    {
        $record = Htrabajo::findOrFail($id);

        $this->selected_id = $id; 
		$this->Id = $record-> Id;
		$this->DiaSemana = $record-> DiaSemana;
		$this->HoraDeInicio = $record-> HoraDeInicio;
		$this->HoraFin = $record-> HoraFin;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Id' => 'required',
		'DiaSemana' => 'required',
		'HoraDeInicio' => 'required',
		'HoraFin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Htrabajo::find($this->selected_id);
            $record->update([ 
			'Id' => $this-> Id,
			'DiaSemana' => $this-> DiaSemana,
			'HoraDeInicio' => $this-> HoraDeInicio,
			'HoraFin' => $this-> HoraFin
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Htrabajo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Htrabajo::where('id', $id);
            $record->delete();
        }
    }
}
