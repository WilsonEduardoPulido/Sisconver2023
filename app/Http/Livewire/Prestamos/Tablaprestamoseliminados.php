<?php

namespace App\Http\Livewire\Prestamos;

use Livewire\Component;
use App\Models\Prestamo;
use Livewire\WithPagination;
class Tablaprestamoseliminados extends Component
{

    use WithPagination;
    public $buscadorPrestamos;
    protected $listeners = ['render' => 'render'];
    protected $paginationTheme = 'bootstrap';
    public function render()


    {

        $buscadorPrestamos = '%'.$this->buscadorPrestamos .'%';

       
        $prestamosEliminados= Prestamo::select('prestamos.*', 'users.name', 'users.lastname')
       
        ->where('prestamos.Estado_Prestamo', 'Inactivo')
        ->orWhere('prestamos.created_at', 'like', $buscadorPrestamos)
        ->orWhere('prestamos.Tipo_Elemento', 'like', $buscadorPrestamos)
        ->orWhere('prestamos.Codigo_Prestamo', 'like', $buscadorPrestamos)
        ->orWhere('users.name', 'like', $buscadorPrestamos)
      
       
        ->leftjoin('users', 'prestamos.usuario_id', '=', 'users.id')
        ->orderBy('prestamos.id', 'desc')
        ->paginate(8);


        return view('livewire.prestamos.tablaprestamoseliminados',compact('prestamosEliminados'));
    }





    //Restaurar Prestamo Eliminada

    public function restaurarPrestamo($id){


        $prestamoRestaurar = Prestamo::onlyTrashed()->where('id', $id)->first();


        if($prestamoRestaurar->Estado_Prestamo == 'Inactivo' ){
            $prestamoRestaurar->Estado_Prestamo = 'Activo';
            $prestamoRestaurar->save();
        }elseif($prestamoRestaurar->Estado_Prestamo =='Finalizado'){

            $prestamoRestaurar->Estado_Prestamo = 'Finalizado';
            $prestamoRestaurar->save();

        }
        $prestamoRestaurar->restore();


        $this->dispatchBrowserEvent('crear', [
            'title' => 'Prestamo Restaurado Con Exito...',
            'icon'=>'success',

        ]);

        $this->emit('render');
    }


    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMente($id){

        $ide = $id;
        $prestamoEliminarT =Prestamo::onlyTrashed()->where('id', $ide)->first();

        $prestamoEliminarT->forceDelete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Categoria Eliminada Del Sistema...',
            'icon'=>'danger',
            'iconColor'=>'red',
        ]);

    }




}