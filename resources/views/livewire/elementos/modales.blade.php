<!-- Crear Elemento Modal -->
<div wire:ignore.self class="modal fade modal-lg" id="crearNuevoElementoModal" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h5 class="modal-title text-center text-white" id="exampleModalLabel">Añadir Elemento</h5>
                <button type="button" wire:click="cancelar" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body ">


                <form>

                    @csrf


                    <div class="row  m-lg-auto">

                        <div class="form-group mb-1 col-6">
                            <label for="nombre">Nombre Elemento</label>
                            <input wire:model="nombre" type="text"
                                   class="form-control @error('nombre') is-invalid @enderror " id="nombre"
                                   placeholder="Nombre" required>


                            @error('nombre')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-1 col-6">
                            <label for="cantidad">Cantidad Del Elemento</label>
                            <input wire:model="cantidad" type="number " pattern="" min="0"
                                   class="form-control @error('cantidad') is-invalid @enderror " id="cantidad "required
                                   placeholder="Cantidad">
                            @error('cantidad')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>


                    </div>

                    <div class="row m-auto ">

                        <div class="form-group mb-1 col-6">
                            <label for="categoria_id">Categoría</label>


                            <select wire:model="categoria_id" name="categoria_id"
                                    class="form-select @error('categoria_id') is-invalid @enderror" required>

                                <option>Elije Una Categoría</option>
                                @foreach ($categorias as $row)
                                    <option class="" value="{{ $row->id }} ">{{ $row->nombre }}</option>
                                @endforeach

                            </select>
                            @error('categoria_id')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror

                        </div>


                        <div class="form-group col-12 ">
                            <label for="descripcion">Descripción</label>

                            <textarea required class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion"
                                      wire:model="descripcion" rows="3"  placeholder="Descripción"></textarea>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror

                        </div>



                        <div id="mostrarNovedades" class="row d-flex">
                            <div class="alert mt-2 alert-info alert-dismissible fade show col-12" role="alert">

                                <strong>!Registro De Novedades...</strong>

                                Por Favor Si el Elemento registra alguna anomalia o daño, registre la novedad en este
                                campo.
                            </div>

                            <div class="col-6">
                                <label for="exampleFormControlTextarea1" class="form-label col-6">Novedades</label>
                                <textarea class="form-control @error('NovedadesElemento') is-invalid @enderror" id="exampleFormControlTextarea1"
                                          wire:model="NovedadesElemento" cols="1" rows="3"  placeholder="
                                          Ejemplo Ninguna
                                          " ></textarea>
                                @error('NovedadesElemento')
                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="exampleFormControlTextarea1" class="form-label ">Por Favor Clasifica La
                                    novedad.</label>
                                <div class="form-check">
                                    <input class="form-check-input  @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios1" value="Ninguna" checked wire:model="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ninguna
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios2" value="Media" wire:model="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Media
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input  @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios3" value="Alta" wire:model="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Alta
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                    </div>






            </div>




            </form>
            <div class="modal-footer d-flex justify-content-between">
                <button wire:click="cancelar" type="button" class="btn btn-danger text-white col-3"
                        data-bs-dismiss="modal">Cancelar</button>

                <button type="button" wire:click.prevent="crearElemento()"
                        class="btn btn-warning col-3 text-white">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>



















<!-- Actualizar Elemento Modal -->
<div wire:ignore.self class="modal fade modal-lg" id="actualizarNuevoElementoModal" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h5 class="modal-title text-center text-white" id="exampleModalLabel">Editar Elemento</h5>
                <button type="button" wire:click="cancelar" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form>

                    @csrf

                    <div class="row  m-lg-auto">

                        <div class="form-group mb-1 col-6">
                            <label for="nombre">Nombre Elemento</label>
                            <input wire:model="nombre" type="text"
                                   class="form-control @error('nombre') is-invalid @enderror " id="nombre"
                                   placeholder="Nombre" required>


                            @error('nombre')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-1 col-6">
                            <label for="cantidad">Cantidad Del Elemento</label>
                            <input wire:model="cantidad" type="number " pattern="" min="0"
                                   class="form-control @error('cantidad') is-invalid @enderror " id="cantidad "required
                                   placeholder="Cantidad">
                            @error('cantidad')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror
                        </div>


                    </div>

                    <div class="row m-auto ">

                        <div class="form-group mb-1 col-6">
                            <label for="categoria_id">Categoría</label>


                            <select wire:model="categoria_id" name="categoria_id"
                                    class="form-select @error('categoria_id') is-invalid @enderror" required>


                                @foreach ($categorias as $row)
                                    <option class="" value="{{ $row->id }} ">{{ $row->nombre }}</option>
                                @endforeach

                            </select>
                            @error('categoria_id')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror

                        </div>


                        <div class="form-group col-12 ">
                            <label for="descripcion">Descripción</label>

                            <textarea required class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion"
                                      wire:model="descripcion" rows="3"></textarea>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                            @enderror

                        </div>



                        <div id="mostrarNovedades" class="row d-flex">
                            <div class="alert mt-2 alert-info alert-dismissible fade show col-12" role="alert">

                                <strong>!Registro De Novedades...</strong>

                                Por Favor Si el Elemento registra alguna anomalia o daño, registre la novedad en este
                                campo, de lo contrario deje el campo vacio.
                            </div>

                            <div class="col-6">
                                <label for="exampleFormControlTextarea1" class="form-label col-6">Novedades</label>
                                <textarea class="form-control @error('NovedadesElemento') is-invalid @enderror" id="exampleFormControlTextarea1"
                                          wire:model.defer="NovedadesElemento" cols="1" rows="3"></textarea>
                                @error('NovedadesElemento')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="exampleFormControlTextarea1" class="form-label ">Por Favor Clasifica La
                                    novedad.</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios1" value="Ninguna" checked wire:model.defer="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ninguna
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios2" value="Media" wire:model.defer="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Media
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('TipoNovedad') is-invalid @enderror" type="radio" name="exampleRadios"
                                           id="exampleRadios3" value="Alta" wire:model.defer="TipoNovedad">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Alta
                                    </label>
                                    @error('TipoNovedad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                    </div>





            </div>





            </form>
            <div class="modal-footer ">
                <button wire:click="cancelar" type="button" class="btn btn-danger text-white col-3"
                        data-bs-dismiss="modal">Cancelar</button>

                <button type="button" wire:click.prevent="actualizarElemento()"
                        class="btn btn-warning col-3 text-white">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Ver Detalles  Modal -->
<div wire:ignore.self class="modal fade" id="verDetallesElemento" data-bs-backdrop="static" tabindex="-1"
     role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Ver Detalles Del Elemento</h5>
                <button wire:click.prevent="limpiarCamposInput()" type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-12 ">
                            <h5 class="card-header bi bi-bookmark-star-fill bg-primary text-white">Nombre Del
                                Elemento:{{ $nombre }}</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="table-responsive col-12">
                                    <table class="table table-light">
                                        <thead>
                                        <tr>
                                            <th scope="col">Elemento</th>
                                            <th scope="col">Datos</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="">
                                            <th scope="col-6">Descripciòn:</th>
                                            <td>{{ $descripcion }}</td>

                                        </tr>
                                        <tr class="">
                                            <th scope="row">Cantidad:</th>
                                            <td>{{ $cantidad }}</td>

                                        </tr>
                                        <tr class="">
                                            <th scope="row">Novedades:</th>
                                            <td>{{ $NovedadesElemento  }}</td>

                                        </tr>
                                        <tr class="">
                                            <th scope="row">Tipo Novedad:</th>
                                            <td>{{ $TipoNovedad  }}</td>

                                        </tr>
                                        <tr class="">
                                            <th scope="row">Estado:</th>
                                            <td>{{ $Estado  }}</td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="limpiarCamposInput()" class="btn btn-warning text-white close-btn"
                        data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
