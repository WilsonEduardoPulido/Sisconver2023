@extends('layouts.app')
@section('title', __('Gestion De Devoluciones'))




    @include('partials.sidebar')



    <section class="home-section  h-100" >
        @include('partials.nav')









        @livewire('devoluciones')








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






    </section>


<script>
    window.addEventListener('swald', function(e) {
        Swal.fire({
            title: e.detail.title,
            icon: e.detail.icon,
            iconColor: e.detail.iconColor,
            timer: 4000,
            toast: true,
            position: 'top-right',
            toast: true,
            showConfirmButton: false,

        });


    });
</script>










