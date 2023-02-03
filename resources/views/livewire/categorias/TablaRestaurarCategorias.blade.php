








<div class="card mt-3 ">

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
                        <td>#</td>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
        
        
                        <th>Estado</th>
        
                        <td class="text-center">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($consulta as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
                                    <button class="btn btn-danger btn-sm bi   bi bi-x-square  text-white">
        
        
                                    </button>
        
        
                                </td>
                            @endif
        
        
        
                            <td class="d-flex text-white justify-content-around">
        
        
        
                                <a data-bs-toggle="modal"
                                class="  text-white btn btn-warning btn-sm bi bi-arrow-counterclockwise "
                                wire:click="restaurarCategoria({{ $row->id }})"> </a>
        
                                <a class="btn btn-danger btn-sm bi bi-trash3-fill  text-white "
                                   
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


