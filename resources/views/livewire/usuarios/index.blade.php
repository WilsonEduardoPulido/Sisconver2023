@extends('layouts.app')
@section('title', __('Gestion De Usuarios'))





    @include('partials.sidebar')



    <section class="home-section h-100 bg-light">
        @include('partials.nav')


        <div class=" m-auto">



            @livewire('usuarios')
        </div>





    </section>





    </div>


<script>
    window.addEventListener('cerrar', event => {
        $('#modalAñadirUsuario').modal('hide')
        $('#modalEditarUsuario').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




    });
</script>
