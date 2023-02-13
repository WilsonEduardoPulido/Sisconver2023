@extends('layouts.app')
@section('title', __('Gestion De CategoriasComponente'))
@section('content')




    @include('partials.sidebar')



    <section class="home-section ">
        @include('partials.nav')






@livewire('componente-categorias.categorias')


















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
    







@endsection
















@vite(['resources/js/app.js', 'resources/js/jquery3.6.3.js'])

<script src="{{ asset('jquery3.6.3.js') }}"></script>

<script>
    window.addEventListener('cerrar', event => {
        $('#crearNuevaCategoriaModal').modal('hide')
        $('#actualizarCategoriaModal').modal('hide')
        if ($('.modal-backdrop').is(':visible')) {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        };




    });
</script>

@push('js')
    <script>
        livewire.on('destroy', id => {





            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })


        });
    </script>
@endpush

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
    window.addEventListener('eliminar', event => {
        Swal.fire({
            title: 'Desea Inactivar Esta Categoria?',

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
                    'Inactivada!',
                    'Categoria Inactivada Con Exito.',
                    'success'
                )
            }
        })


    });
</script>




<script>
    window.addEventListener('eliminarT', event => {
        Swal.fire({
            title: 'Desea Eliminar Esta Categoria?',

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'No, Cancelar!',
        }).then((result) => {
            if (result.isConfirmed) {

                window.livewire.emit('inactivarCategoria', event.detail.id);
                Swal.fire(
                    'Eliminada!',
                    'Categoria Eliminada Con Exito Del Sistema.',
                    'success'
                )
            }
        })


    });
</script>
