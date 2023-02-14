<?php

namespace App\Http\Livewire\ComponenteDevoluciones;

use App\Models\Devoluciones\Detalle_Devolucion;
use App\Models\ModeloPrestamo\Prestamo;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ModeloDevolucion\Devolucion;

class Devoluciones extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $Fecha_devolucion, $prestamos_id, $libros_id, $elementos_id, $usuario_id, $curso_id, $buscadorDevoluciones;

//Detalles Devolucion

    protected $listeners = ['render' => 'render','eliminarTemporalDevolucion'=> 'inactivarDevolucion'];

    public $NombreBibliotecario, $fechaDevo, $tipoPresta, $nombreAlumno, $apellidoAlumno, $direccionA, $celularA, $tipocDocA, $numeroDocA, $gradoA, $nombreArticulo, $novedadesA, $bibliotecarioR, $Fecha_Prestamo, $cantidaD, $cantidadP, $detallesDevolucionConsulta = [];


    public function render()
    {


        $buscadorDevoluciones = '%' . $this->buscadorDevoluciones . '%';
        return view('livewire.devoluciones.devoluciones', [

            'devoluciones' => Devolucion::latest()
                ->orWhere('devoluciones.created_at', 'like', $buscadorDevoluciones)
                ->orWhere('devoluciones.Bibliotecario_Re', 'like', $buscadorDevoluciones)
                ->orWhere('devoluciones.CodigoDevolucion', 'like', $buscadorDevoluciones)
                ->orWhere('devoluciones.Tipo_Elemento', 'like', $buscadorDevoluciones)
                ->paginate(8)
        ]);


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


    public function verDetallesDevoluciones($id)
    {


        $detallesDevolucionConsulta = Detalle_Devolucion::select('libros.Nombre', 'libros.NombreTomo', 'elementos.nombre', 'libros.id', 'users.name', 'users.lastname', 'users.Grado', 'users.email', 'users.TipoDoc', 'users.NumeroDoc', 'users.direccion', 'users.celular', 'CantidaDevueltaU', 'NovedadesDevolucionU', 'devoluciones.Bibliotecario_Re', 'devoluciones.CodigoDevolucion', 'devoluciones.Tipo_Elemento', 'devoluciones.created_at')
            ->join('devoluciones', 'devoluciones.id', '=', 'detalle_devolucion.id_DevolucioD')
            //->join('detalle_devolucion', 'detalle_devolucion.id', '=','devoluciones.id_DevolucioD')
            ->leftjoin('libros', 'libros.id', '=', 'detalle_devolucion.id_libroD')
            ->leftjoin('users', 'users.id', '=', 'devoluciones.usuario_id')
            ->leftjoin('elementos', 'elementos.id', '=', 'detalle_devolucion.id_elementoD')
            ->where('detalle_devolucion.id_DevolucioD', $id)->get();

        $this->fechaDevo = $detallesDevolucionConsulta[0] ['created_at'];
        $this->bibliotecarioR = $detallesDevolucionConsulta[0] ['Bibliotecario_Re'];
        $this->tipoPresta = $detallesDevolucionConsulta[0] ['Tipo_Elemento'];
        $this->nombreAlumno = $detallesDevolucionConsulta[0] ['name'];
        $this->apellidoAlumno = $detallesDevolucionConsulta[0] ['lastname'];
        $this->direccionA = $detallesDevolucionConsulta[0] ['direccion'];
        $this->celularA = $detallesDevolucionConsulta[0] ['celular'];
        $this->tipocDocA = $detallesDevolucionConsulta[0] ['TipoDoc'];
        $this->numeroDocA = $detallesDevolucionConsulta[0] ['NumeroDoc'];
        $this->gradoA = $detallesDevolucionConsulta[0] ['Grado'];



       $this->detallesDevolucionConsulta=$detallesDevolucionConsulta;
        $total = 0;
        $a = count($this->detallesDevolucionConsulta);
        for($i=0; $i<$a;$i++){

            $total=$total+ $this->detallesDevolucionConsulta[$i]['CantidaPrestadaU'];
        }


        foreach ($detallesDevolucionConsulta as $key => $value) {
            $value;

        }
    }













    public function verDetallesPrestamo($id)
    {
        $detaPrestamo = DetallePrestamo::select('prestamos.*','users.*', 'libros.Nombre', 'libros.id', 'elementos.*', 'detalle_prestamo.*', 'users.name', 'users.lastname')

            ->join('prestamos', 'prestamos.id', '=', 'detalle_prestamo.id_prestamo')
            ->leftjoin('libros', 'libros.id', '=', 'detalle_prestamo.id_libro')
            ->leftjoin('users', 'users.id', '=', 'prestamos.usuario_id')
            ->leftjoin('elementos', 'elementos.id', '=', 'detalle_prestamo.id_elemento')
            ->where('detalle_prestamo.id_prestamo', $id)->get();
        $this->detalleElemento = $detaPrestamo[0] ['Nombre'];
        $this->fechaDetalle = $detaPrestamo[0] ['created_at'];
        $this->bibliotecario = $detaPrestamo[0] ['NombreBibliotecario'];
        $this->cantidadPrestadaDetalle = $detaPrestamo[0] ['CantidaPrestadaU'];
        $this->nombreDeudor = $detaPrestamo[0] ['name'];
        $this->apellidoDeudor = $detaPrestamo[0] ['lastname'];
        $this->gradoDeudor = $detaPrestamo[0] ['Grado'];
        $this->tipoDocDeudor = $detaPrestamo[0] ['TipoDoc'];
        $this->numeroiDeudor = $detaPrestamo[0] ['NumeroDoc'];
        $this->celularDeudor = $detaPrestamo[0] ['celular'];
        $this->direccionDeudor = $detaPrestamo[0] ['direccion'];
        $this->estadoDetalle = $detaPrestamo[0] ['Estado_Prestamo'];
        $this->CodigoPrestamoD = $detaPrestamo[0] ['Codigo_Prestamo'];
//$this->EstadoPrestamo = $detaPrestamo[0] ['Estado'];
        $this->detaPrestamo = $detaPrestamo;

        $total = 0;
        $a = count($this->detaPrestamo);
        for($i=0; $i<$a;$i++){

            $total=$total+ $this->detaPrestamo[$i]['CantidaPrestadaU'];
        }
        $this->cantidadPrestadaDetalle = $total;

        foreach ($detaPrestamo as $key => $value){$value;}
    }



    //Eliminar De Manera Temporal Categoria
    public function inactivarDevolucion($id)
    {


        $devolucionInactivar = Devolucion::find($id);

        if($devolucionInactivar->Estado_Devolucion == 'Activa' ){
            $devolucionInactivar->Estado_Devolucion = 'Inactiva';
            $devolucionInactivar->save();
            $devolucionInactivar->delete();


            $this->dispatchBrowserEvent('crear', [
                'type' => 'warning',
                'title' => 'Devolucion Inactivada Con Exito..',
                'icon'=>'success',
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


        $this->dispatchBrowserEvent('crear', [
            'title' => 'Devolucion Restaurada Con Exito...',
            'icon'=>'success',
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


    public function llamarModalEliminarDevol($id){

        $this->dispatchBrowserEvent('eliminarT', [
            'type' => 'warning',
            'title' => '¿Estas Seguro De Inactivar El Libro?',
            'id' => $id,

        ]);
    }
    public function eliminardos($id){

        $prestamoeli=Devolucion::find($id);


            $this->dispatchBrowserEvent('eliminar', [
                'type' => 'warning',
                'title' => '¿Estas Seguro De Inactivar Esta Devolucion?',
                'id' => $id,

            ]);




    }

}
