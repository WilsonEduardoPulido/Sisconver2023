<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Restaurar Libros Eliminados </h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='keyWord' type="text" class="form-control  m-3"
                name="search" id="search" placeholder="Buscar Libros">
        </div>



    </div>
    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Edicion</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Estado</th>


                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consulta as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->Nombre }}</td>
                            <td>{{ $row->Autor }}</td>
                            <td>{{ $row->Editorial }}</td>
                            <td>{{ $row->Edicion }}</td>
                            <td>{{ $row->CantidadLibros }}</td>

                            <td>{{ $row->categoria->nombre }}</td>
                            @if ($row->Estado == 'Disponible')
                                <td class=" text-white">
                                    <button title="Activo" class="btn btn-warning m-1 bi bi-check2 text-white">

                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button  title="Inactivo" class="btn btn-danger m-1 bi bi-x-square text-white">

                                    </button>


                                </td>
                            @endif


                            <td class="d-flex">


                                <a  title="Restaurar"  data-bs-toggle="modal"
                                    class="  text-white btn bi bi-arrow-counterclockwise  m-1 btn-warning "
                                    wire:click="restaurarLibro({{ $row->id }})">
                                </a>


                                <a data-bs-toggle="modal" title="Eliminar"
                                    class=" bi bi-trash3-fill  text-white  m-1  btn btn-danger "
                                    wire:click="llamarModalEliminarLibro({{ $row->id }})">
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay
                                registros
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $consulta->links() }}</div>
        </div>
    </div>





</div>
