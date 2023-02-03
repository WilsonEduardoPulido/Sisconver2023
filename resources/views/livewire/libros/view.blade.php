<div class="container-fluid">
    @include('livewire.libros.modals')
    <div class="justify-content-center">

        <div class="row d-flex m-3">

            <div class="col-8 ">


               
                <!---Tabs-->
                <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Gestión De
                            Libros</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">Restaurar
                            Libros Eliminados</button>
                    </li>

                    <button class=" btn btn-warning text-white
                              " id="contact-tab" data-bs-toggle="modal"
                        data-bs-target="#añadirLibroModal" type="button" role="tab"
                        aria-controls="contact-tab-pane" aria-selected="false"> Añadir Nuevo Libro <i
                            class=" text-white small bi-plus-circle-fill"></i></button>


                </ul>


                <div class="tab-content" id="myTabContent">

                    <!---Tabla Gestion de libros---->
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">

                        @include('livewire.libros.TablaPrincipalLibros')

                    </div>

                    <!---Tabla de libros Eliminados Fin---->
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="1">
                        @include('livewire.libros.TablaDeLibrosEliminados')
                    </div>












                    <!-- Modal -->
                    <div wire:ignore.self class="modal " id="verlibro" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header">
                                            Detalles Del Libro
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Del Libro:{{ $Nombre }}</h5>
                                            <h5>Autor:{{ $Autor }}</h5>
                                            <h5>EditorialS:{{ $Editorial }}</h5>
                                            <h5>Edicion:{{ $Edicion }}</h5>
                                            <h5>Descripción:{{ $Descripcion }}</h5>
                                            <h5>Estado:{{ $Estado }}</h5>

                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal" title="cerrar">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

            <div class="col-4 card p-2 h-50">
                @include('livewire.libros.formulario')
            </div>
        </div>

    </div>

</div>
