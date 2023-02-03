<?php

namespace App\Http\Livewire\Devoluciones;

use Livewire\Component;
use App\Models\Devolucion;
use Livewire\WithPagination;
class TablaDevolucionesInactivas extends Component



{

    use WithPagination;
    protected $listeners = ['render' => 'render'];
    public $keyWord;
    public function render()

{      $keyWord = '%'.$this->keyWord .'%';

      $devolucionesInactivas=  Devolucion::onlyTrashed()->select('devolucions.id', 'Estado_Devolucion','devolucions.*', 'prestamos.Tipo_Elemento', 'Bibliotecario_Re', 'devolucions.created_at', 'Novedades', 'Estado_Devolucion', 'Cantidad_Devuelta', 'users.name', 'prestamos.Fecha_prestamo', 'libros.Nombre', 'elementos.nombre')


      ->where('Estado_Devolucion' ,'Inactiva')
      ->leftjoin('users', 'users.id', '=', 'devolucions.usuario_id')
            ->leftjoin('prestamos', 'prestamos.id', '=', 'devolucions.prestamos_id')
            ->leftjoin('libros', 'libros.id', '=', 'devolucions.libros_id')
            ->leftjoin('elementos', 'elementos.id', '=', 'devolucions.elementos_id')

            ->paginate(10)
            ;


        return view('livewire.devoluciones.tabla-devoluciones-inactivas',compact('devolucionesInactivas'));
    }



    public function  restaurarDevoluciones($id){

        $prestamoRestaurar = Devolucion::onlyTrashed()->where('id', $id)->first();


        if($prestamoRestaurar->Estado_Devolucion == 'Inactiva' ){
            $prestamoRestaurar->Estado_Devolucion = 'Activa';
            $prestamoRestaurar->save();
        }
        $prestamoRestaurar->restore();


        $this->dispatchBrowserEvent('swald', [
            'title' => 'Devolucion Restaurada Con Exito...',
            'icon'=>'success',
            'iconColor'=>'green',
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
        'iconColor'=>'green',
    ]);

    }
}
