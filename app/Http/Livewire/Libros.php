<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Novedades;
use App\Models\Prestamo;
use App\Models\Prestamos\DetallePrestamo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;
use Symfony\Component\HttpKernel\HttpCache\Ssi;


class Libros extends Component
{
    use WithPagination;
    protected $listeners = ['destroy' => 'destroy' ,'eliminarsl' => 'eliminarLibroTotalMente'];
    private $prestador_id,$Tipo_Elemento;

    public $libro , $nombreBibliotecario,$FechaPrestamo, $nombreLibro, $nombreUsuario, $cantidadDisponible,
        $cantidadPrestamo ,$cantidaPrestarLibro;
    protected $paginationTheme = 'bootstrap';
    public $selected_id,$Cantidad,  $Nombre, $Autor, $Editorial, $Edicion, $Descripcion, $Estado, $categoria_id,
        $CantidadLibros, $librosConsulta, $categoriaNombre, $categoriaAutor,$categoriaEditorial ,$categoriaCantidad,
        $categoriaEstado,$categoriaEdicion,$categoriaDescripcion,$categoriaNovedades,$categoriaTipoNovedad;
    public $arrayAgregaralatabla = [];
    public $arraycrearLibro = [],$Novedades,$TipoNovedad,$NombreTomo;
    public $buscar,$Libro,$usuario_id,$NovedadesF;

    public function render()
    {
        $buscar = '%'.$this->buscar .'%';
        $consultaUsuariosLibros = User::where('Estado','=','Activo')->select('id','name','lastname')->get();

        $consulta = Libro::onlyTrashed()->orWhere('Estado', "=", 'Inactivo')->paginate(10);

        $categorias = Categoria::where('Tipo', "=", 'Libros')->where('Estado', "=", 'Activa')->select('id', 'nombre')->get();

        $libros=Libro::latest()

            ->orWhere('libros.Nombre', 'LIKE', $buscar)
            ->orWhere('Autor', 'LIKE', $buscar)
            ->orWhere('Editorial', 'LIKE', $buscar)
            ->orWhere('Edicion', 'LIKE', $buscar)
            ->orWhere('libros.Descripcion', 'LIKE', $buscar)
            ->orWhere('libros.Estado', 'LIKE', $buscar)
            ->orWhere('CantidadLibros', 'LIKE', $buscar)
            ->orWhere('NombreTomo', 'LIKE', $buscar)
            ->orWhere('libros.created_at', 'LIKE', $buscar)
            ->join('categorias', 'libros.categoria_id', '=', 'categorias.id')
            ->select( 'categorias.nombre as categoriaNombre','libros.created_at','categorias.nombre','libros.Autor','libros.Editorial','libros.Edicion','libros.Descripcion','libros.Estado','libros.CantidadLibros','libros.Nombre','libros.id','libros.NombreTomo')
            ->orWhere('categorias.nombre', 'LIKE', $buscar)
            ->orderBy('libros.id', 'desc')
            ->paginate(10);


        return view('livewire.libros.view', compact('categorias','consulta','consultaUsuariosLibros','libros'));

    }

    public function cancel()
    {
        $this->resetInput();
        $this->resetValidation();

    }






    protected $rules = [
        'Nombre' => 'required|string|min:3|max:80',
        'Autor' => 'required|string|min:3|max:70',
        'Editorial' => 'required|string|min:3|max:70',
        'Edicion' => 'required|string|min:3|max:70',

        'categoria_id' => 'required',
        'Cantidad' => 'required|numeric|min:1',
        'Descripcion' => 'required|max:200|min:3',
        'NombreTomo' => 'max:80|min:3 | nullable',

        'Novedades' => 'required|max:200|min:3',
        'TipoNovedad' => 'required',



    ];
    protected $messages = [
        'Nombre.required' => 'El campo Nombre es requerido',
        'Nombre.string' => 'El campo Nombre debe ser de tipo texto',
        'Nombre.min' => 'El campo Nombre debe tener minimo 3 caracteres',
        'Nombre.max' => 'El campo Nombre debe tener maximo 80 caracteres',
        'Autor.required' => 'El campo Autor es requerido',
        'Autor.string' => 'El campo Autor debe ser de tipo texto',
        'Autor.min' => 'El campo Autor debe tener minimo 3 caracteres',
        'Autor.max' => 'El campo Autor debe tener maximo 70 caracteres',
        'Editorial.required' => 'El campo Editorial es requerido',
        'Editorial.string' => 'El campo Editorial debe ser de tipo texto',
        'Editorial.min' => 'El campo Editorial debe tener minimo 3 caracteres',
        'Editorial.max' => 'El campo Editorial debe tener maximo 70 caracteres',
        'Edicion.required' => 'El campo Edicion es requerido',
        'Edicion.string' => 'El campo Edicion debe ser de tipo texto',
        'Edicion.min' => 'El campo Edicion debe tener minimo 3 caracteres',
        'Edicion.max' => 'El campo Edicion debe tener maximo 70 caracteres',
        'categoria_id.required' => 'El campo Categoria es requerido',
        'Cantidad.required' => 'El campo Cantidad es requerido',
        'Cantidad.numeric' => 'El campo Cantidad debe ser de tipo numerico',
        'Cantidad.min' => 'El campo Cantidad debe tener minimo 1',
        'Descripcion.required' => 'El campo Descripcion es requerido',
        'Descripcion.max' => 'El campo Descripcion debe tener maximo 200 caracteres',
        'Descripcion.min' => 'El campo Descripcion debe tener minimo 3 caracteres',
        'NombreTomo.max' => 'El campo NombreTomo debe tener maximo 80 caracteres',
        'NombreTomo.min' => 'El campo NombreTomo debe tener minimo 3 caracteres',
        'Estado.required' => 'El campo Estado es requerido',
        'Novedades.required' => 'El campo Novedades es requerido',
        'Novedades.max' => 'El campo Novedades debe tener maximo 200 caracteres',
        'Novedades.min' => 'El campo Novedades debe tener minimo 3 caracteres',
        'TipoNovedad.required' => 'El campo TipoNovedad es requerido',
        'NovedadesF.required' => 'Las novedades del libro son requeridas',
        'nombreUsuario.required'=>'El nombre de usuario es requerido',



    ];


    public function updated($validacionLibros)
    {
        $this->validateOnly($validacionLibros);
    }


    public function mensajes(){

        $this->messages;

    }


    public function quitarLibroPrestamo($key){


        $this->arrayAgregaralatabla[$key]['id'];

        $idlibor=$this->arrayAgregaralatabla[$key]['id'];
        $cantidadPrestada=$this->arrayAgregaralatabla[$key]['CantidadPrestada'];



        $prestamoDevolver = Libro::findOrFail($idlibor);


        $totaldevLi = (int) $cantidadPrestada +   $cantidadActualParaSumar=$prestamoDevolver->CantidadLibros;;


        $prestamoDevolver->CantidadLibros = $totaldevLi;
        $prestamoDevolver->Estado = 'Disponible';

        $prestamoDevolver->update();


        unset($this->arrayAgregaralatabla[$key]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Prestamo Cancelado.',
            'icon'=>'info',
            'iconColor'=>'red',
        ]);

    }



    public function añadirPrestamoModeloPrestamo(){


        if(count($this->arrayAgregaralatabla)  == 0 ) {

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error La Lista De Prestamos No Puede Estar Vacia.',
                'icon' => 'error',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',

            ]);
        }else{


        $codigo_Prestamo ='LAINB'. rand(1, 99999999);

        $this->$codigo_Prestamo = $codigo_Prestamo;


        $prestamos = new Prestamo();
        $prestamos->Codigo_Prestamo = $codigo_Prestamo;

        $prestamos->usuario_id =$this->nombreUsuario;
        $prestamos->Tipo_Elemento = 'Libro';
        $prestamos->NombreBibliotecario  = Auth::user()->name;

        $prestamos->created_at = now();
        $prestamos->updated_at = now();


        $prestamos->save();

        foreach($this->arrayAgregaralatabla as $key =>$libro){


            $datos = array(

                "id_libro" => $libro['id'],
                "id_prestamo"=> $prestamos->id,

                "CantidaPrestadaU" => $libro['CantidadPrestada'],
                "NovedadesPrestamoU" => $libro['NovedadesPrestamoU'],

                "created_at"=>now(),
                "updated_at"=>now(),
            );


            DetallePrestamo::insert($datos);
            unset($this->arrayAgregaralatabla[$key]);
        }


        $this->dispatchBrowserEvent('crear', [
            'type' => 'success',
            'title' => 'Prestamo Realizado Con Exito...',
            'icon'=>'success',

        ]);
        }
    }



    public function limpiarCampos()
    {

        $this->resetInput();
    }




    private function resetInput(){
        $this->Nombre = null;
        $this->Autor = null;
        $this->Editorial = null;
        $this->Edicion = null;
        $this->Descripcion = null;
        $this->Estado = null;
        $this->categoria_id = null;
        $this->Cantidad= null;
        $this->NombreTomo= null;
        $this->Novedades= null;
        $this->TipoNovedad= null;

    }


    public function anadirTomo(){


        $this->validate([
            'NombreTomo'=> 'nullable|max:80|min:3',
            'Novedades' => 'required|max:200|min:3',
            'TipoNovedad' => 'required',

            'Cantidad' => 'required|numeric|min:1',
            'Descripcion' => 'required|max:200|min:3',
            'categoria_id' => 'required',
            'Nombre' => 'required|max:80|min:3',
            'Autor' => 'required|max:80|min:3',
            'Editorial' => 'required|max:80|min:3',
            'Edicion' => 'required|max:80|min:3',


        ]);


        $this->mensajes();


        $dr = 'Disponible';
        $du='NoDisponible';
        $arraycrearLibro = array(


            'Nombre' => $this->Nombre,
            'Autor' => $this->Autor,
            'Editorial' => $this->Editorial,
            'Edicion' => $this->Edicion,
            'Descripcion' => $this->Descripcion,
            'Estado' => $this->Estado=$dr,
            'categoria_id' => $this->categoria_id,
            'CantidadLibros' => $this->Cantidad,
            'Novedades'=>$this->Novedades,
            'TipoNovedad'=>$this->TipoNovedad,
            'NombreTomo'=>$this->NombreTomo,


            "created_at"=>now(),
            "updated_at"=>now(),


        );

        $arraycrearLibro= $this->TipoNovedad;

        if($this->TipoNovedad == 'Alta'){

            $arraycrearLibro = array(


                'Nombre' => $this->Nombre,
                'Autor' => $this->Autor,
                'Editorial' => $this->Editorial,
                'Edicion' => $this->Edicion,
                'Descripcion' => $this->Descripcion,
                'Estado' => $this->Estado=$du,
                'categoria_id' => $this->categoria_id,
                'CantidadLibros' => $this->Cantidad,
                'Novedades'=>$this->Novedades,
                'TipoNovedad'=>$this->TipoNovedad,
                'NombreTomo'=>$this->NombreTomo,


                "created_at"=>now(),
                "updated_at"=>now(),


            );
        }elseif($this->TipoNovedad == 'Ninguna' || $this->TipoNovedad == 'Media'){
            $arraycrearLibro = array(


                'Nombre' => $this->Nombre,
                'Autor' => $this->Autor,
                'Editorial' => $this->Editorial,
                'Edicion' => $this->Edicion,
                'Descripcion' => $this->Descripcion,
                'Estado' => $this->Estado=$dr,
                'categoria_id' => $this->categoria_id,
                'CantidadLibros' => $this->Cantidad,
                'Novedades'=>$this->Novedades,
                'TipoNovedad'=>$this->TipoNovedad,
                'NombreTomo'=>$this->NombreTomo,


                "created_at"=>now(),
                "updated_at"=>now(),


            );
        }

        $this->arraycrearLibro[] =  $arraycrearLibro;


    }

    public function eliminarTomo($key){
        unset($this->arraycrearLibro[$key]);
    }

    public function store(){
        $validarDatos = $this->validate();





        foreach($this->arraycrearLibro as $key =>$libro){

            $datos = array(

                "Nombre" => $libro['Nombre'],
                "Autor" => $libro['Autor'],
                "Editorial" => $libro['Editorial'],
                "Edicion" => $libro['Edicion'],
                "Descripcion" => $libro['Descripcion'],
                "Estado" => $libro['Estado'],
                "categoria_id" => $libro['categoria_id'],
                "CantidadLibros" => $libro['CantidadLibros'],
                "Novedades" => $libro['Novedades'],
                "TipoNovedad" => $libro['TipoNovedad'],
                "NombreTomo" => $libro['NombreTomo'],
                "created_at"=>now(),
                "updated_at"=>now(),
            );
            Libro::insert($datos);


            unset($this->arraycrearLibro[$key]);
        }




        $this->resetInput();

        $this->resetErrorBag();
        $this->resetValidation();





        $this->dispatchBrowserEvent('cerrar');
        $this->dispatchBrowserEvent('crear', [
            'type' => 'success',
            'title' => 'Libro  Añadido Con  Exito...',
            'icon'=>'success',

        ]);
    }








    public function edit($id){

        $record = Libro::findOrFail($id);
        $this->selected_id = $id;
        $this->Nombre = $record->Nombre;
        $this->Autor = $record->Autor;
        $this->Editorial = $record->Editorial;
        $this->Edicion = $record->Edicion;
        $this->Descripcion = $record->Descripcion;
        $this->Estado = $record->Estado;
        $this->categoria_id = $record->categoria_id;
        $this->CantidadLibros= $record->CantidadLibros;
        $this->Novedades= $record->Novedades;
        $this->TipoNovedad= $record->TipoNovedad;
        $this->NombreTomo=$record->NombreTomo;


    }


    public function VerdetalleCategoria($id){

        $vercategoria= Libro::select('libros.Nombre','categorias.nombre','libros.Novedades','libros.TipoNovedad','libros.Autor','libros.Editorial','libros.CantidadLibros','libros.Estado','libros.Edicion','libros.Descripcion')->join('categorias','libros.Categoria_id','=','categorias.id')->findOrFail($id);
        $this->categoriaNombre = $vercategoria->Nombre;
        $this->categoriaAutor = $vercategoria->Autor;
        $this->categoriaEditorial = $vercategoria->Editorial;
        $this->categoriaCantidad = $vercategoria->CantidadLibros;
        $this->categoriaEstado = $vercategoria->Estado;
        $this->categoriaEdicion = $vercategoria->Edicion;
        $this->categoriaDescripcion = $vercategoria->Descripcion;
        $this->categoriaNovedades = $vercategoria->Novedades;
        $this->categoriaTipoNovedad = $vercategoria->TipoNovedad;


        $categoriaNombre = $vercategoria->nombre;

    }



    public function actualizarLibro() {
        $validateData = $this->validate([
            'Nombre' => 'required|min:3|max:70',
            'Autor' => 'required|min:3|max:70',
            'Editorial' => 'required|min:3|max:70',
            'Edicion' => 'required|min:3|max:70',
            'Descripcion' => 'required|min:3|max:200',
            'Estado' => 'required|min:3|max:70',
            'categoria_id' => 'required',
            'CantidadLibros' => 'required|numeric|min:1',
            'Novedades' => 'required|min:3|max:70',
            'TipoNovedad' => 'required|min:3|max:70',
            'NombreTomo' => 'nullable|min:3|max:70',


        ]);



        if ($this->selected_id) {
            $record = Libro::find($this->selected_id);
            $record->Nombre = $this->Nombre;
            $record->Autor = $this->Autor;
            $record->Editorial = $this->Editorial;
            $record->Edicion = $this->Edicion;
            $record->Descripcion = $this->Descripcion;
            $record->Estado = $this->Estado;
            $record->categoria_id = $this->categoria_id;
            $record->CantidadLibros = $this->CantidadLibros;
            $record->TipoNovedad = $this->TipoNovedad;
            $record->Novedades = $this->Novedades;
            $record->NombreTomo=$this->NombreTomo;
            $this->ValidarCantidad();
            $record->save();
            $this->actualizarEstadoLibor();
            $this->resetInput();
            $this->dispatchBrowserEvent('cerrar');

            $this->dispatchBrowserEvent('crear', [
                'type' => 'success',
                'title' => 'Libro Actualizado Con Exito...',
                'icon'=>'success',

            ]);
        }
    }



    public function actualizarEstadoLibor(){

        $libro = Libro::find($this->selected_id);

        if($libro->TipoNovedad == 'Alta'){

            $libro->Estado = 'NoDisponible';

            $libro->save();

        }elseif($libro->TipoNovedad == 'Media'){

            $libro->Estado = 'Disponible';

            $libro->save();

        }elseif($libro->TipoNovedad == 'Ninguna'){

            $libro->Estado = 'Disponible';

            $libro->save();

        }
    }

    public function ValidarCantidad(){
        $cantidad = $this->CantidadLibros;

        if ($cantidad <= 0){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'La cantidad no puede ser menor a 0',
                'icon'=>'info',
                'iconColor'=>'red',
            ]);

        }
    }

    public function eliminar($id){

        $this->selected_id = $id;
        //  $libro = Libro::where('id',$id)->with('detalle_prestamo')->first();

        $libro =Libro::select('detalle_prestamo.*')
            ->join('detalle_prestamo','libros.id','=','detalle_prestamo.id_libro')
            ->where('libros.id',$id)
            ->where('detalle_prestamo.EstadoDetalle','Activo')
            ->orWhere('detalle_prestamo.EstadoDetalle','Pendiente')
            ->get();

        $contador=count($libro);

        if($contador ==  0){

            $this->dispatchBrowserEvent('eliminar', [
                'type' => 'warning',
                'title' => '¿Estás seguro de Inactivar el Libro?',
                'id' => $id,

            ]);
        }
        else{



            $this->dispatchBrowserEvent('swal', [
                'title' => 'No se puede Inactivar El Libro, tiene préstamos asociados.',
                'icon'=>'error',
                'iconColor'=>'red',
            ]);
        }

    }

    public function destroy($id)
    {


        $libro = Libro::find($id);

        $libro->Estado;


        if ($libro->Estado == 'Disponible' ) {
            $libro->Estado = 'Inactivo';

            $libro->save();
            $libro->delete();

            $this->dispatchBrowserEvent('crear', [
                'title' => 'Libro Inactivado Con Exito..',
                'icon' => 'info',

            ]);

        }elseif($libro->Estado == 'NoDisponible'){

            $libro->Estado = 'Inactivo';

            $libro->save();
            $libro->delete();

            $this->dispatchBrowserEvent('crear', [
                'title' => 'Libro Inactivado Con Exito..',
                'icon' => 'info',

            ]);

        }


    }



    //Restaurar Libro Eliminada

    public function restaurarLibro($id){
        $resLibro =Libro::onlyTrashed()->where('id', $id)->first();
        if($resLibro->Estado == 'Inactivo' and $resLibro->TipoNovedad =='Alta'){
            $resLibro->Estado = 'NoDisponible';


            $resLibro->save();
            $resLibro->restore();
            $this->dispatchBrowserEvent('crear', [
                'title' => 'Libro Restaurado  Con Exito..',
                'icon' => 'success',

            ]);
        }else{
            $resLibro->Estado = 'Disponible';


            $resLibro->save();
            $resLibro->restore();
            $this->dispatchBrowserEvent('crear', [
                'title' => 'Libro Restaurado  Con Exito..',
                'icon' => 'success',

            ]);
        }


    }


    public function llamarModalEliminarLibro($id){

        $this->dispatchBrowserEvent('eliminarT', [
            'type' => 'warning',
            'title' => '¿Estas Seguro De Inactivar El Libro?',
            'id' => $id,

        ]);
    }

    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarLibroTotalMente($id){

        $eliLibro =Libro::onlyTrashed()->where('id', $id)->first();

        $eliLibro->forceDelete();

    }

    public function CargarDatosPrestamosLibros ($id){

        $libro = Libro::find($id);


   
        foreach($this->arrayAgregaralatabla as $key => $value){

              if($value['id'] == $libro->id){
    
                $this->dispatchBrowserEvent('error', [
                     'title' => 'El Libro Ya Esta En Lista De Prestamo. ',
                     'icon'=>'error',
    
                ]);
                return;
              }
       }
      if(count($this->arrayAgregaralatabla)  == 5 ){

        $this->dispatchBrowserEvent('error', [
            'title' => 'No puedes Prestar Mas de 5 Tipos De Libro. ',
            'icon'=>'error',

        ]);
      }
      
      else{

        if ($libro->TipoNovedad =='Media' ) {

            $prestamoLibrof = Libro::findOrFail($id);
            $tomo = $prestamoLibrof -> NombreTomo;
            $prestadorLibro = Auth::user()->name;
            $this->nombreBibliotecario=$prestadorLibro;
            $this->prestador_id = Auth::user()->id;
            $this->selected_id = $id;
            $this->nombreLibro = $prestamoLibrof -> Nombre.$tomo;

            $this->NovedadesF=$prestamoLibrof -> Novedades;
            $this->cantidadDisponible = $prestamoLibrof -> CantidadLibros;

            $this->dispatchBrowserEvent('error', [
                'title' => 'El elemento Presenta Una Novedad Verifica Antes de Realizar El Prestamo. ',
                'icon'=>'info',

            ]);

        }elseif($libro->Estado =='NoDisponible'){



            $this->dispatchBrowserEvent('error', [
                'title' => 'No se puede prestar Actualmente Tiene una Novedad el Libro.',
                'icon'=>'error',
                'iconColor'=>'red',
            ]);
        }elseif($libro->Estado=='Agotado'){


            $this->dispatchBrowserEvent('error', [
                'title' => 'No se puede prestar Actualmente el Libro se encuentra Agotado.',
                'icon'=>'info',

            ]);
        }elseif($libro->Estado == 'Disponible'){
            $this->dispatchBrowserEvent('error', [
                'title' => 'Datos Cargados Con Exito .....',
                'icon'=>'success',  ]);
            $prestamoLibrof = Libro::findOrFail($id);
            $tomo = $prestamoLibrof -> NombreTomo;
            $prestadorLibro = Auth::user()->name;
            $this->nombreBibliotecario=$prestadorLibro;
            $this->prestador_id = Auth::user()->id;
            $this->selected_id = $id;
            $this->nombreLibro = $prestamoLibrof -> Nombre.$tomo;
            $this->NovedadesF=$prestamoLibrof -> Novedades;
            $this->cantidadDisponible = $prestamoLibrof -> CantidadLibros;



        }
    }


    }






    public function ActualizarCantidadLibros (){
        $librof = Libro::find($this->selected_id);

        $cantidaPrestarLibro = $this->cantidadPrestamo;
        $cantidadDisponible = $this-> cantidadDisponible;
        $Total = $cantidadDisponible-$cantidaPrestarLibro;
        $librof->CantidadLibros = $Total;
        $librof->update();
    }



    public function RealizarPrestamoLibro(){






        $validateData = $this->validate([
            'cantidadPrestamo' => 'required|numeric',
            'nombreUsuario'=>'required',
            'cantidadDisponible'=>'required',
            'nombreBibliotecario'=>'required',
            'nombreLibro'=>'required',
            'NovedadesF'=>'required',




        ]);





        $cantidaPrestarLibro = $this->cantidadPrestamo;
        $cantidadDisponible = $this-> cantidadDisponible;
        if($cantidaPrestarLibro > $cantidadDisponible){




            $this->dispatchBrowserEvent('swal', [
                'title' => 'La cantidad aprestar no puede ser mayor a la cantidad de libros disponbles',
                'icon'=>'info',
                'iconColor'=>'red',
            ]);


        }elseif ($cantidaPrestarLibro <= 0){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'La cantidad aprestar tiene que ser mayor a 0',
                'icon'=>'info',
                'iconColor'=>'red',
            ]);




        }else{
            if ($this->selected_id){


                $prestamoLibrof = Libro::findOrFail($this->selected_id);
                $tipoel = 'Libro';


                $arrayAgregaralatabla = array(
                    'NovedadesPrestamoU'=>$this->NovedadesF,
                    'NombreLibro'=>$this->nombreLibro,
                    'id'=>   $this->selected_id,
                    'usuario_id'=>$this->nombreUsuario,
                    'Tipo_Elemento'=>$tipoel,
                    'NombreBibliotecario'=>$this->nombreBibliotecario,

                    'CantidadPrestada'=>$this->cantidadPrestamo,




                );



                $this->arrayAgregaralatabla[] = $arrayAgregaralatabla;

                $this->ActualizarCantidadLibros();
                $this->actualizarEstadoLibro();
                $this->limpiarCamposPrestamo();

                $this->dispatchBrowserEvent('error', [
                    'title' => ' Libro Listo Para Prestar...',
                    'icon'=>'success',  ]);

            }
        }



    }



    public function limpiarCamposPrestamo() {


        $this->cantidadPrestamo = null;
        $this->nombreLibro = null;
        $this->cantidadDisponible= null;
        $this->nombreBibliotecario= null;
        $this->FechaPrestamo = null;

        $this->selected_id = null;
        $this->prestador_id = null;

        $this->selected_id = null;
        $this->Nombre =null;
        $this->Autor = null;
        $this->Editorial = null;
        $this->Edicion = null;
        $this->Descripcion = null;
        $this->Estado = null;
        $this->categoria_id = null;
        $this->CantidadLibros= null;
        $this->Novedades= null;
        $this->NovedadesF = null;
        $this->TipoNovedad= null;
        $this->NombreTomo=null;



    }

    public function actualizarEstadoLibro(){
        $librof = Libro::find($this->selected_id);
        if($librof->CantidadLibros > 0){
            $librof->Estado = 'Disponible';
            $librof->update();

        }elseif($librof->CantidadLibros == 0){
            $librof->Estado = 'Agotado';
            $librof->update();
        }
    }




    /**
     * @return mixed
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     * @return self
     */
    public function setMessages($messages): self {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRules() {
        return $this->rules;
    }

    /**


    /**
     * @param mixed $rules
     * @return self
     */
    public function setRules($rules): self {
        $this->rules = $rules;
        return $this;
    }
}