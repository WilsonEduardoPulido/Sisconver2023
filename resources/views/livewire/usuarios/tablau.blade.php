<div>

    @include('livewire.usuarios.modales')
    @section('title', __('Usuarios'))
    <div class="container-fluid">
        <button class=" btn-warning text-white bi bi-person-add btn-circle btn  " type="button" class="btn btn-primary"
        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Añadir Nuevo Usuario
    </button>
        <div class="justify-content-center">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('message') }}</strong>
                </div>

                <script>
                    var alertList = document.querySelectorAll('.alert');
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert)
                    })
                </script>
            @endif
            <div class="col-md-12">

                <div class="card m-5 ">

                    <div class="card-header d-flex justify-content-between bg-white">
                        <h4 class="text-center ">Tabla de gestión de Usuarios </h4>

                    </div>
                    <div class="d-flex  justify-content-between">

                        <div class="col-6">
                            <input wire:model='buscar' type="text" class="form-control  m-3" name="search"
                                id="search" placeholder="Buscar Usuarios...">
                        </div>



                    </div>
                    <div class="card-body  ">

                        <div class="table-responsive">
                            <table class="table libros table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>#</td>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Usuario</th>
                                        <th>Direcciòn</th>
                                        <th>celular</th>
                                        <th>Curso </th>
                                        <th>Estado </th>
                                        <th>Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($libros as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nameM }}</td>
                                            <td>{{ $row->lastnameM }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->user }}</td>
                                            <td >{{ $row->direccion }}</td>
                                            <td>{{ $row->celular }}</td>
                                            <td>{{ $row->Grado }}</td>
                                            @if ($row->Estado == 'Disponible')
                                                <td class=" text-white">
                                                    <button class="btn btn-warning text-white">
                                                        {{ $row->Estado }}
                                                    </button>


                                                </td>
                                            @else
                                                <td class=" text-white">
                                                    <button class="btn btn-danger text-white">
                                                        {{ $row->Estado }}
                                                    </button>


                                                </td>
                                            @endif



                                            <td class="d-flex">


                                                <a data-bs-toggle="modal" data-bs-target="#EditarUsuario"
                                                    class=" bi bi-pencil-square text-white btn btn-info "
                                                    wire:click="editarUsuario({{ $row->id }})"> </a>
                                                <a class="btn btn-danger bi bi-trash3-fill  text-white "
                                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                                    wire:click="destroy({{ $row->id }})"> </a>
                                                <a data-bs-toggle="modal" data-bs-target="#verUsuario"
                                                    class=" bi bi bi-eye-fill text-white btn btn-warning "
                                                    wire:click="editarUsuario({{ $row->id }})"> </a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">{{ $libros->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


































</div>
