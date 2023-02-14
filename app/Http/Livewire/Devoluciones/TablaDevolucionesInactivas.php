<?php

namespace App\Http\Livewire\Devoluciones;

use Livewire\Component;
use App\Models\ModeloDevolucion\Devolucion;
use Livewire\WithPagination;
class TablaDevolucionesInactivas extends Component



{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render' => 'render','eliminarsDev'=> 'eliminarTotalMenteDevolucion'];
    public $keyWord;
    public function render()

    {      $keyWord = '%'.$this->keyWord .'%';

        $devolucionesInactivas =  $devolucion = Devolucion::select('users.*','devoluciones.*','devoluciones.Estado_Devolucion','devoluciones.deleted_at')
            ->join('users','users.id',"=",'devoluciones.usuario_id')
            ->where('devoluciones.Estado_Devolucion','Inactiva')
            ->onlyTrashed()
   ->paginate(7);





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



    public function llamarModalEliminarDevol($id){

        $this->dispatchBrowserEvent('eliminarT', [
            'type' => 'warning',
            'title' => '¿Estas Seguro De Inactivar El Libro?',
            'id' => $id,

        ]);
    }

    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMenteDevolucion($id){

        $prestamoEliminarT =Devolucion::onlyTrashed()->where('id', $id)->first();

        $prestamoEliminarT->forceDelete();


    }

    public function cancelar()
    {
        $this->limpiarCampos();
    }

    private function limpiarCampos()
    {
        $this->fechaDevo = null;

        $this->NombreBibliotecario = null;
        $this->tipoPresta = null;
        $this->nombreAlumno = null;
        $this->apellidoAlumno = null;

        $this->direccionA = null;

        $this->celularA = null;
        $this->tipocDocA = null;

        $this->numeroDocA = null;

        $this->gradoA = null;

        $this->nombreArticulo = null;

        $this->novedadesA = null;

        $this->bibliotecarioR = null;

        $this->Fecha_Prestamo = null;

        $this->cantidaD = null;
        $this->cantidadP = null;
    }


}
