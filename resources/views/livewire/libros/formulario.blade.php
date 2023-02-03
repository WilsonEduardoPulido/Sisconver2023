<div class="card p-1">
   @include('Alertas.Alertas')
    <div class="card-header m-2 bg-info text-center text-white">
        Formulario Libros
    </div>
    <form class="row g-3" id="#prestamoLibro" wire:submit.prevent="RealizarPrestamoLibro">
        <div class="col-md-12">
            <label for="nombreBibliotecario" class="form-label">Bibliotecario</label>
            <input type="text" disabled class="form-control   @error('nombreBibliotecario') is-invalid @enderror "
                   id="nombreBibliotecario" value="Mark" required name="nombreBibliotecario"
                   wire:model="nombreBibliotecario">
        </div>
        @error('nombreBibliotecario')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="col-md-12">
            <label for="nombreUsuario" class="form-label">Usuario</label>
            <div class="input-group">
                <select class="form-select @error('nombreUsuario') is-invalid @enderror " name="nombreUsuario"
                        id="nombreUsuario" wire:model="nombreUsuario">

                    <option> Elige un Usuario
                    </option>
                    @foreach ($consultaUsuariosLibros as $usuario)
                        <option selected value="{{ $usuario->id }}"> {{ $usuario->name }} {{ $usuario->lastname }}
                        </option>
                    @endforeach


                </select>
                @error('nombreUsuario')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>




        <div class="col-md-12">
            <label for="nombreLibro" class="form-label">Libro</label>
            <input type="text" disabled class="form-control   @error('nombreLibro') is-invalid @enderror"
                   id="nombreLibro" value="Otto" required name="nombreLibro" wire:model="nombreLibro">
        </div>
        @error('nombreLibro')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div>
            <label for="exampleFormControlTextarea1" class="form-label">Novedades</label>
            <textarea class="form-control @error('Novedades') is-invalid @enderror" id="exampleFormControlTextarea1"
                wire:model.defer="NovedadesF" cols="1" rows="3" disabled></textarea>
        </div>
       
        <div class="col-md-12  d-flex justify-content-around ">
            <div class="col-md-5">
                <label for="cantidadDisponible" class="form-label">Cantidad Disponible</label>
                <input type="text" disabled class="form-control @error('cantidadDisponible') is-invalid @enderror"
                       id="cantidadDisponible" required name="cantidadDisponible" wire:model="cantidadDisponible">

                @error('cantidadDisponible')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-5">
                <label for="cantidadPrestamo" class="form-label">Cantidad Prestamo</label>
                <input type="text" class="form-control @error('cantidadPrestamo') is-invalid @enderror"
                       id="cantidadPrestamo" required name="cantidadPrestamo" wire:model="cantidadPrestamo">

                @error('nombrePrestamo')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="col-12 d-flex justify-content-around mt-4">
            <button class="btn btn-warning text-white btn-sm" type="submit">Prestar</button>

            <button class="btn btn-danger text-white btn-sm " type="button"
                    wire:click="limpiarCamposPrestamo">Limpiar Campos</button>
        </div>


    </form>
    <form  wire:submit.prevent="añadirPrestamoModeloPrestamo">


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Libro</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Quitar</th>
            </tr>
            </thead>
            @foreach ($arrayAgregaralatabla as $key => $libro)
                <tbody>
                <tr class="text-center " wir:key=" {{ $key }} ">
                    <td scope="row" wire:key=" {{ $key + 1 }} "></td>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $libro['NombreLibro'] }} </td>
                    <td> {{ $libro['CantidadPrestada'] }} </td>
                    <td> <button wire:click.prevent="quitarLibroPrestamo(  {{ $key }} )"  class="btn btn-danger  text-white bi bi-dash-circle"></button>  </td>
                </tr>

                </tbody>
            @endforeach


        </table>

        <div class="row d-flex    mt-4">


        </div>

        <div class="col-12 justify-content-end mt-4 ">

            <button class="
            btn btn-warning text-white">Realizar Prestamo</button>
        </div>
    </form>
</div>
