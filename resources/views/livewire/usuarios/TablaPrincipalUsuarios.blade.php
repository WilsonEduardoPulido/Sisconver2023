<div class="card  h-100 mt-3 "  style="height: 100%" >

    <div class="card-header d-flex justify-content-between bg-white">
        <h4 class="text-center ">Gestión De Usuarios</h4>

    </div>

    <div class="d-flex  justify-content-between">

        <div class="col-6">
            <input wire:model='buscar' type="text" class="form-control  m-3" name="buscarCategoria"
                id="buscarCategoria" placeholder="Buscar Usuarios...">
        </div>



    </div>
    <div class="card-body  ">

        <div class="table-responsive">
            <table class="table libros table-bordered table-sm">
                <thead class="thead">
                    <tr>
                        <td>#</td>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Celular</th>
                        <td>Grado</td>
                        <th>Estado</th>

                        <td>Acciones</td>

                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>

                            <td>{{ $row->lastname }}</td>

<td colspan="">{{ $row->direccion }}</td>
                            <td>{{ $row->celular }}</td>
                            <td>{{ $row->Grado }}</td>

                            @if ($row->Estado == 'Activo')
                                <td class=" text-white">
                                    <button title="Activo" class="btn btn-warning m-1 bi bi bi-check2-square  text-white">

                                    </button>


                                </td>
                            @else
                                <td class=" text-white ">
                                    <button class="btn btn-danger text-white">
                                        {{ $row->Estado }}
                                    </button>


                                </td>
                            @endif



                            <td class="d-flex justify-content-around">


                                <a  title="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"
                                    class=" bi bi-pencil-square m-1  text-white btn btn-info "
                                    wire:click="editarUsuario({{ $row->id }})"> </a>
                                <a title="Inactivar" class="btn btn-danger bi bi-trash3-fill  m-1  text-white "
                                    onclick="confirm('Desea inactivar usuario? \nSi No!')||event.stopImmediatePropagation()"
                                    wire:click="eliminarTemporalUsuario({{ $row->id }})"> </a>
                                <a   title="Ver Detalles" data-bs-toggle="modal" data-bs-target="#verDetallesUsuario"
                                    class=" bi bi bi-eye-fill m-1  text-white btn btn-warning "
                                    wire:click="editarUsuario({{ $row->id }})"> </a>


                                @if ($row->Estado=='Sancionado')
                                    <a   title="Retirar Sancion" data-bs-toggle="modal" data-bs-target="#cargarDatosSancion"
                                         class="bi bi-lock-fill btn-sm text-white btn btn-warning  "
                                         wire:click="retirarSancion({{ $row->id }})"> </a>

                                @else

                                    <a   title="Sancionar" data-bs-toggle="modal" data-bs-target="#cargarDatosSancion"
                                         class="bi bi-lock-fill btn-sm text-white btn btn-primary  "
                                         wire:click="sancionarUsuario({{ $row->id }})"> </a>
                                @endif


                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center bg-emerald-300" colspan="100%">No hay registros para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="float-end">{{ $usuarios->links() }}</div>
        </div>
    </div>





</div>
