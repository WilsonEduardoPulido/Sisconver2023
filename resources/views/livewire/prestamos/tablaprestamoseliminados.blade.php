<div>


  <div class="container">



    <div class="card  mt-3 ">

        <div class="card-header d-flex justify-content-between bg-white">
            <h4 class="text-center ">Restaurar Prestamos</h4>

        </div>

        <div class="d-flex  justify-content-between">

            <div class="col-6">
                <input wire:model='buscadorPrestamos' type="text" class="form-control  m-3" name="buscarPrestamo"
                       id="buscarPrestamo" placeholder="Buscar Prestamo...">
            </div>



        </div>
        <div class="card-body  ">

            <div class="table-responsive">
                <table class="table libros table-bordered table-sm">
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
                    @forelse($prestamosEliminados as $row)
                        <tr>
                            <th>{{ $loop->iteration }}</td>

                            <td>{{ $row->NombreBibliotecario }} </td>

                            <td>
                                {{ $row->deleted_at }} </td>
                            <td>     {{ $row->Tipo_Elemento }}  </td>
                            <th> {{ $row->Codigo_Prestamo  }} </th>

                            <td>{{ $row->user->name }} {{ $row->user->lastname }} </td>


                            @if ($row->Estado_Prestamo == 'Inactivo'or $row->Estado_Prestamo == 'Finalizado')
                                <td class=" text-white ">
                                    <button  title="Inactivo" class="btn btn-danger m-1 bi bi-x-square text-white">

                                    </button>


                                </td>
                            @endif



                            <td




                                    colspan="3" class="d-flex justify-content-around">


                                <button title="Restaurar" data-bs-toggle="modal"  data-bs-target="#"
                                        class="text-white btn bi bi-arrow-counterclockwise  m-1 btn-warning   "
                                        wire:click="restaurarPrestamo({{ $row->id }})"> </button>


                                <a title="Eliminar Totalmente" class="  bi bi-trash3-fill  text-white  m-1  btn btn-danger "
                                   onclick="confirm('Confirm Delete Libro id {{ $row->id }}? \nDeleted Libros cannot be recovered!')||event.stopImmediatePropagation()"
                                   wire:click="eliminarTotalMente({{ $row->id }})"></a>




                            </td>

                        </tr>
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
</div>

</div>


<div class="mt-5">
@include('partials.footer')
</div>
