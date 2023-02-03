@extends('layouts.app')
@section('title', __('Dashboard'))
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
    @include('partials.footer')








@endsection
<script src="{{ asset('jquery3.6.3.js') }}"></script>


