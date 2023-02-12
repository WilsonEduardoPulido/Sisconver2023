<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Sancion;



class Usuarios extends Component
{
    use WithPagination;

    protected $listeners = ['eliminarTemporalUsuario' => 'eliminarTemporalUsuario'];
    protected $paginationTheme = 'bootstrap';
    public $buscar;
    public $usuario_id;
    public $name, $lastname, $email, $TipoDoc, $direccion, $celular, $Grado, $password, $Estado, $NumeroDoc, $password_confirmation;
    public $Nombre, $Apellidos, $numeroDeDocumento, $tipoDocumento, $Gradoe,$bibliotecarioS,$descripcionSancion,$nombreB,$motivo,
        $fechaSancion,$estadoSancion,$idSancion,$usuarioSa=[],$usuarioSancionar;
    public function render()
    {

        $usuariosInactivos=User::onlyTrashed()->orWhere("Estado" ,"=", "Inactivo")->paginate(10);
        $buscar = '%' . $this->buscar . '%';
        return view('livewire.usuarios.VistaPrincipalUsuarios', [
            'usuarios' => User::latest()
                ->orWhere('name', 'LIKE', $buscar)
                ->orWhere('lastname', 'LIKE', $buscar)
                ->orWhere('email', 'LIKE', $buscar)

                ->orWhere('direccion', 'LIKE', $buscar)
                ->orWhere('celular', 'LIKE', $buscar)
                ->orWhere('Grado', 'LIKE', $buscar)
                ->where('Estado', '=', 'Activo')
                ->paginate(10),

        ],compact('usuariosInactivos'));
    }


    public function cancelar()
    {
        $this->resetInput();
    }

    protected $rules = [
        'name' => 'required|string|max:50',
        'email' => 'required|email| max:255| unique:users',

        'lastname' => 'required| |string|max:50',

        'direccion' => 'required|string|max:38',
        'Grado' => 'required|string',
        'NumeroDoc' => 'required|numeric|max:10',
        'TipoDoc' => 'required|string',
        'celular' => 'required|numeric|unique:users|max:9',
        'password'=>'required|min:8',
        'Estado'=>'required',

    ];

    protected $messages =  [
        'name.required'=>'El Campo  nombre es requerido ',
        'name.string'=>'El Campo nombre debe ser una cadena de caracteres',
        'name.max'=>'El Campo nombre debe tener un maximo de 50 caracteres',
        'email.required'=>'El Campo Correo Electrònico es requerido',
        'descripcionSancion.required'=>'El Campo Descripciòn es requerido',
        'descripcionSancion.max'=>'El Campo Descripciòn  debe tener un maximo de 200 caracteres',
        'email.email'=>'El Campo Correo Electrònico debe ser un correo electronico',
        'email.max'=>'El Campo Correo Electrònico debe tener un maximo de 255 caracteres',
        'email.unique'=>'El Correo Electrònico ya se encuentra registrado',
        'lastname.required'=>'El Campo Apellidos es requerido',
        'lastname.string'=>'El Campo Apellidos debe ser una cadena de caracteres',
        'lastname.max'=>'El Campo Apellidos debe tener un maximo de 50 caracteres',
        'direccion.required'=>'El Campo Direcciòn es requerido',
        'direccion.string'=>'El Campo Direcciòn debe ser una cadena de caracteres',
        'direccion.max'=>'El Campo Direcciòn debe tener un maximo de 38 caracteres',
        'direccion.unique'=>'La Direcciòn ya se encuentra registrada',
        'Grado.required'=>'El Campo Grado es requerido',
        'Grado.string'=>'El Campo Grado debe ser una cadena de caracteres',
        'NumeroDoc.required'=>'El Campo Numero de Documento es requerido',
        'NumeroDoc.numeric'=>'El Campo Numero de Documento debe ser un numero',
        'NumeroDoc.min'=>'El Campo Numero de Documento debe tener un minimo de 1 caracteres',
        'NumeroDoc.max'=>'El Campo Numero de Documento debe tener un maximo de 10 caracteres',
        'NumeroDoc.unique'=>'El Numero de Documento ya se encuentra registrado',
        'TipoDoc.required'=>'El Campo Tipo de Documento es requerido',
        'TipoDoc.string'=>'El Campo Tipo de Documento debe ser una cadena de caracteres',
        'celular.required'=>'El Campo Celular es requerido',
        'celular.numeric'=>'El Campo Celular debe ser un numero',
        'celular.min'=>'El Campo Celular debe tener un minimo de 10 caracteres',
        'celular.max'=>'El Campo Celular debe tener un maximo de 10 caracteres',
        'password.required'=>'El Campo Contraseña es requerido',
        'password.min'=>'El Campo Contraseña debe tener un minimo de 8 caracteres',
        'password.confirmed'=>'Las Contraseñas no coinciden',
        'password_confirmation.required'=>'El Campo Confirmar Contraseña es requerido',
        'password_confirmation.min'=>'El Campo Confirmar Contraseña debe tener un minimo de 8 caracteres',
        'password_confirmation.confirmed'=>'Las Contraseñas no coinciden',


        'Estado.required'=>'El campo Estado Es Requerido'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }




    public function crearUsuario()
    {

        $this->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email| max:255| unique:users',

            'lastname' => 'required| |string|max:50',

            'direccion' => 'required|string|max:38|unique:users',
            'Grado' => 'required|string',
            'NumeroDoc' => 'required|string|min:1|max:10',
            'TipoDoc' => 'required|string',
            'celular' => 'required|numeric|unique:users|digits:10',

            'password' => 'required|confirmed|min:8',
            'password_confirmation'=>'required|min:8',
        ]);






        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'TipoDoc' => $this->TipoDoc,
            'NumeroDoc' => $this->NumeroDoc,
            'direccion' => $this->direccion,
            'celular' => $this->celular,
            'Grado' => $this->Grado,


            'password' => Hash::make($this->password),
        ]);



        $this->dispatchBrowserEvent('cerrar');
        $this->dispatchBrowserEvent('crear', [
            'type' => 'success',
            'title' => 'Usuario Creado Con Exito...',
            'icon'=>'success',

        ]);
        $this->limpiarCampos();
    }





    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $this->usuario_id = $id;

        $this->name = $usuario->name;
        $this->lastname = $usuario->lastname;
        $this->email = $usuario->email;
        $this->NumeroDoc=$usuario->NumeroDoc;
        $this->TipoDoc=$usuario->TipoDoc;
        $this->direccion = $usuario->direccion;
        $this->celular = $usuario->celular;
        $this->Grado = $usuario->Grado;
        $this->Estado = $usuario->Estado;




    }
//  $usuario = Sancion::where('usuario_id',$id)->get();
    public function verUsuario($id){


        $usuario = user::findOrFail($id);
        $usuarioSa = Sancion::where('usuario_id',$id)->get();


        $contar =count($usuarioSa);

        $this->usuarioSa=$usuarioSa;
        if($contar == 1){

            $this->motivo=$usuarioSa[0]['Descripcion'];
            $this->fechaSancion=$usuarioSa[0]['created_at'];
            $this->estadoSancion=$usuarioSa[0]['Estado'];
            $this->idSancion=$usuarioSa[0]['id'];
        }

        $this->usuario_id = $id;

        $this->name = $usuario->name;
        $this->lastname = $usuario->lastname;
        $this->email = $usuario->email;
        $this->NumeroDoc=$usuario->NumeroDoc;
        $this->TipoDoc=$usuario->TipoDoc;
        $this->direccion = $usuario->direccion;
        $this->celular = $usuario->celular;
        $this->Grado = $usuario->Grado;
        $this->Estado = $usuario->Estado;



    }













    //Eliminar De Manera Temporal Usuario
    public function eliminarTemporalUsuario($id)
    {
        $usuarioT = User::find($id);
        if($usuarioT->Estado == 'Activo'){
            $usuarioT->Estado = 'Inactivo';
            $usuarioT->save();
            $usuarioT->delete();
            session()->flash('message', 'Usuario Inactivado Con Exito.');
        }  }

//Restaurar Categoria Eliminada

    public function restaurarUsuario($id){

        $usuarioR = User::onlyTrashed()->where('id', $id)->first();
        if($usuarioR->Estado == 'Inactivo'){
            $usuarioR->Estado = 'Activo';
            $usuarioR->save();

        }
        $usuarioR->restore();
        $this->dispatchBrowserEvent('crear', [
            'type' => 'success',
            'title' => 'Usuario Restaurado Con Exito',
            'icon'=>'success',

        ]);
    }


    //Elimina El Registro De La Base De Datos De Manera Definitiva
    public function eliminarTotalMente($id){

        $usuarioD =User::onlyTrashed()->where('id', $id)->first();

        $usuarioD->forceDelete();
        session()->flash('mensaje','Usuario Eliminado Del Sistema');
    }

    public function sancionarUsuario($id){

        $usuarioS = User::findOrFail($id);
        if($usuarioS->Estado =='Sancionado'){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'No se puede sancinar este Usuario .....',
                'icon' => 'error',

            ]);

            $this->limpiarCampos();
        }else{
            $this->nombreB=  $bibliotecarioSancion = Auth::user()->name;



            $this->usuario_id = $usuarioS->id;


            $this->Nombre=$usuarioS->name;
            $this->Apellidos=$usuarioS->lastname;
            $this->numeroDeDocumento = $usuarioS->NumeroDoc;
            $this->tipoDocumento = $usuarioS->TipoDoc;
            $this->Gradoe = $usuarioS->Grado;

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Datos Cargados con Exito .....',
                'icon' => 'success',

            ]);
        }




    }





    public function limpiarCampos(){


        $this->nombreB=null;
        $this->usuario_id=null;

        $this->Nombre = null;
        $this->Apellidos = null;
        $this->numeroDeDocumento=null;
        $this->tipoDocumento = null;
        $this->Gradoe = null;
        $this->usuarioS= [];
        $this->name = null;
        $this->lastname = null;
        $this->email = null;
        $this->TipoDoc = null;
        $this->NumeroDoc = null;
        $this->direccion = null;
        $this->celular = null;
        $this->Grado = null;
        $this->Estado = null;
        $this->password = null;
        $this->password_confirmation=null;
        $this->descripcionSancion=null;
        $this->resetErrorBag();
        $this->resetValidation();



    }


    public function enviarDatosSancion(){





        if( $this->descripcionSancion == null){


            $this->dispatchBrowserEvent('swal', [
                'title' => 'El Campo Descripciòn No Puede Estar Vacio',
                'icon' => 'error',

            ]);



        }elseif($this->nombreB  == null){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'El Campo Bibliotecario No Puede Estar Vacio',
                'icon' => 'error',

            ]);

        }else{
            $this->validate([
                'descripcionSancion' => 'required|string|max:200',


            ]);
            $usuarioSancionar = User::findOrFail($this->usuario_id) ;


            $nuevaSancion = new Sancion();
            $nuevaSancion->Descripcion = $this->descripcionSancion;

            $nuevaSancion->usuario_id = $this->usuario_id;



            $nuevaSancion->save();
            $this->dispatchBrowserEvent('crear', [
                'title' => 'Sancion Guardada Con Exito....',
                'icon' => 'success',

            ]);


            if( $usuarioSancionar->Estado == 'Activo'){

                $sancionado='Sancionado';

                $usuarioSancionar->Estado;

                $usuarioSancionar->Estado=$sancionado;

                $usuarioSancionar->update();


                $this->dispatchBrowserEvent('crear', [
                    'type' => 'success',
                    'title' => 'Usuario Sancionado Con Exito....',
                    'icon'=>'success',

                ]);
            }else{

                $this->dispatchBrowserEvent('swal', [
                    'title' => 'No puedes sancionar Este Usuario....',
                    'icon' => 'error',

                ]);



            }

            $this->limpiarCampos();


        }













    }

    public function cambiarEstadoSancion(){

        $usuarioSancionar = User::findOrFail($this->usuario_id);


        if( $usuarioSancionar->Estado == 'Activo'){

            $sancionado='Sancionado';

            $usuarioSancionar->Estado;

            $usuarioSancionar->Estado=$sancionado;

            $usuarioSancionar->update();


            $this->dispatchBrowserEvent('swal', [
                'title' => 'Usuario Sancionado Con Exito....',
                'icon' => 'success',

            ]);
        }else{

            $this->dispatchBrowserEvent('swal', [
                'title' => 'No puedes sancionar Este Usuario....',
                'icon' => 'error',

            ]);

            $this->limpiarCampos();

        }


    }

    public function retirarSancion($idSancion){



        $usuarioSancio = Sancion::findOrFail($idSancion);

        $u=$usuarioSancio->usuario_id;
        if($usuarioSancio->Estado == 'Activa'){

            $estadoc='Inactiva';

            $usuarioSancio->Estado=$estadoc;



            $a = user::findOrFail(  $u);

            $a->Estado='Activo';
            $usuarioSancio->save();
            $a->save();

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Sanciòn Finalizada .',
                'icon' => 'success',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
        }else{


        }

    }


    public function retirarSancione($id){

        $ideli=$id;

        $usuarioSancio = Sancion::all()->where('usuario_id',$ideli)->where('Estado','Activa');

        foreach ($usuarioSancio as $key => $value) {

            $u=$value['usuario_id'];
            $idsancion=
                $value['id'];  }


        $usuarioSancioc = Sancion::findOrFail($idsancion);


        if($usuarioSancioc->Estado == 'Activa'){


            $estadoc='Inactiva';

            $usuarioSancioc->Estado=$estadoc;
            $a = user::findOrFail(  $u);

            $a->Estado='Activo';

            $a->update();
            $usuarioSancioc->save();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Sanciòn Finalizada .',
                'icon' => 'success',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);




        }else{
            $a = user::findOrFail(  $u);

            $a->Estado='Activo';

            $a->update();

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Sanciòn Finalizada .',
                'icon' => 'success',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);

        }







    }




    public function eliminarSancion($idSancion){


        $usuarioSancioEli = Sancion::findOrFail($idSancion);
        if($usuarioSancioEli->Estado == 'Activa'){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error No Puedes Eliminar Una Sanciòn Activa .',
                'icon' => 'error',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
        }else{


            $usuarioSancioEli->forceDelete();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Sanciòn Eliminada Del Sistema .',
                'icon' => 'success',

                'timer' => 5000,
                'toast' => true,
                'position' => 'center',
                'showConfirmButton' => false,
            ]);
        }

    }






    public function actualizarUsuario()
    {

        $this->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email| max:255',

            'lastname' => 'required| |string|max:50',

            'direccion' => 'required|string|max:38',
            'Grado' => 'required|string',
            'NumeroDoc' => 'required|string|min:1|max:10',
            'TipoDoc' => 'required|string',
            'celular' => 'required|numeric|digits:10',

            'Estado'=>'required',
        ]);
        if ($this->usuario_id) {

            $usuario = User::find($this->usuario_id);



            if($usuario->Estado == 'Sancionado'){


                $this->dispatchBrowserEvent('swal', [
                    'title' => 'No puedes Editar Este Usuario Actualmente Esta Sancionado Puedes Retirar La Sanciòn Para Poder Editarlo....',
                    'icon' => 'error',

                ]);

                return;
            }


            $usuario->name = $this->name;
            $usuario->lastname = $this->lastname;
            $usuario->email = $this->email;
            $usuario->TipoDoc = $this->TipoDoc;
            $usuario->NumeroDoc = $this->NumeroDoc;
            $usuario->direccion = $this->direccion;
            $usuario->celular = $this->celular;
            $usuario->Grado = $this->Grado;
            $usuario->Estado = $this->Estado;






            $usuario->update();


            if ($usuario->Estado == 'Activo') {
                $usuario->restore();
            } else {
                $usuario->delete();
            }



            $this->dispatchBrowserEvent('cerrar');

            $this->dispatchBrowserEvent('crear', [
                'type' => 'success',
                'title' => 'Usuario Actualizado Con Exito....',
                'icon'=>'success',

            ]);
            $this->limpiarCampos();

        }
        if (auth()->user()->Estado == 'Inactivo' or auth()->user()->Estado == 'Sancionado') {
            return redirect()->route('login');

        }
    }


    public function cambiarContrasena(){


        $usuarioContra = User::find($this->usuario_id);
        $this->password_confirmation;


        $this->validate([


            'password' => 'required|confirmed|min:8',
            'password_confirmation'=>'required|min:8',
        ]);


        if($this->password == $this->password_confirmation){

            $usuarioContra->password = Hash::make($this->password);


            $usuarioContra->update();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Contraseña Cambiada Con Exito....',
                'icon' => 'success',

            ]);


            $this->password=null;
            $this->password_confirmation=null;
        }else{
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Las Contraseñas no coinciden.',
                'icon' => 'error',
                'iconColor' => 'red',
            ]);

        }




    }


    public function eliminar($id){


        $inactivarUser =user::findOrFail($id);


        $prestamos = Prestamo::select('users.id','prestamos.usuario_id','prestamos.Estado_Prestamo')
            ->join('users','users.id',"=",'prestamos.usuario_id')
            ->where('prestamos.usuario_id',$id)
            ->where('prestamos.Estado_Prestamo','Activo')
            ->get();



        if($inactivarUser->Estado == 'Sancionado'){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'No Puedes Inactivar Un Usuario Con Una Sanciòn Vigente.',
                'icon' => 'error',
                'iconColor' => 'red',
            ]);

        }elseif(count($prestamos) > 0){

            $this->dispatchBrowserEvent('swal', [
                'title' => 'No Puedes Inactivar Un Usuario Con Un Prestamo Vigente.',
                'icon' => 'error',

            ]);
        }

        else{
            $this->dispatchBrowserEvent('eliminar', [
                'type' => 'warning',
                'title' => '¿Estas Seguro De Inactivar El Libro?',
                'id' => $id,

            ]);
        }


    }







}