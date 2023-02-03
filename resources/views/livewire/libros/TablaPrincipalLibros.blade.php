<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla de gestion de Libros </h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model="libros" type="text" class="form-control  m-3" 
              placeholder="Buscar Libros">
        </div>



    </div>
    <div class="card-body  " style="height:80%">

        <div class="table-responsive">

            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Edicion</th>
                        <th>Cantidad</th>
                        <th>Estado</th>

                        <th>Categoría </th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($libros as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->Nombre }}  {{ $row->NombreTomo }}  </td>
                            <td>{{ $row->Autor }}</td>
                            <td>{{ $row->Editorial }}</td>
                            <td>{{ $row->Edicion }}</td>
                            <td>{{ $row->CantidadLibros }}</td>
                            @if ($row->Estado == 'Agotado' and $row->CantidadLibros == 0)

                                <td class=" text-white">
                                    <button title="Agotado" class="btn btn-danger text-white bi bi-bookmark-dash-fill">

                                    </button>

                                </td>

                                @elseif($row->Estado == 'NoDisponible')



                                <td class=" text-white">
                                    <button title="No Disponible" class="btn btn-primary text-white bi bi-bookmark-x-fill">

                                    </button>
                            @else
                                <td class=" text-white">
                                    <button title="Disponible" class="btn btn-warning text-white bi bi-bookmark-check-fill">

                                    </button>

                                </td>


                            @endif



                            <td>{{ $row->nombre }}</td>
                            <td class="d-flex">


                                <a title="Editar" data-bs-toggle="modal" data-bs-target="#actualizarLibroModal"
                                    class=" bi bi-pencil-square text-white btn btn-info m-1 "
                                    wire:click="edit({{ $row->id }})"></a>
                                <a  title="Inactivar"  class="btn btn-danger bi bi-trash3-fill  text-white m-1 "

                                    wire:click="eliminar({{ $row->id }})"></a>
                                <a  title="Ver" data-bs-toggle="modal" data-bs-target="#verlibro"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning m-1 "
                                    wire:click="VerdetalleCategoria({{ $row->id }})"> </a>
                                <a  title="RealizarPrestamo"  data-bs-target="#prestamoLibro"
                                    class=" bi bi-calendar2-check text-white btn-sm  btn btn-success m-1"
                                    wire:click="CargarDatosPrestamosLibros({{ $row->id }})">
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay
                                registros para mostrar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $libros->links() }}</div>
        </div>
    </div>





</div>
