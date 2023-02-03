<div>
    <!-- Añadir Libro Modal -->
    <div wire:ignore.self class="modal show modal-dialog-scrollable  modal-xl  " style="height: 100vh;"
        id="añadirLibroModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center ">
                    <h5 class="modal-title text-white" id="createDataModalLabel">Añadir Nuevo Libro</h5>
                    <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body row ">




                    <form class="d-flex  row m-auto ">
                        <form>

                            <div id="Novedades">


                                <div class="row  m-auto">
                                    <div class="form-group col-4  mb-1">
                                        <label for="Nombre">Tìtulo Del Libro</label>
                                        <input wire:model="Nombre" type="text"
                                            class="form-control @error('Nombre') is-invalid @enderror" id="Nombre"
                                            placeholder="Nombre">
                                        @error('Nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-4  mb-1">
                                        <label for="Autor">Autor Del Libro</label>
                                        <input wire:model="Autor" type="text"
                                            class=" form-control @error('Autor') is-invalid @enderror" id="Autor"
                                            placeholder="Autor">
                                        @error('Autor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4 mb-1">
                                        <label for="Edicion">Edicion</label>
                                        <input wire:model="Edicion" type="text"
                                            class="form-control @error('Edicion') is-invalid @enderror" id="Edicion"
                                            placeholder="Edicion">
                                        @error('Edicion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                </div>

                                <div class="row  m-auto">
                                    <div class="form-group col-4 mb-1">
                                        <label for="Editorial">Editorial</label>
                                        <input wire:model="Editorial" type="text"
                                            class=" form-control @error('Editorial') is-invalid @enderror"
                                            id="Editorial" placeholder="Editorial">
                                        @error('Editorial')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group col-4  mb-1">
                                        <label for="categoria_id">Seleccione el Gènero Literario </label>
                                        <select wire:model="categoria_id" name="categoria_id"
                                            class="form-select @error('categoria_id') is-invalid @enderror" required>
                                            <option>Elige un Gènero Literario</option>
                                            @foreach ($categorias as $row)
                                                <option selected value="{{ $row->id }}">{{ $row->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('categoria_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1 col-4 form-group ">
                                        <label for="Cantidad" class="form-label">Cantidad De Unidades</label>
                                        <input type="number" name="Cantidad"
                                            class="form-control @error('Cantidad') is-invalid @enderror" id="Cantidad"
                                            wire:model="Cantidad" />
                                    </div>
                                    @error('Cantidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror









                                    <div class="mb-1 col-4" id="novedades">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripciòn</label>
                                        <textarea class="form-control @error('Descripcion') is-invalid @enderror" id="exampleFormControlTextarea1"
                                            wire:model="Descripcion" style="resize: none;" cols="1" rows="3"></textarea>
                                    </div>
                                    @error('Descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="mb-1 col-4">
                                        <label for="Cantidad" class="form-label">Nombre Y Numero de
                                            Tomo</label>
                                        <input type="text" name="Cantidad"
                                            class="form-control @error('Cantidad') is-invalid @enderror" id="Cantidad"
                                            wire:model.defer="NombreTomo" />
                                    </div>
                                </div>

                                <div class="row m-auto" id="Novedades">


                                    <label for="exampleFormControlTextarea1" class="form-label">Novedades</label>
                                    <textarea class="form-control @error('Novedades') is-invalid @enderror" id="exampleFormControlTextarea1"
                                        wire:model.defer="Novedades" cols="1" rows="3"></textarea>

                                    <div class="row d-flex m-auto">


                                        <label for="">Clasifica La Novedad Segun El Daño </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="Ninguna" checked wire:model="TipoNovedad">
                                            <label class="form-check-label" for="exampleRadios1">
                                                Ninguna
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios2" value="Media" wire:model.defer="TipoNovedad">
                                            <label class="form-check-label" for="exampleRadios2">
                                                Media
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios3" value="Alta" wire:model.defer="TipoNovedad">
                                            <label class="form-check-label" for="exampleRadios3">
                                                Alta
                                            </label>
                                        </div>
                                        @error('Descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>




                            <button wire:click.prevent="anadirTomo"
                                class="btn col-2 mt-2 btn-warning text-white">Agregar Libro</button>






                        </form>

                        <div class="mt-2">

                            <div class="table-responsive mt-1">
                                <caption>Libros Agregados</caption>
                                <table class="table ">
                                    <thead class="table-light">

                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>

                                            <th>Volumen O Cantidad</th>
                                            <th>Novedades</th>
                                            <th>Retirar</th>

                                        </tr>
                                    </thead>

                                    @foreach ($arraycrearLibro as $key => $libroa)
                                        <tbody class="">


                                            <tr class="text-center " wir:key=" {{ $key }} ">
                                                <td scope="row" wire:key=" {{ $key + 1 }} "></td>

                                                <td> {{ $libroa['Nombre'] }} {{ $libroa['NombreTomo'] }} </td>

                                                <td> {{ $libroa['CantidadLibros'] }} </td>
                                                <td> {{ $libroa['Novedades'] }} </td>
                                                <td> <button wire:click.prevent="eliminarTomo(  {{ $key }} )"
                                                        class="btn btn-danger  text-white bi bi-dash-circle"></button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    @endforeach

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>




                    </form>


                </div>

                </form>








                <div class="modal-footer  d-flex justify-content-center">
                    <button type="button" class="btn btn-danger close-btn text-white col-4"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="store()"
                        class="btn btn-warning text-white col-4">Guardar</button>
                </div>


            </div>





        </div>








    </div>







</div>







<!-- Actualizar Datos Modal -->

<div wire:ignore.self class="modal fade modal-lg" id="actualizarLibroModal" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center ">
                <h5 class="modal-title text-white" id="createDataModalLabel">Actualizar Datos Libro</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body row ">
                <form class="d-flex  row  ">
                    <div class="form-group col-6 mb-1">
                        <label for="Nombre">Nombre Del Libro</label>
                        <input wire:model="Nombre" type="text"
                            class="form-control @error('Nombre') is-invalid @enderror" id="Nombre"
                            placeholder="Nombre">
                        @error('Nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-6 mb-1">
                        <label for="Autor">Autor Del Libro</label>
                        <input wire:model="Autor" type="text"
                            class=" form-control @error('Autor') is-invalid @enderror" id="Autor"
                            placeholder="Autor">
                        @error('Autor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-1">
                        <label for="Editorial">Editorial</label>
                        <input wire:model="Editorial" type="text"
                            class=" form-control @error('Editorial') is-invalid @enderror" id="Editorial"
                            placeholder="Editorial">
                        @error('Editorial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-1">
                        <label for="Edicion">Edicion</label>
                        <input wire:model="Edicion" type="text"
                            class="form-control @error('Edicion') is-invalid @enderror" id="Edicion"
                            placeholder="Edicion">
                        @error('Edicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                 
                    <div class="form-group col-6 mb-1">
                        <label for="categoria_id">Seleccione el Genero Literario </label>
                        <select wire:model="categoria_id" name="categoria_id"
                            class="form-select @error('categoria_id') is-invalid @enderror" required>

                            @foreach ($categorias as $row)
                                <option selected value="{{ $row->id }}">{{ $row->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-1 form-group col-6 ">
                        <label for="CantidadLibros" class="form-label">Cantidad</label>
                        <input type="number" name="CantidadLibros"
                            class="form-control @error('CantidadLibros') is-invalid @enderror" id="CantidadLibros"
                            wire:model="CantidadLibros">
                    </div>
                    @error('CantidadLibros')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-1 col-4">
                        <label for="NombreTomo" class="form-label">Nombre Y Numero de
                            Tomo</label>
                        <input type="text" name="NombreTomo"
                            class="form-control @error('Cantidad') is-invalid @enderror" id="NombreTomo"
                            wire:model="NombreTomo" />
                    </div>
                    <div class="mb-1 ">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                        <textarea class="form-control @error('Descripcion') is-invalid @enderror" id="exampleFormControlTextarea1"
                            wire:model="Descripcion" cols="1" rows="3"></textarea>
                    </div>
                    @error('Descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Novedades</label>
                        <textarea class="form-control @error('Novedades') is-invalid @enderror" id="exampleFormControlTextarea1"
                            wire:model.defer="Novedades" cols="1" rows="3"></textarea>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="Ninguna" checked wire:model.defer="TipoNovedad">
                            <label class="form-check-label" for="exampleRadios1">
                                Ninguna
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="Media" wire:model.defer="TipoNovedad">
                            <label class="form-check-label" for="exampleRadios2">
                                Media
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                value="Alta" wire:model.defer="TipoNovedad">
                            <label class="form-check-label" for="exampleRadios3">
                                Alta
                            </label>
                        </div>
                        @error('Descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer  d-flex justify-content-center">
                <button type="button" class="btn btn-danger close-btn text-white col-4"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="actualizarLibro"
                    class="btn btn-warning text-white col-4">Actualizar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div wire:ignore.self class="modal " id="verlibro" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detalles Del Libro
                    </div>
                    <div class="card-body">
                        <h5 class="card-title ">Nombre Del Libro:{{ $categoriaNombre }}</h5>
                        <table class="table">


                            <tbody>

                                <tr>
                                    <h5 scope="col">Autor:{{ $categoriaAutor }}</h5>
                                </tr>

                                <tr>
                                    <h5 scope="col">Editorial:{{ $categoriaEditorial }}</h5>

                                </tr>

                                <tr>
                                    <h5 scope="col">Edicion:{{ $categoriaEdicion }}</h5>


                                </tr>

                                <tr>
                                    <h5 scope="row">Cantidad:{{ $categoriaCantidad }}</h5>


                                </tr>

                                <tr>
                                    <h5 scope="row">Estado:{{ $categoriaEstado }}</h5>

                                </tr>

                                <tr>
                                    <h5 scope="row">Descripción:{{ $categoriaDescripcion }}</h5>

                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>






            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" title="cerrar"
                    data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>












<script>
    window.addEventListener('cerrar', event => {
        $('#exampleModalToggle').modal('hide')
        $('#exampleModalToggle2').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




    });
</script>
