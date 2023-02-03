@extends('layouts.app')
@section('title', __('Gestion De Libros'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section ">
        @include('partials.nav')



        @livewire('libros')

    </section>


    <div class="mt-5 ">
        @include('partials.footer')
    </div>

@endsection

<script src="{{ asset('jquery3.6.3.js') }}"></script>
<!--------Cerrar Modales Script Inicio---------->
<script>
    window.addEventListener('eliminar', event => {
        Swal.fire({
            title: 'Desea Inactivar Este Libro ?',
          
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Inactivar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('destroy', event.detail.id);
                Swal.fire(
                    'Inactivado!',
                    'Libro Inactivado Con Exito.',
                    'success'
                )
            }
        })


    });
</script>
<script>
    window.addEventListener('cerrar', event => {
        $('#añadirLibroModal').modal('hide')
        $('#actualizarLibroModal').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




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
<!--------Cerrar Modales Script   Fin---------->
<script>


   $(document).ready(() =>{

    $('#abrirTomos').on('click', function () {
    $("#Tomos").toggle();
    });
    $('#abrirNovedades').on('click', function () {
    $("#Novedades").toggle();
    });
    $('#abrirl').on('click', function () {
    $("#NovedadesT").toggle();
    });
    
    }


   );
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
    window.addEventListener('eliminarT', event => {
        Swal.fire({
            title: 'Desea Eliminar Este Libro?',
          
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('eliminarsl', event.detail.id);
                Swal.fire(
                    'Eliminada!',
                    'Libro Eliminado Con Exito Del Sistema.',
                    'success'
                )
            }
        })


    });
</script>