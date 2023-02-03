



<div class="container-fluid">
    
    <div class="justify-content-center">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('message') }}</strong>
            </div>

            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
        @endif

		@include('livewire.elementos.modales')
        <div class="col-md-12">

            
    </div>

	<script>
       
		window.addEventListener('cerrar', event => {
			$('#categoriaModal2').modal('hide');
			
	
			$('#modalEditarCategoria').modal('hide');
		  
	} );
			
	
	</script>