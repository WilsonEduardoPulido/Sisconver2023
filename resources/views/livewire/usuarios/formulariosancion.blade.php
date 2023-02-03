<div class="card  p-1">
    @if (session()->has('exito'))
        <div wire:poll.4s class="alert alert-success alert-dismissible fade show" role="alert">

            <strong>
                <p class="small">{{ session('exito') }}</p>
            </strong>
        </div>
    @endif
    @if (session()->has('error'))
        <div wire:poll.4s class="alert alert-danger alert-dismissible fade show" role="alert">

            <strong>
                <p class="small">{{ session('error') }}</p>
            </strong>
        </div>
    @endif
    <div class="card-header bg-info text-center text-white">
        Sancionar Usuario
    </div>



    <form class="col-12" wire:submit.prevent="enviarDatosSancion" id="#cargarDatosSancion">
        <div class="">
            <label class="form-label">Bibliotecario</label>
            <input disabled type="text" class="form-control " id="validationServer01" required
                   wire:model="nombreB">

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
                <label for="" class="form-label">Motivo de la sancion </label>
                <textarea style="resize: none" class="form-control" name="" id="" wire:model="descripcionSancion"
                          rows="6"></textarea>
            </div>
        </div>



        <div class="mt-4 col-12 justify-content-around  d-flex">
            <button type="button" title="Cancelar" wire:click="limpiarCampos()"
                    class="btn btn-danger  btn-sm text-white ">Cancelar</button>
            <button type="submit" title="Prestar" class="btn btn-warning btn-sm text-white  ">Sancionar
                Usuario</button>

        </div>


    </form>
</div>
