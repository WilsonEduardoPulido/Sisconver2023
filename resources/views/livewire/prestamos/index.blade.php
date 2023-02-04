@extends('layouts.app')
@section('title', __('Gestion De Prestamos'))
@section('content')




    @include('partials.sidebar')

    

    <section class="home-section " >
        @include('partials.nav')

       
        
           
                
                    

                        
        @livewire('prestamos')
                       
                       
                
                
           
         

           

<div class="mt-5 ">
    @include('partials.footer')
    </div>

                     

    </section>
   







@endsection









<script>
    window.addEventListener('cerrar', event => {
        $('#editarPrestamoModal').modal('hide')
        $('#actualizarCategoriaModal').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




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
    window.addEventListener('eliminar', event => {
        Swal.fire({
            title: 'Desea Inactivar Este Prestamo?',

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Inactivar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('eliminarTemporalPrestamo', event.detail.id);
                Swal.fire(
                    'Inactivada!',
                    'Prestamo Inactivado Con Exito.',
                    'success'
                )
            }
        })


    });
</script>
