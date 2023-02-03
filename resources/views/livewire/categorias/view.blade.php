<div>


    <div class="container-fluid">

        <div class="justify-content-center h-100" >




            <div class="col-md-11 m-3">



                <!--------LINICIO LINKS TABS -------->
                <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">


                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Gestión De Categorías</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Restaurar Categorías</button>
                    </li>



                    <button class=" btn-warning text-white  btn  " data-bs-toggle="modal"
                        data-bs-target="#crearNuevaCategoriaModal">
                        Añadir Categoría<i class=" text-white small bi-plus-circle-fill"></i>
                    </button>



                </ul>


                <!--------FIN LINKS TABS -------->




                <!------------CONTENEDORES  DE LAS TABS  ------------->



                <div class="tab-content" id="pills-tabContent">
                    <!----------- INICIO CONTENEDOR 1  ------------->

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        @include('livewire.categorias.TablaPrincipal')
                    </div>
                    <!----------- FIN CONTENEDOR 1  ------------->

                    <!----------- INICIO CONTENEDOR 2  ------------->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        @include('livewire.categorias.TablaRestaurarCategorias')
                    </div>
                    <!----------- FIN CONTENEDOR 2  ------------->


                    <!----------- INICIO CONTENEDOR 3  ------------->


                    <!----------- FIN  CONTENEDOR 3  ------------->
















                </div>


                @include('livewire.categorias.modales')

            </div>
        </div>
    </div>
</div>

