<div class="card  p-1">

    <div class="card-header bg-info text-center text-white">
        Sancionar Usuario
    </div>



    <form class="col-12" wire:submit.prevent="enviarDatosSancion" id="#cargarDatosSancion">
        <div class="">
            <label class="form-label  @error('nombreB') is-invalid @enderror">Bibliotecario</label>
            <input disabled type="text" class="form-control " id="validationServer01" required
                   wire:model="nombreB">
                   @error('nombreB')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror
        </div>
        @csrf

        <div class="">
            <label for="validationServer01" class="form-label">Alumno o Persona
            </label>

            <input disabled type="text" class="form-control " id="validationServer01" required
                   value=" {{ $Nombre }} {{ $Apellidos }} ">

        </div>

        <div class="row d-flex ">
            <div class="col-3">
                <label for="validationServer01" class="form-label">Tipo Doc
                </label>

                <input disabled type="text" class="form-control " id="validationServer01" required
                       value=" {{ $tipoDocumento }}  ">

            </div>
            <div class="col-5">
                <label for="validationServer01" class="form-label">N#
                </label>

                <input disabled type="text" class="form-control " id="validationServer01" required
                       value=" {{ $numeroDeDocumento }} ">

            </div>
            <div class="col-4">
                <label for="validationServer01" class="form-label">Grado
                </label>

                <input disabled type="text" class="form-control " id="validationServer01" required
                       value=" {{ $Gradoe }} ">

            </div>

        </div>









        <div class="">
            <div class="mb-3">
                <label for="" class="form-label @error('descripcionSancion') is-invalid @enderror">Motivo de la sancion </label>
                <textarea style="resize: none" class="form-control" name="" id="" wire:model="descripcionSancion"
                          rows="6"></textarea>
                          @error('descripcionSancion')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
            </div>

        </div>



        <div class="mt-4 col-12 justify-content-around  d-flex">
            <button type="button" title="Cancelar" wire:click="limpiarCampos()"
                    class="btn btn-danger   text-white ">Cancelar</button>
            <button type="submit" title="Prestar" class="btn btn-warning  text-white  ">Sancionar
                Usuario</button>

        </div>


    </form>
</div>
