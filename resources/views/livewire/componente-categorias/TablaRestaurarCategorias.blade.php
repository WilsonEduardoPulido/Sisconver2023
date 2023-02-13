




<div class="container mt-3">




<div class="card mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Restaurar categorias</h4>

    </div>


    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>


                        <th>Estado</th>

                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consulta as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->Tipo }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Activa')
                                <td class=" text-white">
                                    <button class="btn btn-warning  bi bi-check2-square text-white">


                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button class="btn btn-danger bi   bi bi-x-square  text-white">


                                    </button>


                                </td>
                            @endif



                            <td class="d-flex text-white justify-content-around">



                                <a data-bs-toggle="modal"
                                class="  text-white btn btn-warning  bi bi-arrow-counterclockwise "
                                wire:click="restaurarCategoria({{ $row->id }})"> </a>

                                <a class="btn btn-danger bi bi-trash3-fill  text-white "

                                    wire:click="eliminarTotalmenteC({{ $row->id }})"></a>


                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $consulta->links() }}</div>
        </div>
    </div>





</div>

</div>
