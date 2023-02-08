<!-- Editar Prestamo Modal -->
<div wire:ignore.self class="modal fade" id="editarPrestamoModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white text-center" id="exampleModalLabel">Editar Prestamo</h5>
                <button type="button" wire:click="cancelar" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form wire:submit.prevent="actualizarPrestamo">

                    <form>

                        <div class="form-group">
                            <label for="Fecha_prestamo">Fecha Prestamo</label>
                            <input title="No Pudes Editar Este Campo" wire:model="Fecha_prestamo" disabled
                                type="text" class="form-control" id="Fecha_prestamo" placeholder="Fecha Prestamo">
                            @error('Fecha_prestamo')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="elementos_id">Elemento o Libro Prestado</label>
                            <input title="No Pudes Editar Este Campo" wire:model="ArticuloPrestado" disabled
                                type="text" class="form-control" id="elementos_id"
                                placeholder="Elemento o Libro Prestado">
                            @error('elementos_id')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Usuario">Usuario</label>



                            <input type="text" title="No Pudes Editar Este Campo" wire:model="usuarioDeudor" disabled
                                class="form-control" id="usuariodeudor">
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="elementos_id">Cantidad Prestada</label>
                            <input title="No Pudes Editar Este Campo" @disabled(true) disabled
                                wire:model="CantidadPrestada" type="text" class="form-control" id="elementos_id"
                                placeholder="Elementos Id">
                            @error('elementos_id')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <label for="EstadoPrestamo" class="form-label">Estado Del Prestamo</label>
                            <select class="form-select " id="esatdoprestamo" wire:model="Estado_Prestamo">

                                <option value="Activo">Activar</option>
                                <option value="Inactivo">Inactivar</option>

                            </select>

                        </div>


                        @csrf

            </div>
            <div class="modal-footer mt-2">
                <button wire:click="cancelar" type="button" class="btn btn-danger text-white"
                    data-bs-dismiss="modal">Cancelar</button>


                <button type="button" class="btn btn-warning text-white " wire:click="cambiarEstadoPrestamo()"
                    id="liveToastBtn">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>
















<!-- ver Modal -->
<div wire:ignore.self class="modal fade modal-lg" id="VerDetallesPrestamo" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card mt-0">
                    <h5 class="card-header bg-primary text-white text-center"> Ver Detalle Prestamo
                        :{{ $detalleElemento }} </h5>
                    <div class="card-body">
                        <table class="table table-bordered">
                           
                           


                            <thead>
                                <tr>

                                    <th colspan="3"> Fecha Prestamo:{{ $fechaDetalle }} </th>



                                </tr>

                                <tr class="text-end">

                                    <th colspan="3"> Codigo Prestamo:{{ $CodigoPrestamoD }} </th>



                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="2">Bibliotecario: </td>
                                    <td>{{ $bibliotecario }}</td>

                                </tr>
                                <tr>
                                    <td colspan="2">Cantidad Prestada: </td>
                                    <td>{{ $cantidadPrestadaDetalle }}</td>

                                </tr>
                                <tr>
                                    <td colspan="2">Usuario Deudor: </td>
                                    <td> {{ $nombreDeudor }} {{ $apellidoDeudor }}</td>

                                </tr>
                                <tr>
                                    <td colspan="2">Grado: </td>
                                    <td>{{ $gradoDeudor }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Identificaciòn : </td>
                                    <td> {{ $tipoDocDeudor }}: {{ $numeroiDeudor }} </td>
                                </tr>


                                <tr>
                                    <td colspan="2">Celular: </td>
                                    <td> {{ $celularDeudor }} </td>
                                </tr>


                                <tr>
                                    <td colspan="2">Direcciòn: </td>
                                    <td> {{ $direccionDeudor }} </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Estado Prestamo: </td>
                                    <td> {{ $estadoDetalle }} </td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>




                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th>Estado</th>
                                    <th scope="col">Novedades</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($detaPrestamo as $key => $value)
                                    <tbody>
                                    <tr class="text-center " wir:key=" {{ $key }} ">
                                        <td scope="row" wire:key=" {{ $key + 1 }} "> {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $value['Tipo_Elemento'] }} </td>

                                        @if ($value['Tipo_Elemento'] == 'Libro')
                                            <td> {{ $value['Nombre'] }}{{ $value['NombreTomo'] }} </td>
                                        @elseif ($value['Tipo_Elemento'] == 'Elemento')
                                            <td> {{ $value['nombre'] }} </td>
                                        @endif


                                        <td> {{ $value['CantidaPrestadaU'] }} </td>
                                        <td> {{ $value['Estado_Prestamo'] }} </td>
                                        <td> {{ $value['NovedadesPrestamoU'] }} </td>

                                        </td>
                                    </tr>

                                    </tbody>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cerrar()" class="btn btn-danger text-white"
                    data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>











<div wire:ignore.self class="modal fade modal-xl" id="yuca" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h5 class="modal-title text-white text-center" id="staticBackdropLabel">Finalizar Prestamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="cerrar"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row d-flex  m-3">




                    <div class="col-5">




                        <form class="" id="">
                            <div class="">
                                <label class="form-label">Bibliotecario</label>
                                <input disabled type="text" class="form-control " id="validationServer01" required
                                    wire:model="bibliotecario">

                            </div>


                            <div class="">


                                <label for="usuarioDeudorid" class="form-label">Alumno O Persona</label>
                                <div class="mb-3">
                                    <select class="form-select " wire:model="usuarioDeudorid" name="usuarioDeudorid"
                                        id="usuarioDeudorid">

                                        <option>
                                           elige el usuario

                                        </option>

                                        @foreach ($consultaUsuariosPrestamos as $a)
                                            <option value="{{ $a->id }}"> {{ $a->name }}
                                                {{ $a->lastname }} </option>
                                        @endforeach


                                    </select>
                                </div>



                            </div>



                            <div class="">
                                <label for="validationServer01" class="form-label">Elemento o Libro</label>
                                <input type="text" disabled class="form-control " id="validationServer01" required
                                    wire:model="articuloDevolver">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="row m-auto justify-content-around d-flex">
                                <div class="col-4">
                                    <label for="validationServer01" class="form-label">Cantidad Prestada</label>
                                    <input disabled type="number" class="form-control " id="validationServer01"
                                        value="Mark" required wire:model="CantidadPrestadaDevolver">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>


                                <div class="col-4">
                                    <label for="validationServer01" class="form-label">Cantidad Devuelta</label>
                                    <input type="number" class="form-control " id="validationServer01"
                                        value="Mark" required wire:model="CantidadDevuelta">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                            </div>


                            <div class="alert mt-2 alert-info alert-dismissible fade show col-12" role="alert">

                                <strong>!Registro De Novedades...</strong>

                                Por Favor Si el Elemento registra alguna anomalia o daño, registre la novedad en este
                                campo, <strong>!Tenga en cuenta </strong> que la novedad sera aplicada a todos los libros o elementos a nivel general.
                            </div>

                            <div class="">
                                <div class="mb-3">
                                    <label for="" class="form-label">Novedades </label>
                                    <textarea style="resize: none" class="form-control" name="" id="" wire:model="NovedadesDevolucion"
                                        rows="3"></textarea>
                                </div>

                            </div>
                            <label for="" class="form-label">Clasifiqué la novedad </label>


                            <div class="row d-flex  m-auto justify-content-around">



                                <div class="form-check col-3">
                                    <input class="form-check-input" type="radio" name="Tipo_novedad"
                                        id="exampleRadios1" value="Alta" wire:model="Tipo_novedad">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Alta
                                    </label>
                                </div>
                                <div class="form-check col-3 ">
                                    <input class="form-check-input" type="radio" name="Tipo_novedad"
                                        id="exampleRadios2" value="Media" wire:model="Tipo_novedad">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Media
                                    </label>
                                </div>
                                <div class="form-check col-3" wirw:ignore>
                                    <input class="form-check-input" type="radio" name="Tipo_novedad"
                                        id="exampleRadios3" value="Ninguna" checked wire:model="Tipo_novedad">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Baja
                                    </label>
                                </div>

                            </div>

                            <a class="btn btn-warning text-white mt-2" wire:click="agregarElementosPrestamo"> Devolver
                                Elemento</a>

                    </div>

                    <div class="col-7">
                        <caption>Elementos o Libros Prestados</caption>

                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>




                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                        <th>Estado</th>
                                        <th scope="col">Novedades</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datos as $key => $value)
                                <tbody>
                                    <tr class="text-center " wir:key=" {{ $key }} ">
                                        <td scope="row" wire:key=" {{ $key + 1 }} "> {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $value['Tipo_Elemento'] }} </td>

                                        @if ($value['Tipo_Elemento'] == 'Libro')
                                            <td> {{ $value['Nombre'] }}{{ $value['NombreTomo'] }} </td>
                                        @elseif ($value['Tipo_Elemento'] == 'Elemento')
                                            <td> {{ $value['nombre'] }} </td>
                                        @endif


                                        <td> {{ $value['CantidaPrestadaU'] }} </td>
                                        <td> {{ $value['Est'] }} </td>
                                        <td> {{ $value['NovedadesPrestamoU'] }} </td>
                                        <td> <button
                                                wire:click.prevent="cargarDatosDevolucionPrestamo(  {{ $key }} )"
                                                class="btn btn-danger  text-white bi bi-dash-circle"></button>

                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p>Total Elementos Prestados : {{ $resultado    }} </p>

                        <caption>Elementos o Libros Devueltos</caption>








                        <div class="table-responsive">
                            <table class="table ">
                                <thead>




                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Novedades</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($elementosentregados as $key => $value)
                                <tbody>
                                    <tr class="text-center " wir:key=" {{ $key }} ">
                                        <td scope="row" wire:key=" {{ $key + 1 }} "> {{ $loop->iteration }}
                                        </td>


                                        <td> {{ $value['Articulo'] }} </td>
                                        <td> {{ $value['Cantidad'] }} </td>
                                        <td> {{ $value['Novedades'] }} </td>

                                    </tr>

                                </tbody>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>








                </form>



            </div>
            <div class="modal-footer">
                <button type="button" wire:click="cerrar" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="button" wire:click="enviarDatosDevolucionPrestamo"
                    class="btn btn-warning text-white">Finalizar Prestamo</button>
            </div>
        </div>
    </div>
</div>
