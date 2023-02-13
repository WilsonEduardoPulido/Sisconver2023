


<div wire:ignore.self class="modal " id="crearNuevaCategoriaModal"
data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white text-center" id="exampleModalLabel">Añadir Categoría o Género Literario</h5>
                <button type="button" wire:click="cancelar" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form wire:submit.prevent="crearCategoria">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Categoría</label>
                        <input type="text" class=" form-control  @error('nombre') is-invalid @enderror " id="nombre" wire:model="nombre" name="nombre categoria"
                            aria-describedby="emailHelp" placeholder="Nombre Categoria">
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripciòn</label>
                        <textarea class="form-control  @error('descripcion') is-invalid @enderror  " id="descripcion" wire:model="descripcion" name="descripcion" rows="3"></textarea>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label">Tipo de Categoría</label>
                        <select class="form-select form-control  @error('Tipo') is-invalid @enderror " wire:model="Tipo" name="Tipo" id="Tipo" aria-label="">
                            <option selected>Selecione a cual Tipo pertenecera</option>
                            <option value="Libros">Libros</option>
                            <option value="Elementos">Elementos</option>

                        </select>
                        @error('Tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @csrf



            </div>
            <div class="modal-footer mt-2">
                <button wire:click="cancelar" type="button" class="btn btn-danger text-white"
                    data-bs-dismiss="modal">Cancelar</button>

                    <button wire:click="cancelar" type="button" class="btn btn-info text-white">Limpiar
                        Campos</button>
                <button type="submit" class="btn btn-warning text-white " id="liveToastBtn">Agregar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Actualizar Categoria Modal -->
<div wire:ignore.self class="modal fade" id="actualizarCategoriaModal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center ">
                <h5 class="modal-title text-white " id="exampleModalLabel">Editar Categoría o Género Literario</h5>
                <button type="button" wire:click="cancelar" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form wire:submit.prevent="actualizarCategoria">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Categoría</label>
                        <input type="text" class="form-control   @error('nombre') is-invalid @enderror" id="nombre" wire:model="nombre"
                            name="nombre" aria-describedby="emailHelp" placeholder="Nombre Categoria">
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripciòn</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" wire:model="descripcion" name="descripcion" rows="3"></textarea>
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label">Tipo de Categoría</label>
                        <select class="form-select @error('Tipo') is-invalid @enderror " wire:model="Tipo" name="Tipo" id="Tipo" aria-label="">

                            <option value="Libros">Libros</option>
                            <option value="Elementos">Elementos</option>

                        </select>
                        @error('Tipo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>



                    <div class="mb-4">
                        <label for="" class="form-label">Cambiar Estado de la Categoría</label>
                        <select class="form-select @error('Tipo') is-invalid @enderror " wire:model="Estado" name="Tipo" id="Tipo" aria-label="">

                            <option selected value="Activa">Activa</option>
                            <option value="Inactiva">Inactivar</option>

                        </select>
                        @error('Estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    



            </div>
            <div class="modal-footer mt-2">
                <button wire:click="cancelar" type="button" class="btn btn-danger text-white"
                    data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-warning text-white " id="liveToastBtn">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>















<div wire:ignore.self class="modal fade" id="verDetallesCategoria" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="codalLabel">Ver Detalles De La Categoría</h5>
                <button wire:click.prevent="cancelar()" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-12 ">
                            <h5 class="card-header bi bi-bookmark-star-fill bg-primary text-white">Categoría o Género literario:{{ $nombre }}</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">

                                <div class="table-responsive col-12">
                                    <table class="table table-light">
                                        <thead>

                                        </thead>
                                        <tbody>
                                        <tr class="">
                                            <th scope="col-6">Tipo :</td>
                                            <td>{{ $Tipo }}</td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Descripción:</td>
                                                <td>{{ $descripcion }}</td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Estado : </th>
                                            <td>{{ $Estado }}</td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



            <div class="modal-footer">
                <button type="button" wire:click="cancelar()" class="btn btn-warning text-white close-btn"
                    data-bs-dismiss="modal">Cerrar</button>

            </div>

</div>
<!-- Crear Categoria Modal -->
