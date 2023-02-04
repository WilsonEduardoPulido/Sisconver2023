<div class="card  mt-3 ">

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Gestiòn De Prestamos</h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='buscadorPrestamos' type="text" class="form-control  m-3" name="buscarPrestamo"
                id="buscarPrestamo" placeholder="Buscar Prestamo...">
        </div>



    </div>


    <div class="card-body  ">
        <caption>Gestion De Prestamos</caption>
        <div class="table-responsive  table-bordered border-primary">
            <table  class="table ">
                <thead class="thead">
                    <tr>
                        <td>#</td>

                        <th>Bibliotecario</th>
                        <th>Fecha Prestamo</th>

                        <th>Codigo</th>
                        <th>Usuario</th>
                        <th>Estado Prestamo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($consultaPrestamos as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</td>
                            <td>{{ $row->NombreBibliotecario }} </td>
                            <td>
                                {{ $row->created_at }} </td>
                            <td> {{ $row->Codigo_Prestamo  }} </td>

                            <td>{{ $row->name }} {{ $row->lastname }} </td>


                            <td>
                                @if ($row->Estado_Prestamo == 'Activo')
                                    <button title="Activo"
                                        class="btn btn-warning m-1 bi bi bi-check2-square  text-white ">

                                    </button>
                                @else
                                    <button class="btn btn-dark m-1 bi bi-x-octagon-fill btn-sm text-white">

                                    </button>
                                @endif
                            </td>


                            <td> 




                                <a title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#VerDetallesPrestamo"
                                    class=" bi bi bi-eye-fill text-white btn btn-warning m-1 "
                                    wire:click="verDetallesPrestamo({{ $row->id }})"> </a>

                                <a title="Inactivar" class="btn btn-danger bi bi-trash3-fill  text-white m-1 "
                                   wire:click="eliminar({{ $row->id }})"></a>

                                <a title="Finalizar Prestamo" data-bs-toggle="modal"
                                    data-bs-target="#yuca"
                                    class=" bi bi-clock-fill m-1  text-white btn btn-primary "
                                    wire:click="productosPrestados({{ $row->id }})"> </a>
                            </td>










              















        @empty
            <tr>
                <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
            </tr>
            @endforelse

            </tbody>


            </table>

        </div>
    </div>





</div>


