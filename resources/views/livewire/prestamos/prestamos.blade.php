<div>

    <div class="container-fluid mt-4">








       

            <!--------LINICIO LINKS TABS -------->
            <ul class="nav nav-tabs m-3 " id="myTab" role="tablist">


                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Gestionar
                        Prèstamos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Restaurar Prèstamos</button>
                </li>
               
            </ul>



            <div class="tab-content  " id="pills-tabContent">
                <!----------- INICIO CONTENEDOR 1  ------------->

                <div class="tab-pane fade show active mt-4" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    @include('livewire.prestamos.TablaDePrestamos')
                </div>
                <!----------- FIN CONTENEDOR 1  ------------->

                <!----------- INICIO CONTENEDOR 2  ------------->
                <div class="tab-pane fade mt-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    @livewire('prestamos.tablaprestamoseliminados')
                </div>
                <!----------- FIN CONTENEDOR 2  ------------->


                <!----------- INICIO CONTENEDOR 3  ------------->




                <!----------- FIN  CONTENEDOR 3  ------------->






















            </div>
       





            @include('livewire.prestamos.modales')



    </div>

    </div>
    
