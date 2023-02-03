









    <div class="card  p-1">
        @if (session()->has('mensajedevo'))
    <div wire:poll.4s class="alert alert-info alert-dismissible fade show" role="alert">

        <strong>
            <p class="small">{{ session('mensajedevo') }}</p>
        </strong>
    </div>


@endif
        <div class="card-header bg-info text-center text-white">
        Finalizar Prestamo
        </div>



            <form class="col-12" wire:submit.prevent="enviarDatosDevolucion" id="#DevolucionElemento">
                <div class="">
                    <label class="form-label">Bibliotecario</label>
                    <input disabled type="text" class="form-control " id="validationServer01" required wire:model="bibliotecario">

                </div>


                <div class="">
                    <label for="validationServer01" class="form-label">Alumno o Persona
                        </label>

                        <input disabled type="text" class="form-control " id="validationServer01" required wire:model="usuarioDeudorD">

                </div>



        <div class="">
            <label for="validationServer01" class="form-label">Elemento o Libro</label>
            <input type="text" disabled class="form-control " id="validationServer01" required wire:model="articuloDevolver">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="">
            <label for="validationServer01" class="form-label">Cantidad Prestada</label>
            <input disabled type="number" class="form-control " id="validationServer01" value="Mark" required
                wire:model="CantidadPrestadaDevolver">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>


        <div class="">
            <label for="validationServer01" class="form-label">Cantidad  Devuelta</label>
            <input type="number" class="form-control " id="validationServer01" value="Mark" required
                wire:model="CantidadDevuelta">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>


        <div class="">
            <div class="mb-3">
              <label for="" class="form-label">Novedades </label>
              <textarea  style="resize: none" class="form-control" name="" id="" wire:model="NovedadesDevolucion" rows="3"></textarea>
            </div>

        </div>
                <label for="" class="form-label">Clasifiqué la novedad  </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Tipo_novedad" id="exampleRadios1" value="Alta" wire:model="Tipo_novedad">
                    <label class="form-check-label" for="exampleRadios1">
                        Alta
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Tipo_novedad" id="exampleRadios2" value="Media" wire:model="Tipo_novedad">
                    <label class="form-check-label" for="exampleRadios2">
                        Media
                    </label>
                </div>
                <div class="form-check" wirw:ignore>
                    <input class="form-check-input" type="radio" name="Tipo_novedad" id="exampleRadios3" value="Baja" checked wire:model="Tipo_novedad">
                    <label class="form-check-label" for="exampleRadios3">
                        Baja
                    </label>
                </div>

    </div>


        <div class="mt-4 col-12 justify-content-around  d-flex">
            <button type="button" title="Cancelar" wire:click="cancelarDevolucion()" class="btn btn-danger  btn-sm text-white ">Cancelar</button>
            <button type="submit" title="Prestar" class="btn btn-warning btn-sm text-white  ">Finalizar Prestamo</button>

        </div>


        </form>
    </div>


