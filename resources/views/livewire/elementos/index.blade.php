@extends('layouts.app')
@section('title', __('Gestion De Elementos'))
@section('content')




    @include('partials.sidebar')

    

    <section class="home-section " >
        @include('partials.nav')


        
        

       
           
                
                    

                        
                        @livewire('elementos')
                       
                       
                
                
           
         

           


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