<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="card  mt-3 ">

        <div class="card-header d-flex justify-content-between bg-white">
            <h4 class="text-center ">Gestiòn De Devoluciones</h4>

        </div>

        <div class="d-flex  justify-content-between">

            <div class="col-6">
                <input wire:model='keyWord' type="text" class="form-control  m-3" name="buscarPrestamo"
                    id="buscarPrestamo"  placeholder="Buscar Devolucion...">
            </div>



        </div>


        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead">
                        <tr>
                            <td>#</td>
                            <th>Bibliotecario</th>
                            <th>Fecha Devolución</th>

                            <th>Articulo Entregado</th>

                            <th>Usuario </th>
                            <th>Cantidad Entregada</th>
                            <th>Novedades</th>
                            <th>Estado</th>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($devolucionesInactivas as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->Bibliotecario_Re }}</td>
                                <td>{{ $row->created_at }}</td>

                                @if ($row->Tipo_Elemento == 'Libro')
                                    <td>  {{  $row->Nombre }}</td>
                                @else

                                    <td>{{ $row->nombre }}</td>
                                @endif
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->Cantidad_Devuelta }}</td>

                                <td>{{ $row->Novedades}}</td>
                                @if ($row->Estado_Devolucion =='Inactiva')

  <td>

    <button class="btn btn-danger m-1 bi bi-x-square text-white" title="Inactiva"></button>
  </td>

@endif
                                <td >




                                <a title="Restaurar" data-bs-toggle="modal"
                                    class="  m-1 bi bi-arrow-counterclockwise text-white btn btn-warning "
                                    wire:click="restaurarDevoluciones({{ $row->id }})"></a>
                                    <a title="Eliminar Del Sistema" class="btn m-1 btn-danger bi bi-trash3-fill text-white "

                                    wire:click="eliminarTotalMenteDevolucion({{ $row->id }})"></a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">No hay registros para mostrar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="float-end">{{ $devolucionesInactivas->links() }}</div>
            </div>
        </div>
    </div>

</div>
