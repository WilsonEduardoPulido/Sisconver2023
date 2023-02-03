<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Restaurar  Elementos</h4>

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
                    @forelse($consulta as $row)
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
                                <td class=" text-white d-flex justify-content-center">
                                    <button class="btn btn-danger m-1 bi bi-x-square text-white" title="Inactivo">
                                    </button>


                                </td>
                            @endif


                            <td>{{ $row->categoria->nombre }}</td>
                            <td class="d-flex justify-content-around">


                                <a  title="Restaurar"  data-bs-toggle="modal"
                                    class="  text-white btn bi bi-arrow-counterclockwise  m-1 btn-warning "
                                    wire:click="restaurarElemento({{ $row->id }})">
                                </a>


                                <a data-bs-toggle="modal" title="Eliminar"
                                   class=" bi bi-trash3-fill  text-white  m-1  btn btn-danger "
                                   wire:click="eliminarElementoTotalMente({{ $row->id }})">
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
            <div class="float-end">{{ $consulta->links() }}</div>
        </div>
    </div>





</div>
