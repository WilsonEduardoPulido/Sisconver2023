
 @if (session()->has('error'))
 <div  wire:poll.7s  class="alert alert-danger alert-dismissible fade show" role="alert">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Error...!</strong> 
     <p class="">{{ session('error') }}</p>
   </div>
   
   <script>
     var alertList = document.querySelectorAll('.alert');
     alertList.forEach(function (alert) {
       new bootstrap.Alert(alert)
     })
   </script>
 @endif



 @if (session()->has('info'))
 <div  wire:poll.7s  class="alert alert-info alert-dismissible fade show" role="alert">
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Ten Encuenta...!</strong> 
     <p >{{ session('info') }}</p>
   </div>
   
   <script>
     var alertList = document.querySelectorAll('.alert');
     alertList.forEach(function (alert) {
       new bootstrap.Alert(alert)
     })
   </script>
 @endif



    @if (session()->has('exito'))
    <div  wire:poll.7s  class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Exito...!</strong> 
        <p   >{{ session('exito') }}</p>
      </div>
      
      <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function (alert) {
          new bootstrap.Alert(alert)
        })
      </script>
    @endif





    
    