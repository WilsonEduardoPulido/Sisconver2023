<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Elemento;
use App\Models\Prestamo;
use App\Models\Categoria;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Prestamos\DetallePrestamo;


class Elementos extends Component
{
    use WithPagination;


    public $nombreElemento, $cantidadElemento,$NovedadesElemento,$TipoNovedad;
    public $totalCantidad;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre,$idarray, $cantidad, $descripcion, $Estado, $categoria_id, $name, $Fecha_Prestamo, $usuario_id, $CantidadPrestar, $prestador_id;
    public $arrayElementos = [];
    public function render()
    {
        $consultaUsuarios = User::where('Estado', "=", 'Activo')->select('id', 'name')->get();
        $elementosPrestados = Elemento::where('Estado', "=", 'Prestado')->paginate(10);
        $consulta = Elemento::onlyTrashed()->where('Estado', "=", "Inactivo")->paginate(10);




        $categorias = Categoria::where('Tipo', 'Elementos')->select('id', 'nombre')->get();
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.elementos.vistaTabla', [
            'elementos' => Elemento::latest()
                ->orWhere('nombre', 'LIKE', $keyWord)
                ->orWhere('cantidad', 'LIKE', $keyWord)
                ->orWhere('descripcion', 'LIKE', $keyWord)
                ->orWhere('Estado', 'LIKE', $keyWord)
                ->orWhere('categoria_id', 'LIKE', $keyWord)
                ->paginate(10),
        ], compact('categorias', 'consulta', 'elementosPrestados', 'consultaUsuarios'));
    }

    //Funcion Que Limpia los campos Input del formulario
    public function cancelar()
    {
        $this->limpiarCamposInput();
    }



    //Reglas de Validacion
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    protected $rules = [
        'nombre' => 'required',
        'cantidad' => 'required|min:1|numeric',
        'descripcion' => 'required',
        
        'categoria_id' => 'required',
        'NovedadesElemento'=>'required',
        'TipoNovedad'=>'required'



    ];
    protected $messages = [
        'cantidad.required' => 'La cantidad es requerida',
        'cantidad.min' => 'La cantidad debe tener al menos  un numero mayor a 0',
        'cantidad.numeric' => 'La cantidad debe ser un numero mayor a 0',
    ];


    public function limpiarCamposInput()
    {
        $this->nombre = null;
        $this->cantidad = null;
        $this->descripcion = null;
        $this->Estado = null;
        $this->categoria_id = null;
        $this->NovedadesElemento = null;
        $this->TipoNovedad = null;
    }

    public function crearElemento()
    {

        $validateData = $this->validate();


        $crearElemento = new Elemento();

           $crearElemento->nombre = $this->nombre;
              $crearElemento->cantidad = $this->cantidad;
                    $crearElemento->descripcion = $this->descripcion;
                        $crearElemento->Estado = 'Disponible';
                        $crearElemento->categoria_id = $this->categoria_id;
                        $crearElemento->NovedadesElemento = $this->NovedadesElemento;
                        $crearElemento->TipoNovedad = $this->TipoNovedad;
                            $crearElemento->save();
    

                            $this->selected_id=$crearElemento->id;
                            $this->actualizarEstadoNovedad();

                         
                            $this->resetErrorBag();
                                $this->cancelar();
                                $this->dispatchBrowserEvent('cerrar');
                                $this->dispatchBrowserEvent('crear', [
                                    'type' => 'success',
                                    'title' => 'Elemento Agregado Con Exito...',
                                    'icon'=>'success',
                                    
                                ]);



       

    }

    public function editarElemento($id)
    {
        $record = Elemento::findOrFail($id);

        if($record->Estado=='Agotado'){

            $this->dispatchBrowserEvent('cerrar');
            session()->flash('info', 'No se puede editar un elemento Agotado tiene prestamos realizados');
            return;

        }
        $this->selected_id = $id;
        $this->nombre = $record->nombre;
        $this->cantidad = $record->cantidad;
        $this->descripcion = $record->descripcion;
        $this->Estado = $record->Estado;
        $this->categoria_id = $record->categoria_id;
        $this->NovedadesElemento=$record->NovedadesElemento;
        $this->TipoNovedad = $record->TipoNovedad;
    }

    public function actualizarElemento()
    {
        $this->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required',
            'Estado' => 'required',
            'categoria_id' => 'required',
            'NovedadesElemento'=>'required',
            'TipoNovedad'=>'required'
        ]);

        if ($this->selected_id) {
            $record = Elemento::find($this->selected_id);
            $record->update([
                'nombre' => $this->nombre,
                'cantidad' => $this->cantidad,
                'descripcion' => $this->descripcion,
                'Estado' => $this->Estado,
                'categoria_id' => $this->categoria_id,
                'NovedadesElemento' => $this->NovedadesElemento,
                'TipoNovedad' => $this->TipoNovedad,

            ]);
$this->actualizarEstadoNovedad();
            $this->cancelar();
            $this->dispatchBrowserEvent('cerrar');
           
            $this->resetErrorBag();
            $this->dispatchBrowserEvent('crear', [
                'type' => 'success',
                'title' => 'Elemento Actualizado Con Exito...',
                'icon'=>'success',
                
            ]);
        }
    }





public function actualizarEstadoNovedad(){

    $elementoN = Elemento::find($this->selected_id);

        
      if($elementoN->TipoNovedad =='Alta'){

        $elementoN->Estado='NoDisponible';
        $elementoN->update();
      }elseif($elementoN->TipoNovedad =='Ninguna'){
        $elementoN->Estado='Disponible';
        $elementoN->update();
        }elseif($elementoN->TipoNovedad =='Media'){
            $elementoN->Estado='Disponible';
            $elementoN->update();
             }elseif($elementoN->Estado=='Agotado'){

            session()->flash('info', 'El Elemento no puede ser actualizado porque esta agotado.');
             }
}



    //Inactivar Elemento
    public function inactivarElemento($id)
    {


        $elemento = Elemento::find($id);

        if ($elemento->Estado == 'Disponible') {
            $elemento->Estado = 'Inactivo';
            $elemento->save();
            $elemento->delete();
            session()->flash('message', 'Libro Inactivado Con Exito.');
        } else {
            $elemento->Estado = 'Prestado';

            session()->flash('message', 'Libro No Puede Ser Inactivado Porque actualmente esta prestado.');
        }
    }





    //Restaurar Elemento Eliminado

    public function restaurarElemento($id)
    {
        $resElemento = Elemento::onlyTrashed()->where('id', $id)->first();
        if ($resElemento->Estado == 'Inactivo') {
            $resElemento->Estado = 'Disponible';
            $resElemento->save();
        }
        $resElemento->restore();
        session()->flash('message', 'Elemento Restaurado Con Exito.');
    }


    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarElementoTotalMente($id)
    {

        $eliElemento = Elemento::onlyTrashed()->where('id', $id)->first();

        $eliElemento->forceDelete();
        session()->flash('message', 'Elemento Eliminado Del Sistema');
    }

//Funcion Para Cargar Los Datos Del Prestamo
    public function cargarDatosPrestamo($id)
    {



        $prestamoC = Elemento::findOrFail($id);
       

    





        if($prestamoC->cantidad==0 and $prestamoC->TipoNovedad=='Alta'){
            session()->flash('info', 'No se puede prestar este elemento porque no hay unidades disponibles');
            return;

        }
        elseif($prestamoC->TipoNovedad=='Alta')
        {
            session()->flash('error', 'No se puede prestar este elemento porque actualmente tiene una novedad');
            return;
        }elseif($prestamoC->Estado=='Agotado')
        {
            session()->flash('info', 'No se puede prestar este elemento porque actualemte no hay unidades disponibles');
            return;
        }elseif($prestamoC->Estado=='Inactivo')
        {
            session()->flash('error', 'No se puede prestar este elemento porque esta inactivo');
            return;
        }
        elseif($prestamoC->TipoNovedad =='Media'){

            session()->flash('info', 'Este elemento tiene una novedad media, se debe revisar antes de ser prestado');
            
            $prestador = Auth::user()->name;
        $this->name = $prestador;
        $this->prestador_id = Auth::user()->id;
        $this->selected_id = $id;

        $this->nombreElemento = $prestamoC->nombre;
        $this->cantidadElemento = $prestamoC->cantidad;
        $this->NovedadesElemento = $prestamoC->NovedadesElemento;
        $this->Estado = $prestamoC->Estado;
        }elseif($prestamoC->cantidad==0 ){
            session()->flash('info', 'No se puede prestar este elemento porque no hay unidades disponibles y tiene una novedad');
            return;
          }

        else{


            $prestador = Auth::user()->name;
        $this->name = $prestador;
        $this->prestador_id = Auth::user()->id;
        $this->selected_id = $id;

        $this->nombreElemento = $prestamoC->nombre;
        $this->cantidadElemento = $prestamoC->cantidad;
        $this->NovedadesElemento = $prestamoC->NovedadesElemento;
        $this->Estado = $prestamoC->Estado;

        session()->flash('exito', 'Datos cargados con exito');
        }






    }

  


    //Funcion Actualizar Cantidad
    public function actualizarCantidad(){

        $elemento = Elemento::find($this->selected_id);
        $CantidadPrestar = $this->CantidadPrestar;
        $cantidadElemento = $this->cantidadElemento;

        $total=$cantidadElemento-$CantidadPrestar;
        $elemento->cantidad=$total;




        $elemento->update();



    }

    public function actualizarEstado(){

        $elemento = Elemento::find($this->selected_id);

        if($elemento->cantidad==0){
            $elemento->Estado='Agotado';

        $elemento->update(); }
        elseif($elemento->TipoNovedad=='Alta'){
            $elemento->Estado='Fueradeservicio';
              }elseif($elemento->Estado=='Agotado'){
            $elemento->Estado='Disponible';

        $elemento->update(); }
        elseif($elemento->Estado=='Fueradeservicio'){
            $elemento->Estado='Disponible';
            $elemento->update();
              }
        else{
            $elemento->Estado='Disponible';
       
    }  }







//Funcion Para Realizar El Prestamo
    public function realizarPrestamo()
    {

        $CantidadPrestar = $this->CantidadPrestar;
        $cantidadElemento = $this->cantidadElemento;

$this->validate([
            'usuario_id' => 'required',
            
        ]);

        if ($CantidadPrestar > $cantidadElemento) {

            session()->flash('info', 'La cantidad a prestar no puede ser mayor a la cantidad del elemento');


        } elseif ($CantidadPrestar <= 0) {
            session()->flash('info', 'La cantidad a prestar no puede ser menor a 0');

        } else {



            if ($this->selected_id) {

                $elemento = Elemento::find($this->selected_id);



                $bi= $prestadorele = Auth::user()->name;


                $tipoel = 'Elemento';

                $idrr = rand(1, 99999999);
                $this->idarray = $idrr;

                $arrayElementos = array(
'id_array'=>$this->idarray,
                    'NombreElemento'=>$this->nombreElemento,
                    'id'=>   $this->selected_id,
                    'usuario_id'=>$this->usuario_id,

                    
                    // $this->nombreLibro = $prestamoLibrof -> Nombre,
                    'CantidadPrestada'=>             $this->CantidadPrestar,

                   'NovedadesPrestamoU'=>$this->NovedadesElemento,


                );
                


                $this->arrayElementos[] = $arrayElementos;

               

                
        
               
        
               

                        $this->actualizarCantidad();

                        $this->actualizarEstado();
        
    
        
        
                        session()->flash('info', 'Datos Cargados Con Exito.');
                        $this->resetErrorBag();
                       
                        
                        
                        
                   

                

                
              

            }
        }


        

    }





    



    public function quitarElementoPrestamo($key){


        $this->arrayElementos[$key]['id'];

        $idlibor=$this->arrayElementos[$key]['id'];
        $cantidadPrestada=$this->arrayElementos[$key]['CantidadPrestada'];



        $prestamoDevolver = Elemento::findOrFail($idlibor);






        $totaldevLi = (int) $cantidadPrestada +   $cantidadActualParaSumar=$prestamoDevolver->cantidad;


        $prestamoDevolver->cantidad = $totaldevLi;

        $prestamoDevolver->update();


        unset($this->arrayElementos[$key]);
        session()->flash('exito','Prestamo Cancelado');

    }






    public function añadirPrestamoModeloPrestamoElemento(){




        $codigo_Prestamo ='LAINB'. rand(1, 99999999);
        
        $this->$codigo_Prestamo = $codigo_Prestamo;

        
        $prestamos = new Prestamo();
        $prestamos->Codigo_Prestamo = $codigo_Prestamo;
     

        $prestamos->usuario_id = $this->usuario_id;
        $prestamos->Tipo_Elemento = 'Elemento';
        $prestamos->NombreBibliotecario  = Auth::user()->name;

        $prestamos->created_at = now();
        $prestamos->updated_at = now();

        $prestamos->save();

        


        foreach($this->arrayElementos as $key =>$elemento){

            $datos = array(

                "id_prestamo"=> $prestamos->id,
                "id_elemento" => $elemento['id'],
                "CantidaPrestadaU" => $elemento['CantidadPrestada'],
                "NovedadesPrestamoU" => $elemento['NovedadesPrestamoU'],

                "created_at"=>now(),
                "updated_at"=>now(),
            );
            DetallePrestamo::insert($datos);
            unset($this->arrayElementos[$key]);
            session()->flash('alertaprestamow', 'Prestamo Realizado  Con Exito.');
            $this->limpiarCampos();
        }

        $this->dispatchBrowserEvent('crear', [
            'type' => 'success',
            'title' => 'Prestamo Realizado Con Exito...',
            'icon'=>'success',
            
        ]);
    }










    //Funcion Que Cambia el estado del Elemento
    public function actualizarEstadoLibro(){
        $actualizarEstadoPrestamo = Elemento::find($this->selected_id);


        if($actualizarEstadoPrestamo->cantidad > 0){
            $actualizarEstadoPrestamo->Estado = 'Disponible';


            $actualizarEstadoPrestamo->update();


        }elseif($actualizarEstadoPrestamo->cantidad == 0){
            $actualizarEstadoPrestamo->Estado = 'Agotado';
            $actualizarEstadoPrestamo->update();
        }
    }

    //Funcion Para Limpiar Los Campos
    public function limpiarCampos(){


        $this->name = '';
        $this->cantidadElemento = '';
        $this->nombreElemento = '';
        $this->CantidadPrestar = '';
        $this->Fecha_Prestamo = '';
        $this->usuario_id = '';
        $this->prestador_id = '';
        $this->selected_id = '';
        $this->descripcion = '';
        $this->Estado = '';
        $this->categoria_id = '';


        $this->resetValidation();
    }

}
