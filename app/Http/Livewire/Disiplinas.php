<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Disiplina;

class Disiplinas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.disiplinas.view', [
            'disiplinas' => Disiplina::latest()
						->orWhere('Nombre', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        Disiplina::create([
			'Nombre' => $this-> Nombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Disiplina Successfully created.');
    }

    public function edit($id)
    {
        $record = Disiplina::findOrFail($id);

        $this->selected_id = $id;
		$this->Nombre = $record-> Nombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'Nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Disiplina::find($this->selected_id);
            $record->update([
			'Nombre' => $this-> Nombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Disiplina Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Disiplina::where('id', $id);
            $record->delete();
        }
    }
}
