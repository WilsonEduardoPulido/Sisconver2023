<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Devolucion;

class Devoluciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Fecha_devolucion, $prestamos_id, $libros_id, $elementos_id, $usuario_id, $curso_id;

//Detalles Devolucion

protected $listeners = ['render' => 'render'];

    public $NombreBibliotecario,$fechaDevo,  $tipoPresta, $nombreAlumno,$apellidoAlumno,$direccionA,$celularA,$tipocDocA,$numeroDocA,$gradoA,$nombreArticulo,$novedadesA,$bibliotecarioR,$Fecha_Prestamo,$cantidaD,$cantidadP;


    public function render()
    {




		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.devoluciones.vistaprincipal', [
            'devoluciones' => Devolucion::select( 'devolucions.id','devolucions.Estado_Devolucion','prestamos.Tipo_Elemento' ,'Bibliotecario_Re', 'devolucions.created_at','Estado_Devolucion','Cantidad_Devuelta', 'users.name' ,'libros.Nombre' ,'elementos.nombre')
->leftjoin('users', 'users.id', '=', 'devolucions.usuario_id')
->leftjoin('prestamos', 'prestamos.id', '=', 'devolucions.prestamos_id')
->leftjoin('libros', 'libros.id', '=', 'devolucions.libros_id')
->leftjoin('elementos', 'elementos.id', '=', 'devolucions.elementos_id')
->where('users.name', 'LIKE', $keyWord)
->orWhere('libros.Nombre', 'LIKE', $keyWord)
->orWhere('elementos.nombre', 'LIKE', $keyWord)
->orWhere('devolucions.created_at', 'LIKE', $keyWord)
->orWhere('Cantidad_Devuelta', 'LIKE', $keyWord)
->orderBy('devolucions.id', 'desc')
->paginate(10),
		]);



    }

    public function cancelar()
    {
        $this->limpiarCampos();
    }

    private function limpiarCampos()
    {
        $this->fechaDevo =null;

            $this->NombreBibliotecario =null;
            $this->tipoPresta =null;
            $this->nombreAlumno =null;
            $this->apellidoAlumno =null;

            $this->direccionA =null;

            $this->celularA =null;
            $this->tipocDocA =null;

            $this->numeroDocA =null;

            $this->gradoA =null;

            $this->nombreArticulo =null;

            $this->novedadesA =null;

            $this->bibliotecarioR =null;

            $this->Fecha_Prestamo =null;

            $this->cantidaD =null;
            $this->cantidadP = null;
    }



	public function verDetallesDevoluciones($id){



        $detallesDevolucionConsulta = Devolucion::select('devolucions.Cantidad_Devuelta','prestamos.CantidadPrestada','prestamos.NombreBibliotecario','prestamos.Tipo_Elemento', 'libros.id', 'prestamos.id','libros.Nombre','users.*' ,'elementos.nombre', 'devolucions.created_at','devolucions.Novedades','devolucions.Bibliotecario_Re', 'prestamos.Fecha_prestamo', 'users.name' ,'users.lastname' ,'users.TipoDoc','users.Grado','users.NumeroDoc' )
            ->leftjoin('users', 'users.id', '=', 'devolucions.usuario_id')
            ->leftjoin('prestamos', 'prestamos.id', '=', 'devolucions.prestamos_id')
            ->leftjoin('libros', 'libros.id', '=', 'devolucions.libros_id')
            ->leftjoin('elementos', 'elementos.id', '=', 'devolucions.elementos_id')


            ->where('devolucions.id', '=', $id)
            ->first();
            ;



        $this->fechaDevo = $detallesDevolucionConsulta->created_at;

        $this->NombreBibliotecario = $detallesDevolucionConsulta->NombreBibliotecario;
        $this->tipoPresta = $detallesDevolucionConsulta->Tipo_Elemento;
        $this->nombreAlumno = $detallesDevolucionConsulta->name;
       $this-> apellidoAlumno=$detallesDevolucionConsulta->lastname;

       $this-> direccionA=$detallesDevolucionConsulta->direccion;

      $this->  celularA=$detallesDevolucionConsulta->celular;
       $this-> tipocDocA=$detallesDevolucionConsulta->TipoDoc;

       $this-> numeroDocA=$detallesDevolucionConsulta->NumeroDoc;

       $this-> gradoA =$detallesDevolucionConsulta->Grado;


       if($detallesDevolucionConsulta->Tipo_Elemento == 'Elemento'){
        $this-> nombreArticulo =$detallesDevolucionConsulta->nombre;

       }else{
        $this-> nombreArticulo =$detallesDevolucionConsulta->Nombre;

       }


      $this-> novedadesA=$detallesDevolucionConsulta->Novedades;

        $this->bibliotecarioR=$detallesDevolucionConsulta->Bibliotecario_Re;

        $this->Fecha_Prestamo=$detallesDevolucionConsulta->Fecha_prestamo;

        $this->cantidaD = $detallesDevolucionConsulta->Cantidad_Devuelta;
        $this->cantidadP = $detallesDevolucionConsulta->CantidadPrestada;






	}






    //Eliminar De Manera Temporal Categoria
    public function inactivarDevolucion($id)
    {


        $devolucionInactivar = Devolucion::find($id);

        if($devolucionInactivar->Estado_Devolucion == 'Activa' ){
            $devolucionInactivar->Estado_Devolucion = 'Inactiva';
            $devolucionInactivar->save();
            $devolucionInactivar->delete();


            $this->dispatchBrowserEvent('swald', [
                'title' => 'Devolucion Inactivada Con Exito..',
                'icon'=>'success',
                'iconColor'=>'green',
            ]);


    }
    $this->emit('render');

    }

//Restaurar Categoria Eliminada

    public function restaurarDevolucion($id){
        $devolucionRestaurar = Devolucion::onlyTrashed()->where('id', $id)->first();
        if($devolucionRestaurar->Estado == 'Inactiva'){
            $devolucionRestaurar->Estado = 'Activa';
            $devolucionRestaurar->save();
        }
        $devolucionRestaurar->restore();


        $this->dispatchBrowserEvent('swald', [
            'title' => 'Devolucion Restaurada Con Exito...',
            'icon'=>'success',
            'iconColor'=>'green',
        ]);

    }


        //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMenteDevolucion($id){

    $devolucionEliminarTotalmente =Devolucion::onlyTrashed()->where('id', $id)->first();

    $devolucionEliminarTotalmente->forceDelete();
    $this->dispatchBrowserEvent('swal', [
        'title' => 'Devolucion Eliminada Del Sistema...',
        'icon'=>'danger',
        'iconColor'=>'red',
    ]);

    }
}
