@extends('layouts.app')
@section('title', __('Gestion De Elementos'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section " >
        @include('partials.nav')











                        @livewire('componente-elementos.elementos')







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




    </section>








@endsection


<script src="{{ asset('jquery3.6.3.js') }}"></script>
<!--------Cerrar Modales Script Inicio---------->

<script>
    window.addEventListener('cerrar', event => {
        $('#crearNuevoElementoModal').modal('hide')
        $('#actualizarNuevoElementoModal').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




    });
</script>

<!--------Cerrar Modales Script   Fin---------->

<script>


    $(document).ready(() =>{

     $('#ocultarNovedades').on('click', function () {
     $("#mostrarNovedades").toggle();
     });


     }


    );
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
            title: 'Desea Inactivar Este Elemento?',

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Inactivar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('inactivarElemento', event.detail.id);
                Swal.fire(
                    'Inactivada!',
                    'Elemento Inactivado Con Exito.',
                    'success'
                )
            }
        })


    });
</script>

<script>
    window.addEventListener('swal', function(e) {
        Swal.fire({
            title: e.detail.title,
            icon: e.detail.icon,
            iconColor: e.detail.iconColor,
            timer: 6000,
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
    window.addEventListener('error', function(e) {
        Swal.fire({
            title: e.detail.title,
            icon: e.detail.icon,
            iconColor: e.detail.iconColor,
            timer: 6000,
            toast: true,
            position: 'top-right',
            toast: true,
            showConfirmButton: false,

        });


    });
</script>
