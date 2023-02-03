<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class TablaUsuarios extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public $name , $lastname , $email , $user , $direccion , $celular , $Grado,$password,$Estado,$usuario_id;

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Lastname", "lastname")
                ->sortable(),
            Column::make("TipoDoc", "TipoDoc")
                ->sortable(),
            Column::make("Direccion", "direccion")
                ->sortable(),
            Column::make("Celular", "celular")
                ->sortable(),
            Column::make("NumeroDoc", "NumeroDoc")
                ->sortable(),
            Column::make("Estado", "Estado")
                ->sortable(),
            Column::make("Grado", "Grado")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
                Column::make("Actions")->label(fn($row) => view('livewire.usuarios.actions', ['row' => $row])),
        ];
    }

    
  public function editarUsuario ($id){
    $usuario = User::findOrFail($id);
    $this->usuario_id = $id; 
		
$this->name = $usuario->name;
$this->lastname = $usuario->lastname;
$this->email = $usuario->email;
$this->user = $usuario->user;
$this->direccion = $usuario->direccion;
$this->celular = $usuario->celular;
$this->Grado = $usuario->Grado;
$this->Estado = $usuario->Estado;
$this->password = $usuario->password;
    
        
    
  }





  public function update()
    {
        $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'user' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'Grado' => 'required',
            ]);

        if ($this->usuario_id) {
			$usuario = User::find($this->usuario_id);
            $usuario->update([ 
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'email' => $this-> email,
			'user' => $this-> user,
			'direccion' => $this-> direccion,
			'celular' => $this-> celular,
'Estado' => $this-> Estado,
			'Grado' => $this-> Grado,
            'password'=>$this->password,

            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('cerrar');
			session()->flash('message', 'Usuario Actualizado Con Exito.');
        }
    }
}
