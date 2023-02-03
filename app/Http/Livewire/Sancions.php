<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sancion;

class Sancions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Descripcion, $Estado, $usuario_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sancions.view', [
            'sancions' => Sancion::latest()
						->orWhere('Descripcion', 'LIKE', $keyWord)
						->orWhere('Estado', 'LIKE', $keyWord)
						->orWhere('usuario_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->Descripcion = null;
		$this->Estado = null;
		$this->usuario_id = null;
    }

    public function store()
    {
        $this->validate([
		'Descripcion' => 'required',
		'Estado' => 'required',
		'usuario_id' => 'required',
        ]);

        Sancion::create([ 
			'Descripcion' => $this-> Descripcion,
			'Estado' => $this-> Estado,
			'usuario_id' => $this-> usuario_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Sancion Successfully created.');
    }

    public function edit($id)
    {
        $record = Sancion::findOrFail($id);
        $this->selected_id = $id; 
		$this->Descripcion = $record-> Descripcion;
		$this->Estado = $record-> Estado;
		$this->usuario_id = $record-> usuario_id;
    }

    public function update()
    {
        $this->validate([
		'Descripcion' => 'required',
		'Estado' => 'required',
		'usuario_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sancion::find($this->selected_id);
            $record->update([ 
			'Descripcion' => $this-> Descripcion,
			'Estado' => $this-> Estado,
			'usuario_id' => $this-> usuario_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Sancion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Sancion::where('id', $id)->delete();
        }
    }
}