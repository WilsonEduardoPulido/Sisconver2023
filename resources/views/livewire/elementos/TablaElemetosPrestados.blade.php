<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla de Elementos</h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='buscarCategoria' type="text" class="form-control  m-3" name="buscarCategoria"
                id="buscarCategoria" placeholder="Buscar Categorias...">
        </div>



    </div>
    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>


                        <th>Estado</th>
                        <td>Categoría</td>
                        <td>Acciones</td>

                    </tr>
                </thead>
                <tbody>
                    @forelse($elementosPrestados as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->cantidad }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Activa')
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


                            <td>{{ $row->categoria->nombre }}</td>
                            <td class="d-flex">


                                <a data-bs-toggle="modal" data-bs-target="#actualizarElementoModal"
                                    class=" bi bi-pencil-square text-white btn btn-info "
                                    wire:click="edit({{ $row->id }})"> </a>
                                <a class="btn btn-danger bi bi-trash3-fill  text-white "
                                    onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                    wire:click="destroy({{ $row->id }})"> </a>
                                <a data-bs-toggle="modal" data-bs-target="#verDetallesCategoria"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning "
                                    wire:click="verDetallesCategoria({{ $row->id }})"> </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $elementosPrestados->links() }}</div>
        </div>
    </div>





</div>
