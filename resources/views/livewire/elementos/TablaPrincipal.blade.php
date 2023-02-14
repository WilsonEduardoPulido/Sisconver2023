<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla de Elementos</h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='keyWord' type="text" class="form-control  m-3" name="buscarCategoria"
                   id="buscarCategoria" placeholder="Buscar Elementos...">
        </div>



    </div>
    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>


                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                @forelse($elementos as $row)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $row->nombre }}</td>

                        <td>{{ $row->cantidad }}</td>
                        <td colspan="">{{ $row->descripcion }}</td>
                        @if ($row->Estado == 'Agotado' and $row->CantidadLibros == 0)

                            <td class=" text-white">
                                <button title="Agotado" class="btn btn-danger text-white bi bi-bookmark-dash-fill">

                                </button>

                            </td>

                        @elseif($row->Estado == 'NoDisponible')
                            <td class=" text-white">
                                <button title="Fuera De Servicio" class="btn btn-primary text-white bi bi-bookmark-check-fill">

                                </button>

                            </td>

                        @else
                        <td class=" text-white">
                            <button title="Disponible" class="btn btn-warning text-white bi bi-bookmark-check-fill">

                            </button>

                        </td>
                        @endif


                        <td>{{ $row->categoria->nombre }}</td>
                        <td class="d-flex justify-content-around">



                            <a title="Editar" data-bs-toggle="modal" data-bs-target="#actualizarNuevoElementoModal"
                               class=" bi bi-pencil-square text-white btn btn-info m-1 "
                               wire:click="editarElemento({{ $row->id }})"></a>

                            <a  title="Inactivar"  class="btn btn-danger bi bi-trash3-fill  text-white m-1 "
                                wire:click="eliminar({{ $row->id }})"></a>

                            <a  title="Ver" data-bs-toggle="modal" data-bs-target="#verDetallesElemento"
                                class=" bi bi bi-eye-fill text-white btn btn-warning m-1 "
                                wire:click="editarElemento({{ $row->id }})"> </a>

                            <a  title="RealizarPrestamo"  data-bs-target="#PrestamoElemento"
                                class=" bi bi-calendar2-check text-white btn-sm  btn btn-success m-1"
                                wire:click="cargarDatosPrestamo({{ $row->id }})">
                            </a>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $elementos->links() }}</div>
        </div>
    </div>





</div>
</div>
