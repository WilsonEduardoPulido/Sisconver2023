<?php

namespace App\Http\Livewire;

use App\Models\Devoluciones\Detalle_Devolucion;
use App\Models\Libro;
use App\Models\Prestamos\DetallePrestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Elemento;
use App\Models\Prestamo;
use App\Models\Novedades;
use App\Models\Devolucion;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

//SELECT detalle_prestamo.CantidaPrestadaU,prestamos.CantidadPrestada,prestamos.NombreBibliotecario,libros.Nombre,libros.NombreTomo,libros.Novedades,elementos.nombre,elementos.NovedadesElemento,users.name,users.lastname,prestamos.Estado_Prestamo,prestamos.id from detalle_prestamo LEFT join prestamos on detalle_prestamo.id_prestamo=prestamos.id LEFT JOIN libros on detalle_prestamo.id_libro=libros.id LEFT join elementos on detalle_prestamo.id_elemento = elementos.id INNER join users on prestamos.usuario_id=users.id;
class Prestamos extends Component
{
    use WithPagination;

    protected $listeners = ['render' => 'render' ,'eliminarTemporalPrestamo' => 'inactivarPrestamo'];
    public $datos = [], $elementosentregados = [];
    public $keyarray, $arrayElementosPrestado,$detaPrestamo= [] ,$sumar=[],$id_prestamo;
    protected $paginationTheme = 'bootstrap';
    public $prestamos_id, $CantidadPrestamo, $Estado_Prestamo, $cambiarEstado, $NombreBibliotecarioP, $Tipo_elemento;
    public $selected_id, $buscadorPrestamos, $Fecha_prestamo, $libros_id, $elementos_id, $id_libro,
        $usuario_id, $curso_id, $CantidadPrestada, $ArticuloPrestado, $usuarioDeudorid,$suma,$CodigoPrestamoD;
    public $usuarioDeudor, $prestador_id, $bibliotecario, $articuloDevolver, $CantidadPrestadaDevolver, $usuarioDeudorD, $NovedadesDevolucion, $CantidadDevuelta;

    public $consultaLibrosElementos, $detalleElemento, $cantidadPrestadaDetalle, $fechaDetalle, $nombreDeudor, $apellidoDeudor, $gradoDeudor, $numeroiDeudor, $tipoDocDeudor, $celularDeudor, $direccionDeudor, $estadoDetalle, $Tipo_novedad;

    public $arrayElementosPrestados, $op, $datosDevolucion, $FechaPrestamo, $CodigoPrestamo, $Estadop,$resultado;

    public function render()
    {
        $prestamosEliminados = Prestamo::onlyTrashed()->where('Estado_Prestamo', 'Inactivo')->paginate(10);

        $consultaUsuariosPrestamos = User::where('Estado', "=", 'Activo')->select('id', 'name','lastname')->get();

        $buscadorPrestamos = '%' . $this->buscadorPrestamos . '%';


        $arrayElementosPrestados = DetallePrestamo::all()->groupby('id_prestamo');


        $consultaPrestamos = Prestamo::select('prestamos.*', 'users.name', 'users.lastname')
            ->leftjoin('users', 'prestamos.usuario_id', '=', 'users.id')
            ->orderBy('prestamos.id', 'desc')
            ->orWhere('prestamos.created_at', 'like', $buscadorPrestamos)
            ->orWhere('prestamos.Tipo_Elemento', 'like', $buscadorPrestamos)
            ->orWhere('prestamos.Codigo_Prestamo', 'like', $buscadorPrestamos)
            ->orWhere('users.name', 'like', $buscadorPrestamos)
            ->where('prestamos.Estado_Prestamo', 'Activo')
            ->where('prestamos.Estado_Prestamo','Finalizado')
            ->paginate(8);

        ;

        return view('livewire.prestamos.vistaprestamos', [
            'prestamos' => Prestamo::latest()
                ->paginate(8),
        ], compact('consultaUsuariosPrestamos', 'prestamosEliminados', 'consultaPrestamos', 'arrayElementosPrestados'));
    }





    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->Fecha_prestamo = null;
        $this->libros_id = null;
        $this->elementos_id = null;
        $this->usuario_id = null;

    }

    public function store()
    {
        $this->validate([

            'libros_id' => 'required',
            'elementos_id' => 'required',
            'usuario_id' => 'required',

        ]);

        Prestamo::create([

            'libros_id' => $this->libros_id,
            'elementos_id' => $this->elementos_id,
            'usuario_id' => $this->usuario_id,

        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Prestamo Successfully created.');
    }

    public function editarPrestamo($id)
    {


        $editarPrestamo = Prestamo::findOrFail($id);

        if ($editarPrestamo->Estado_Prestamo == 'Finalizado') {

            $this->dispatchBrowserEvent('cerrar');
            session()->flash('error', 'No se puede editar un prestamo finalizado');
            return;
        }


        $this->libros_id = null;

        $this->selected_id = $id;


        if ($editarPrestamo->libros_id == null) {
            $this->libros_id = null;

        } else {
            $usuario = User::findOrFail($editarPrestamo->usuario_id);


            $libro = Libro::findOrFail($editarPrestamo->libros_id);
            $this->libros_id = $editarPrestamo->libros_id;



            $this->usuario_id = $editarPrestamo->usuario_id;
            $this->usuarioDeudor = $usuario->name;
            $this->ArticuloPrestado = $libro->Nombre;

        }


        if ($editarPrestamo->elementos_id == null) {
            $this->elementos_id = null;


        } else {
            $usuario = User::findOrFail($editarPrestamo->usuario_id);

            $elemento = Elemento::findOrFail($editarPrestamo->elementos_id);

            $this->elementos_id = $editarPrestamo->elementos_id;

            $this->usuario_id = $editarPrestamo->usuario_id;
            $this->usuarioDeudor = $usuario->name;
            $this->ArticuloPrestado = $elemento->nombre;
        }








        $estadoInicial = $editarPrestamo->Estado_Prestamo;

        $this->Estado_Prestamo = $estadoInicial;

        $this->CantidadPrestada = $editarPrestamo->CantidadPrestada;

        $this->Fecha_prestamo = $editarPrestamo->Fecha_prestamo;

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
        $this->EstadoPrestamo = $detaPrestamo[0] ['Estado'];
        $this->detaPrestamo = $detaPrestamo;

        $total = 0;
        $a = count($this->detaPrestamo);
        for($i=0; $i<$a;$i++){

            $total=$total+ $this->detaPrestamo[$i]['CantidaPrestadaU'];
        }
            $this->cantidadPrestadaDetalle = $total;

            foreach ($detaPrestamo as $key => $value){$value;}
    }
    public function productosPrestados($id)
    {

        $prestamo=Prestamo::find($id);

        if($prestamo->Estado_Prestamo =='Finalizado'){
            $this->dispatchBrowserEvent('cerrar');
            $this->dispatchBrowserEvent('crear', [
                'type' => 'error',
                'title' => 'Este Prestamo ya fue Finalizado',
                'text' => 'No se puede realizar la devolucion',
                'icon' => 'error',

                'timer' => 5000,

                'position' => 'center',
            ]);



        }

        $arrayElementosPrestados = DetallePrestamo::select('prestamos.*', 'libros.Nombre', 'libros.id', 'elementos.*', 'detalle_prestamo.*', 'users.name', 'users.lastname')
            ->join('prestamos', 'prestamos.id', '=', 'detalle_prestamo.id_prestamo')
            ->leftjoin('libros', 'libros.id', '=', 'detalle_prestamo.id_libro')
            ->leftjoin('users', 'users.id', '=', 'prestamos.usuario_id')
            ->leftjoin('elementos', 'elementos.id', '=', 'detalle_prestamo.id_elemento')
            ->where('detalle_prestamo.id_prestamo', $id)->get();







        $this->arrayElementosPrestados = $arrayElementosPrestados;





        foreach ($arrayElementosPrestados as $key => $value) {






            $datos = array(


                "id_elemento" => $value['id_elemento'],
                "Tipo_Elemento" => $value['Tipo_Elemento'],
                "Estado_Prestamo" => $value['Estado_Prestamo'],
                "NombreTomo" => $value['NombreTomo'],

                "nombre" => $value['nombre'],
                "CantidaPrestadaU" => $value['CantidaPrestadaU'],
                "Nombre" => $value['Nombre'],
                "CantidadPrestada" => $value['CantidadPrestada'],
                "NovedadesPrestamoU" => $value['NovedadesPrestamoU'],
                "TipoNovedad" => $value['TipoNovedad'],
                "name" => $value['name'],
                "id_prestamo" => $value['id_prestamo'],
                "id_libro" => $value['id_libro'],

                "created_at" => $value['created_at'],
                "updated_at" => $value['updated_at'],
                "id" => $value['id'],
                "lasname" => $value['lastname'],
                "Est" => $value['EstadoDetalle'],



            );

            $this->datos[] = $datos;



        }

    }



    public function eliminar($id){

        $prestamoeli=Prestamo::find($id);

        if($prestamoeli->Estado_Prestamo =='Activo'){

            $this->dispatchBrowserEvent('crear', [
                'type' => 'error',
                'title' => 'Este Prestamo esta Activo No Se Puede Eliminar',

                'icon' => 'error',

                'timer' => 6000,
                'toast'=>true,

                'position' => 'center',
            ]);



        }else{

            $this->dispatchBrowserEvent('eliminar', [
                'type' => 'warning',
                'title' => '¿Estas Seguro De Inactivar Este Prestamo?',
                'id' => $id,

            ]);

        }


    }








    public function cambiarEstadoPrestamo()
    {





        $prestamo = Prestamo::find($this->selected_id);

        $this->inactivarPrestamo($this->selected_id);
        $this->dispatchBrowserEvent('cerrar')

        ;

        session()->flash('message', 'Prestamo Inactiavado');
    }



    //Eliminar De Manera Temporal Prestamo
    public function inactivarPrestamo($id)
    {

        $prestamoEli = Prestamo::find($id);

        if ($prestamoEli->Estado_Prestamo == 'Activo' or $prestamoEli->Estado_Prestamo == 'Finalizado') {
            $prestamoEli->Estado_Prestamo = 'Inactivo';


            $prestamoEli->save();
            $prestamoEli->delete();



            $this->emit('render')
            ;

        }


    }




    public function cargarDatosDevolucionPrestamo($key)
    {


        // $detallePrestamo = DetallePrestamo::find($this->datos[$key]['id']);
        if ($this->datos[$key]['Est'] == 'Finalizado') {
            $this->dispatchBrowserEvent('swal', [
                'type' => 'error',
                'title' => 'Este Prestamo ya fue Finalizado',
                'text' => 'No se puede realizar la devolucion',
                'icon' => 'error',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
            ]);

        } else {

            if ($this->datos[$key]['Tipo_Elemento'] == "Libro") {
                $prestador = Auth::user()->name;
                $this->bibliotecario = $prestador;
                $this->prestador_id = Auth::user()->id;
                $this->datosDevolucion = $this->datos[$key];
                $tomo = $this->datosDevolucion = $this->datos[$key]['NombreTomo'];
                $apellido = $this->datosDevolucion = $this->datos[$key]['lasname'];
                $this->selected_id = $this->datos[$key]['id'];
                $this->usuarioDeudorD = $this->datos[$key]['name'] . '' . $apellido;
                $this->articuloDevolver = $this->datos[$key]['Nombre'] . '' . $tomo;
                $this->CantidadPrestadaDevolver = $this->datos[$key]['CantidaPrestadaU'];
                $this->NovedadesDevolucion = $this->datos[$key]['NovedadesPrestamoU'];
                $this->id_libro = $this->datos[$key]['id_libro'];
                $this->keyarray = $key;
                $this->Tipo_elemento = $this->datos[$key]['Tipo_Elemento'];

                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Datos Cargados Con exito.',
                    'icon' => 'success',

                    'timer' => 5000,
                    'toast' => true,
                    'position' => 'center',
                    'showConfirmButton' => false,
                ]);
            } elseif ($this->datos[$key]['Tipo_Elemento'] == "Elemento") {

                $prestador = Auth::user()->name;
                $this->bibliotecario = $prestador;
                $this->prestador_id = Auth::user()->id;
                $this->datosDevolucion = $this->datos[$key];
                $tomo = $this->datosDevolucion = $this->datos[$key]['NombreTomo'];
                $apellido = $this->datosDevolucion = $this->datos[$key]['lasname'];
                $this->usuarioDeudorD = $this->datos[$key]['name'] . $apellido;
                $this->articuloDevolver = $this->datos[$key]['nombre'];
                $this->CantidadPrestadaDevolver = $this->datos[$key]['CantidaPrestadaU'];
                $this->NovedadesDevolucion = $this->datos[$key]['NovedadesPrestamoU'];
                $this->keyarray = $key;
                $this->Tipo_elemento = $this->datos[$key]['Tipo_Elemento'];
                $this->elementos_id = $this->datos[$key]['id_elemento'];
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Datos Cargados Con exito.',
                    'icon' => 'success',

                    'timer' => 5000,
                    'toast' => true,
                    'position' => 'center',
                    'showConfirmButton' => false,
                ]);



            }

        }





    }




    public function agregarElementosPrestamo()
    {


        if ($this->bibliotecario == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'El campo bibliotecario no puede estar vacio.',
                'icon' => 'error',
                'iconColor' => 'red',
                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
            return;
        }



        elseif ($this->CantidadDevuelta == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'El campo cantidad devuelta no puede estar vacio.',
                'icon' => 'info',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
            return;


        } elseif ($this->NovedadesDevolucion == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'El campo novedades no puede estar vacio.',
                'icon' => 'info',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
            return;
        } elseif ($this->Tipo_novedad == null) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Por Favor Seleccione una clasificaciòn para la novedad.',
                'icon' => 'info',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
        } elseif ($this->CantidadDevuelta > $this->CantidadPrestadaDevolver) {

            $this->dispatchBrowserEvent('swal', [
                'title' => 'La cantidad devuelta no puede ser mayor a la prestada.',
                'icon' => 'error',
                'iconColor' => 'red',
                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,

            ]);
            return;

        } elseif ($this->CantidadDevuelta == 0) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'La cantidad devuelta no puede ser 0.',
                'icon' => 'error',
                'iconColor' => 'red',
                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
            return;

        }





        $this->datos[$this->keyarray]['Est'];

        $this->datos[$this->keyarray]['CantidaPrestadaU'];
        $this->datos[$this->keyarray]['id'];

        $detallePrestamo = DetallePrestamo::find($this->datos[$this->keyarray]['id']);

        if ($this->CantidadDevuelta == $this->CantidadPrestadaDevolver) {


            $cantidadActual = $this->datos[$this->keyarray]['CantidaPrestadaU'] - $this->CantidadDevuelta;

            $this->datos[$this->keyarray]['Est'] = "Finalizado";
            $this->datos[$this->keyarray]['CantidaPrestadaU'] = $cantidadActual;


            /// $detallePrestamo->EstadoDetalle="Finalizado";
            // $detallePrestamo->CantidaPrestadaU=$cantidadActual;
            // $detallePrestamo->save();

        } elseif ($this->CantidadDevuelta < $this->CantidadPrestadaDevolver) {

            $cantidadActual = $this->datos[$this->keyarray]['CantidaPrestadaU'] - $this->CantidadDevuelta;
            $this->datos[$this->keyarray]['Est'] = "Pendiente";
            $this->datos[$this->keyarray]['CantidaPrestadaU'] = $cantidadActual;

            //  $detallePrestamo->EstadoDetalle = "Pendiente";

            // $detallePrestamo->CantidaPrestadaU=$cantidadActual;
            //$detallePrestamo->save();

        } elseif ($this->$this->CantidadDevuelta == $this->CantidadPrestadaDevolver and $detallePrestamo->EstadoDetalle == "Pendiente") {

            $cantidadActual = $this->datos[$this->keyarray]['CantidaPrestadaU'] - $this->CantidadDevuelta;
            $detallePrestamo->EstadoDetalle = "Finalizado";
            $this->datos[$this->keyarray]['Est'] = "Finalizado";
            $this->datos[$this->keyarray]['CantidaPrestadaU'] = $cantidadActual;
            // $detallePrestamo->CantidaPrestadaU=$cantidadActual;
            // $detallePrestamo->save();
        } elseif ($this->CantidadDevuelta < $this->CantidadPrestadaDevolver and $detallePrestamo->EstadoDetale == "Pendiente") {
            $cantidadActual = $this->datos[$this->keyarray]['CantidaPrestadaU'] - $this->CantidadDevuelta;
            $detallePrestamo->EstadoDetalle = "Pendiente";
            // $detallePrestamo->CantidaPrestadaU=$cantidadActual;
            // $detallePrestamo->save();
            $this->datos[$this->keyarray]['Est'] = "Pendiente";
            $this->datos[$this->keyarray]['CantidaPrestadaU'] = $cantidadActual;
        }





        $elementosentregados = array(

            "id_libro" => $this->id_libro,
            "id_elemento" => $this->elementos_id,
            "Articulos" => $this->Tipo_elemento,
            "Articulo" => $this->articuloDevolver,
            "Cantidad" => $this->CantidadDevuelta,
            "Novedades" => $this->NovedadesDevolucion,
            "TipoNovedad" => $this->Tipo_novedad,
            "id_usuario"=>$this->usuarioDeudorD
        );


        $this->elementosentregados[] = $elementosentregados;





        $this->limpiarCamposPrestamo();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Articulo Añadido A La Lista De Devolucion.',
            'icon' => 'success',

            'timer' => 5000,
            'toast' => true,
            'position' => 'center',

        ]);
    }




    public function retornarValores()
    {


        foreach($this->datos as $key => $value){

            $sumar = array(


                "CantidaPrestadaU" => $value['CantidaPrestadaU'],



            );


            $this->sumar[] = $sumar;

        }




        $this->sumarCantidades();







    }
    public function sumarCantidades(){


        $this->id_prestamo;
        $id_prestamo=$this->id_prestamo;

        $resultado=0;
        $total = count($this->sumar);

        for ($i = 0; $i < $total; $i++) {

            $resultado=$resultado+ $this->sumar[$i]['CantidaPrestadaU'];




        }

        $this->resultado=$resultado;

        if($resultado==0){
            $this->finalizarPrestamoEstado($id_prestamo);
        }else{

        }
    }

    public function enviarDatosDevolucionPrestamo()
    {




        $total = count($this->datos);

        for ($i = 0; $i < $total; $i++) {

            $detallePrestamo = DetallePrestamo::find($this->datos[$i]['id']);
            $detallePrestamo->EstadoDetalle = $this->datos[$i]['Est'];
            $detallePrestamo->CantidaPrestadaU = $this->datos[$i]['CantidaPrestadaU'];

            $detallePrestamo->save();

        }


        if ($this->Tipo_elemento == "Libro") {


            $tota = count($this->elementosentregados);



            foreach ($this->elementosentregados as $key => $value) {

                $detallePrestamoLibro = Libro::find($value['id_libro']);

                if($value['id_libro'] == $detallePrestamoLibro->id  ){

                    $detallePrestamoLibro->CantidadLibros = $value['Cantidad'] + $detallePrestamoLibro->CantidadLibros;

                    $detallePrestamoLibro->Novedades=$value['Novedades'];
                    $detallePrestamoLibro->TipoNovedad=$value['TipoNovedad'];
                    if($detallePrestamoLibro->CantidadLibros>0 and $detallePrestamoLibro->TipoNovedad=="Ninguna"){
                        $detallePrestamoLibro->Estado="Disponible";
                        $detallePrestamoLibro->save();
                    }elseif($detallePrestamoLibro->CantidadLibros>0 and $detallePrestamoLibro->TipoNovedad=="Media"){
                        $detallePrestamoLibro->Estado="Disponible";
                        $detallePrestamoLibro->save();

                    }else{
                        $detallePrestamoLibro->Estado="NoDisponible";
                        $detallePrestamoLibro->save();

                    }

                    $detallePrestamoLibro->save();

                }else{

                    dd('no son iguales')
                    ;




                }
            }





        }else  {





            foreach ($this->elementosentregados as $key => $value) {


                $detallePrestamoElemento = Elemento::find($value['id_elemento']);
                if($value['id_elemento'] == $detallePrestamoElemento->id  ){




                    $detallePrestamoElemento->cantidad = $value['Cantidad'] + $detallePrestamoElemento->cantidad;
                    $detallePrestamoElemento->NovedadesElemento = $value['Novedades'];
                    $detallePrestamoElemento->TipoNovedad = $value['TipoNovedad'];

                    if ($detallePrestamoElemento->cantidad > 0 and $detallePrestamoElemento->TipoNovedad == "Ninguna") {
                        $detallePrestamoElemento->Estado = "Disponible";
                        $detallePrestamoElemento->save();
                    } elseif ($detallePrestamoElemento->TipoNovedad == "Alta" and $detallePrestamoElemento->cantidad > 0) {

                        $detallePrestamoElemento->Estado = "NoDisponible";
                        $detallePrestamoElemento->save();
                    } elseif ($detallePrestamoElemento->TipoNovedad == "Media" and $detallePrestamoElemento->cantidad > 0) {

                        $detallePrestamoElemento->Estado = "Disponible";
                        $detallePrestamoElemento->save();

                    }
                    $detallePrestamoElemento->save();
                }else{

                    dd('no son iguales')
                    ;




                }



            }

        }


        $this->crearDevolucion();
    }
    // dd($this->elementosentregados);





    public function limpiarCamposPrestamo()
    {

        $this->articuloDevolver = "";
        $this->CantidadDevuelta = "";
        $this->NovedadesDevolucion = "";
        $this->bibliotecario = "";
        $this->CantidadPrestadaDevolver = "";
        $this->Tipo_novedad = "";




    }

    public function crearDevolucion(){


        $codigo_Devolucion ='LAINB'. rand(1, 99999999);
        $apellido= Auth::user()->lastname;
        $this->$codigo_Devolucion = $codigo_Devolucion;

        $idusuario=$this->elementosentregados[0]['id_usuario'];
        $prestamos = new Devolucion();
        $prestamos->CodigoDevolucion = $codigo_Devolucion;
        $prestamos->prestamos_id = $this->datos[0]['id_prestamo'];
        $prestamos->usuario_id =$this->usuarioDeudorid;
        $prestamos->Tipo_Elemento = $this->Tipo_elemento;
        $prestamos->Bibliotecario_Re  = Auth::user()->name."_".$apellido;

        $prestamos->created_at = now();
        $prestamos->updated_at = now();

        $prestamos->save();


        foreach($this->elementosentregados as $key =>$devolucion){


            $datos = array(
                "id_DevolucioD"=> $prestamos->id,
                "id_libroD" => $devolucion['id_libro'],
                "id_elementoD" => $devolucion['id_elemento'],


                "CantidaDevueltaU" => $devolucion['Cantidad'],
                "NovedadesDevolucionU" => $devolucion['Novedades'],


            );


            Detalle_Devolucion::insert($datos);

        }


        foreach($this->datos as $key => $value){

            $sumar = array(


                "CantidaPrestadaU" => $value['CantidaPrestadaU'],



            );


            $this->sumar[] = $sumar;

        }

        $resultado=0;
        $total = count($this->sumar);

        for ($i = 0; $i < $total; $i++) {

            $resultado=$resultado+ $this->sumar[$i]['CantidaPrestadaU'];




        }

        $this->resultado=$resultado;


        if($resultado==0){

            $this->dispatchBrowserEvent('cerrar');

            $prestamoFinalizarCambiarEstado = Prestamo::find($this->datos[0]['id_prestamo']);
            if ($prestamoFinalizarCambiarEstado->Estado_Prestamo == 'Activo') {
                $prestamoFinalizarCambiarEstado->Estado_Prestamo = 'Finalizado';
                $prestamoFinalizarCambiarEstado->save();



                $this->dispatchBrowserEvent('crear', [
                    'type' => 'success',
                    'title' => 'Prestamo Finalizado Con Exito...',
                    'icon' => 'success',

                ]);

            }
        }elseif($resultado>0){


            $this->dispatchBrowserEvent('cerrar');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Articulos Devueltos  Con Exito....',
                'icon' => 'success',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',

            ]);


        }
        $this->cerrar();
    }

    public function cerrar()
    {

        $this->articuloDevolver = "";
        $this->CantidadDevuelta = "";
        $this->NovedadesDevolucion = "";
        $this->bibliotecario = "";
        $this->CantidadPrestadaDevolver = "";
        $this->Tipo_novedad = "";
        $this->Tipo_elemento = "";
        $this->elementosentregados = [];
        $this->datos = [];
        $this->sumar=[];
    }












    //Finalizar Prestamo

    public function finalizarPrestamoEstado($id)
    {


        $prestamoFinalizarCambiarEstado = Prestamo::find($id);
        if ($prestamoFinalizarCambiarEstado->Estado == 'Activo') {
            $prestamoFinalizarCambiarEstado->Estado = 'Finalizado';
            $prestamoFinalizarCambiarEstado->save();
            $prestamoFinalizarCambiarEstado->delete();




        }
    }


}