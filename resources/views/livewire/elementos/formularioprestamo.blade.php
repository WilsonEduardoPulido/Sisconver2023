<div>





   @include('Alertas.Alertas')



    <div class="card p-1">
        <div class="card-header bg-info text-center text-white">
            Realizar Prestamo de un elemento
        </div>



        <form class="col-12" wire:submit.prevent="realizarPrestamo" id="#PrestamoElemento">
            <div class="">
                <label class="form-label">Bibliotecario</label>
                <input disabled type="text" class="form-control  @error('name') is-invalid @enderror "
                       id="validationServer01" required wire:model="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="">
                <label for="validationServer01" class="form-label">Alumno o Persona
                    Solicitante</label>

                <select class="form-select" @error('usuario_id') is-invalid @enderror name="" id=""
                        wire:model="usuario_id">
                    <option> Elige un Usuario
                    </option>
                    @foreach ($consultaUsuarios as $usuario)
                        <option selected value="{{ $usuario->id }}"> {{ $usuario->name }}
                        </option>
                    @endforeach


                </select>
                @error('usuario_id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="">
                <label for="validationServer01" class="form-label">Elemento</label>
                <input type="text" disabled class="form-control  @error('nombreElemento') is-invalid @enderror"
                       id="validationServer01" required wire:model="nombreElemento">
                @error('nombeElemento')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="exampleFormControlTextarea1" class="form-label">Novedades</label>
            <textarea class="form-control @error('Novedades') is-invalid @enderror" id="exampleFormControlTextarea1"
                wire:model.defer="NovedadesElemento" cols="1" rows="3" disabled></textarea>


            <div class="col-12 d-flex justify-content-around ">


                <div class="col-md-5">
                    <label for="validationServer01" class="form-label">Cantidad Disponible</label>
                    <input disabled type="number"
                           class="form-control  @error('cantidadElemento') is-invalid @enderror " id="validationServer01"
                           value="Mark" required wire:model="cantidadElemento">
                    @error('cantidadElmento')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-md-5">

                    <label for="validationServer01" class="form-label">Cantidad a Prestar</label>
                    <input type="number" class="form-control  @error('CantidadPrestar') is-invalid @enderror "
                           id="validationServer01" value="Mark" required wire:model="CantidadPrestar">
                    @error('CantidadPrestar')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mt-4 col-12 justify-content-around  d-flex">
                <button type="button" title="Cancelar" wire:click="limpiarCampos()"
                        class="btn btn-danger  btn-sm text-white ">Cancelar</button>
                <button type="submit" title="Prestar" class="btn btn-warning btn-sm text-white  ">Prestar</button>

            </div>

        </form>


        <form  wire:submit.prevent=" añadirPrestamoModeloPrestamoElemento">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Elemento</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Quitar</th>
                </tr>
                </thead>
                @foreach ($arrayElementos as $key => $elemento)
                    <tbody>
                    <tr class="text-center " wir:key=" {{ $key }} ">
                        <td scope="row" wire:key=" {{ $key + 1 }} "></td>

                        <td> {{ $elemento['NombreElemento'] }} </td>

                        <td> {{ $elemento['CantidadPrestada'] }} </td>
                        <td> <button wire:click.prevent="quitarElementoPrestamo(  {{ $key }} )"  class="btn btn-danger  text-white bi bi-dash-circle"></button>  </td>
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

