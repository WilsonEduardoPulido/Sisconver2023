






<div class="container mt-3">



<div class="card  h-100 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Tabla Gestion Generos Literarios Y categorias</h4>

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
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>


                        <th>Estado</th>

                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $row->nombre }}</td>

                            <td>{{ $row->Tipo }}</td>
                            <td colspan="">{{ $row->descripcion }}</td>
                            @if ($row->Estado == 'Activa')
                                <td class=" text-white ">
                                    <button class="btn btn-warning bi bi bi-check2-square text-white m-auto ">



                                    </button>


                                </td>
                            @else
                                <td class=" text-white">
                                    <button class="btn btn-danger  bi bi-x-square btn-sm text-white">


                                    </button>


                                </td>
                            @endif



                            <td class="d-flex text-white justify-content-around align-items-center">


                                <a data-bs-toggle="modal" data-bs-target="#actualizarCategoriaModal"
                                    class=" bi  bi-pencil-square text-white btn btn-info  m-1"
                                    wire:click="editarCategoria({{ $row->id }})"></a>

                                <a class="btn btn-danger  bi bi-trash3-fill  text-white m-1 "

                                    wire:click="eliminar ({{ $row->id }})"></a>


                                <a data-bs-toggle="modal" data-bs-target="#verDetallesCategoria"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning  m-1 d-flex "
                                    wire:click="verDetallesCategoria({{ $row->id }})"></a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay Registros Para Mostrar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $categorias->links() }}</div>
        </div>

    </div>





</div>


</div>

<div class="mt-5" >


    @include('partials.footer')
</div>
