@extends('layouts.app')
@section('title', __('Gestion De Devoluciones'))




    @include('partials.sidebar')



    <section class="home-section  h-100" >
        @include('partials.nav')









        @livewire('componente-devoluciones.devoluciones')








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
@vite(['resources/js/app.js', 'resources/js/jquery3.6.3.js'])
<script src="{{ asset('jquery3.6.3.js') }}"></script>
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

<script>
    window.addEventListener('crear', function(e) {
        Swal.fire({
            title: e.detail.title,
            icon: e.detail.icon,
            iconColor: e.detail.iconColor,
            timer: 4000,
            text: e.detail.text,

        });


    });
</script>




<script>
    window.addEventListener('eliminar', event => {
        Swal.fire({
            title: 'Desea Inactivar Esta Devolucion?',

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Inactivar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('eliminarTemporalDevolucion', event.detail.id);
                Swal.fire(
                    'Inactivada!',
                    'Usuario Inactivado Con Exito.',
                    'success'
                )
            }
        })


    });
</script>
