<div>
    <div class="container-fluid">

        <div class="justify-content-center">




            <div class="row m-3  d-flex ">


                <div class="col-8">
                    <!--------LINICIO LINKS TABS -------->
                    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">


                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Gestión De Elementos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Restaurar Elementos</button>
                        </li>



                        <button class=" btn-warning text-white  btn  " data-bs-toggle="modal"
                            data-bs-target="#crearNuevoElementoModal">
                            Añadir Elemento<i class=" text-white small bi-plus-circle-fill"></i>
                        </button>





                    </ul>


                    <!--------FIN LINKS TABS -------->





                    <!------------CONTENEDORES  DE LAS TABS  ------------->



                    <div class="tab-content " id="pills-tabContent">
                        <!----------- INICIO CONTENEDOR 1  ------------->

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            @include('livewire.elementos.TablaPrincipal')
                        </div>
                        <!----------- FIN CONTENEDOR 1  ------------->

                        <!----------- INICIO CONTENEDOR 2  ------------->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            @include('livewire.elementos.TablaEliminar')
                        </div>
                        <!----------- FIN CONTENEDOR 2  ------------->


                        <!----------- INICIO CONTENEDOR 3  ------------->




                        <!----------- FIN  CONTENEDOR 3  ------------->
















                    </div>

                    <div class="col-sm-4 col-12 card p-2 h-50  ">
                        <!------Formulario de prestamo------>

                       @include('livewire.elementos.formularioprestamo')

                        </div>














                    </div>
                </div>
            </div>





        </div>



















        @include('livewire.elementos.modales')

    </div>



</div>

