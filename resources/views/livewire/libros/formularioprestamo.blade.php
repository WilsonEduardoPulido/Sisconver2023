<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="card p-1">
        @if(session()->has('AlertaPrestamoLibro'))
            <div class="alert alert-info" role="alert" wire:poll.5s>
                <strong>
                    {{session('AlertaPrestamoLibro')}}
                </strong>
            </div>
        @endif
        <div class="card-header m-2 bg-info text-center text-white">
            Formulario Libros
        </div>
        <form class="row g-3" id="#prestamoLibro" wire:submit.prevent="RealizarPrestamoLibro">
            <div class="col-md-12">
                <label for="nombreBibliotecario" class="form-label">Bibliotecario</label>
                <input type="text"  disabled  class="form-control   @error('nombreBibliotecario') is-invalid @enderror " id="nombreBibliotecario" value="Mark" required name="nombreBibliotecario" wire:model="nombreBibliotecario">
            </div>
            @error('nombreBibliotecario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          
            <div class="col-md-12">
                <label for="nombreUsuario" class="form-label">Usuario</label>
                <div class="input-group">
                    <select class="form-select @error('nombreUsuario') is-invalid @enderror " name="nombreUsuario" id="nombreUsuario" wire:model="nombreUsuario" >
    
                        <option > Elige un Usuario
                        </option>
                       
    
    
                    </select>
                    @error('nombreUsuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
      
    @foreach ($libros  as $index => $libro )
        
   
            
            <div class="col-md-12">
                <label for="nombreLibro" class="form-label">Libro</label>
                <select name="orderProducts[{{$index}}][product_id]"
                wire:model="orderProducts.{{$index}}.product_id"
                class="form-control">
            <option value="">-- choose product --</option>
            @foreach ($todosLosLibros as $li)
                <option value="{{ $li->id }}">
                    {{ $li->Nombre }} 
                </option>
            @endforeach
            @endforeach

        </select>
            </div>
            @error('nombreLibro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            <div class="col-md-12">
                <label for="cantidadDisponible" class="form-label">Cantidad Disponible</label>
                <input type="text"  disabled class="form-control @error('cantidadDisponible') is-invalid @enderror" id="cantidadDisponible" required name="cantidadDisponible" wire:model="cantidadDisponible">
            </div>
            @error('cantidadDisponible')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
            <div class="col-md-12">
                <label for="cantidadPrestamo" class="form-label">Cantidad Prestamo</label>
                <input type="text" class="form-control @error('cantidadPrestamo') is-invalid @enderror" id="cantidadPrestamo" required name="cantidadPrestamo" wire:model="cantidadPrestamo">
            </div>
            @error('nombrePrestamo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>

       



        @enderror
            <div class="col-md-12">
                <label for="cantidadPrestamo" class="form-label">Fecha del Prestamo</label>
                <input type="date" class="form-control @error('FechaPrestamo') is-invalid @enderror" id="cantidadPrestamo" required name="cantidadPrestamo" wire:model="FechaPrestamo">
            </div>
            @error('FechaPrestamo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <div class="col-12 d-flex justify-content-around mt-4">
                <button class="btn btn-warning text-white btn-sm" type="submit">Prestar</button>
    
                <button class="btn btn-danger text-white btn-sm " type="button" wire:click="limpiarCamposPrestamo" >Cancelar</button>
            </div>

            <button wire:click="AñadirLibro"> nn </button>
        </form>
    </div>
    
</div>
