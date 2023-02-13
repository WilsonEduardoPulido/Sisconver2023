<div>
    {{-- Success is as dangerous as failure. --}}

<div class="container ">


    <div class="card h-100  mt-3 ">

        <div class="card-header d-flex justify-content-between bg-white">
            <h4 class="text-center ">Restaurar Devoluciones</h4>

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
                            <th>#</th>
                            <th>Bibliotecario</th>
                            <th>Fecha Devolución</th>
                            <th>Usuario </th>
                            <th>Codigo de Entregada</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($devolucionesInactivas as $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->Bibliotecario_Re }}</td>
                                <td>{{ $row->deleted_at }}</td>
                                <td>{{ $row->user->name }} {{ $row->user->lastname }}</td>
                                <td>{{ $row->CodigoDevolucion}}</td>
                                <td>{{ $row->Tipo_Elemento}}</td>
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




@include('partials.footer')
