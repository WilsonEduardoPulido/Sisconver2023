<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class CategoriasConfiguraciones extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $consulta = Categoria::all();
        return view('livewire.categorias-configuraciones',compact('consulta'));
        
    }


 

}
