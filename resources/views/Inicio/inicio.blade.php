@extends('layouts.app')
@section('title', __('Inicio'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section">


        @include('partials.nav')
        @include('partials.panel')




        <div class="d-flex m-5 row">
            <div class="col-12  card-body col-sm-6 justify-content-center d-flex align-items-center flex-column   ">
                <h2 class="m-1 fs-4">Reporte semanal</h2>








                        <canvas id="grafica"></canvas>




                </div>
                <div class="col-sm-6 col-12 justify-content-center d-flex align-items-center flex-column ">
                    <h2 class="m-1 fs-4">Reporte General</h2>
                    @include('inicio.grafica')
                </div>




            </div>
    </section>

    <div class="container-buttons">
        <input type="checkbox" id="btn-mas">
        <div class="botones ">
            <a><button class="btn rounded increase-font bg-light"><i class="fas fa-solid fa-plus  fa-1x"></i></button></a>
            <a><button class="btn rounded decrease-font bg-light"><i class="fas fa-solid fa-minus  fa-1x"></i></button></a>
            <a>
                <button class="switch active " id="switch">
                    <span><i class="bi bi-sun-fill fa-1x"></i></span>
                    <span><i class="bi bi-moon-fill fa-1x"></i></span>
                </button>
            </a>
        </div>
        <div class="btn-mas">
            <label for="btn-mas"><img src="{{asset('img/accesibilidad.png')}}"></label>
        </div>
    </div>
    @include('partials.footer')








@endsection
<script src="{{ asset('jquery3.6.3.js') }}"></script>
