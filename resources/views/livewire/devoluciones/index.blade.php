@extends('layouts.app')
@section('title', __('Gestion De Devoluciones'))




    @include('partials.sidebar')



    <section class="home-section  h-100" >
        @include('partials.nav')









        @livewire('devoluciones')















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










