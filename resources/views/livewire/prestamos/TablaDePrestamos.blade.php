<div class="container m-auto">


    <div class="card h-100  mt-3 ">

        <div class="card-header d-flex justify-content-between bg-white">

            <caption>Gestiòn De Prestamos</caption>
        </div>

        <div class="d-flex  justify-content-between">

            <div class="col-6">
                <input wire:model='buscadorPrestamos' type="text" class="form-control  m-3" name="buscarPrestamo"
                    id="buscarPrestamo" placeholder="Buscar Prestamo...">
            </div>



        </div>


        <div class="card-body  ">

            <div class="table-responsive  table-bordered border-primary">
                <table class="table ">
                    <thead class="thead">
                        <tr>
                            <td>#</td>

                            <th>Bibliotecario</th>
                            <th>Fecha Prèstamo</th>
                            <th>Tipo </th>
                            <th>Còdigo</th>
                            <th>Usuario</th>
                            <th>Estado </th>
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
                                <td> {{ $row->Tipo_Elemento }} </td>
                                <th> {{ $row->Codigo_Prestamo }} </th>

                                <td>{{ $row->name }} {{ $row->lastname }} </td>



                                @if ($row->Estado_Prestamo == 'Activo')
                                    <td>
                                        <button title="Activo"
                                            class="btn btn-warning m-1 bi bi bi-check2-square  text-white ">

                                        </button>
                                    </td>
                                @else
                                    <td class="table-info">
                                        <button title="Finalizado"
                                            class="btn btn-dark m-1 bi bi-x-octagon-fill  text-white">

                                        </button>
                                    </td>
                                @endif



                                <td>




                                    <a title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#VerDetallesPrestamo"
                                        class=" bi bi bi-eye-fill text-white btn btn-warning m-1 "
                                        wire:click="verDetallesPrestamo({{ $row->id }})"> </a>

                                    <a title="Inactivar" class="btn btn-danger bi bi-trash3-fill  text-white m-1 "
                                        wire:click="eliminar({{ $row->id }})"></a>

                                    <a title="Finalizar Prestamo" data-bs-toggle="modal" data-bs-target="#yuca"
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
                <div class="float-end">{{ $consultaPrestamos->links() }}</div>
            </div>
        </div>





    </div>


</div>
<div class="mt-5">
    @include('partials.footer')
</div>
