<?php

namespace App\Http\Livewire\Devoluciones;

use Livewire\Component;
use App\Models\ModeloDevolucion\Devolucion;
use Livewire\WithPagination;
class TablaDevolucionesInactivas extends Component



{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render' => 'render'];
    public $keyWord;
    public function render()

    {      $keyWord = '%'.$this->keyWord .'%';

        $devolucionesInactivas =  Devolucion::onlyTrashed()->paginate(10);





        return view('livewire.devoluciones.tabla-devoluciones-inactivas',compact('devolucionesInactivas'));
    }



    public function  restaurarDevoluciones($id){

        $prestamoRestaurar = Devolucion::onlyTrashed()->where('id', $id)->first();


        if($prestamoRestaurar->Estado_Devolucion == 'Inactiva' ){
            $prestamoRestaurar->Estado_Devolucion = 'Activa';
            $prestamoRestaurar->save();
        }
        $prestamoRestaurar->restore();


        $this->dispatchBrowserEvent('crear', [
            'title' => 'Devolucion Restaurada Con Exito...',
            'icon'=>'success',

        ]);

        $this->emit('render');

    }





    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMenteDevolucion($id){

        $prestamoEliminarT =Devolucion::onlyTrashed()->where('id', $id)->first();

        $prestamoEliminarT->forceDelete();
        $this->dispatchBrowserEvent('swald', [
            'title' => 'Devolucion eliminada del sistema..',
            'icon'=>'success',

        ]);

    }
}
