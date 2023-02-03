<section class=" row d-flex justify-content-around  m-5 cardPanel ">


    <div
        class="col-12 col-sm-2 mt-2 car  border  rounded-4 d-flex  flex-column justify-content-center usu_a  align-items-center  ">
        <h3 class="fs-4">Usuarios</h3>
        <img src="{{ asset('img/trabajando.png') }}" alt="" height="50px" width="50px">
        <div class="d-flex justify-content-center align-items-center flex-column ">
           
          <h3 class="fs-4">Total:<strong class="">{{ Auth::user()->count() }}</strong> </h3>
        </div>
    </div>
    <div
        class="col-12 car mt-2  col-sm-2  rounded-4 border d-flex usu_a flex-column justify-content-center align-items-center mt-2 ">
        <h3 class="fs-4">Categorias</h3>
        <img src="{{ asset('img/dado.png') }}" alt="" height="50px" width="50px">
        <div class="d-flex justify-content-center align-items-center flex-column">
           
          <h3 class="fs-4">Total:<strong class="">  {{$totalCategoriasActivas}} </strong> </h3>

        </div>
    </div>
    <div
        class="col-12 car col-sm-2 mt-2 d-flex usu_a border rounded-4 flex-column justify-content-center align-items-center ">
        <h3 class="fs-4">Libros</h3>
        <img src=" {{ asset('img/icons8-ibooks.svg') }}" alt="" height="50px" width="50px">
        <div class="d-flex justify-content-center align-items-center flex-column">

            <h3 class="fs-4">Total:<strong class=""> {{$totalLibrosActivos}} </strong> </h3>

        </div>
    </div>
    <div
        class="col-12 col-sm-2 card mt-2 d-flex usu_a border car rounded-4 flex-column justify-content-center align-items-center ">
        <h3 class="fs-4">Prestamos</h3>
        <img src="{{ asset('img/pedir-prestado.png') }}" alt="" height="50px" width="50px">
        <div class="d-flex justify-content-center align-items-center flex-column bg-orange-300 ">

            <h3 class="fs-4">Total: <strong class=""> {{$totalPrestamosActivos}} </strong> </h3>
        </div>
    </div>
    <div
        class="col-12 col-sm-2 mt-2  d-flex usu_a border rounded-4 car flex-column justify-content-center align-items-center ">
        <h3 class="fs-4">Devoluciones</h3>
        <img src="{{ asset('img/return.png') }}" alt="" height="50px" width="50px">
        <div class="d-flex justify-content-center align-items-center flex-column">

            <h3 class="fs-4">Pendientes:<strong class=""> {{$totalDevolucionesRealizadas}} </strong></h3>
        </div>
    </div>
</section>
