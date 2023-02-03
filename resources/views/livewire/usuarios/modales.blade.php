<!-- Modal Crear Usuario -->
<div wire:ignore.self class="modal fade" id="modalAñadirUsuario" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary d-flex justify-content-center">
                <div class="card-header col-12  text-center bg-primary">
                    <h4 class=" text-white">Añadir Nuevo Usuario</h4>
                </div>
                <button type="button bg-white nav-link " wire:click.prevent="cancelar()" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="crearUsuario">



                    <div class="row d-flex  justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2 ">
                                <label for="name" :value="__('Nombre')"
                                    class="form-label">{{ __('Name') }}</label>

                                <input id="name" type="text"
                                    class="form-control  @error('name') is-invalid @enderror "
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    wire:model="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2">
                                <label for="lastname" :value="__('Apellidos')" class="form-label">Apellidos
                                </label>
                                <input id="lastname" class="form-control  @error('lastname') is-invalid @enderror"
                                    type="text"  value="  {{ old('lastname') }}" required autofocus
                                    autocomplete="lastname" wire:model="lastname" />
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2 ">
                                <label for="email" class="form-label ">{{ __('Email Address') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autocomplete="email" wire:model="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2">
                                <label for="celular" :value="__('Celular')" class="form-label">Celular
                                </label>
                                <input id="celular" min="0"
                                    class="form-control  @error('celular') is-invalid @enderror" type="number"
                                    max-length="10" value="{{ old('celular') }}" required
                                    wire:model="celular" />
                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2 ">
                                <label for="TipoDoc" :value="__('TipoDoc')" class="form-label ">Tipo De Documento
                                </label>
                                <select class="form-select @error('TipoDoc') is-invalid @enderror "
                                    value="{{ old('TipoDoc') }}" required  id="TipoDoc"
                                    wire:model="TipoDoc"aria-label="Default select example">
                                    <option>Selecione Un Tipo De Documento</option>
                                    <option value="CC">Cedula De Ciudadania</option>
                                    <option value="TI">Tarjeta De Identidad</option>
                                    <option value="CI">Cedula De Extranjeria</option>


                                </select>
                                @error('TipoDoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2">
                                <label for="NumeroDoc" :value="__('NumeroDoc')" class="form-label">Numero
                                    Documento</label>
                                </label>
                                <input id="NumeroDoc" min="0"
                                    class="form-control @error('NumeroDoc') is-invalid @enderror" type="number"
                                    max-length="10" name="NumeroDoc" value="{{ old('NumeroDoc') }}" required
                                    wire:model="NumeroDoc" />
                                @error('NumeroDoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2 ">
                                <label for="GradoM" value="__('Grado')" class="form-label ">Grado
                                </label>
                                <select class="form-select @error('Grado') is-invalid @enderror"
                                    value="{{ old('GradoM') }}" required name="GradoM" id="GradoM"
                                    aria-label="Default select example" wire:model="Grado">
                                    <option selected>Selecione Un Grado Escolar</option>
                                    <option value="{{ old('Grado') }} " value="Prescolar">Prescolar</option>
                                    <option value="{{ old('Grado') }} " value="Primero">Primero</option>
                                    <option value="{{ old('Grado') }}" value="Segundo">Segundo</option>
                                    <option value="Tercero">Tercero</option>
                                    <option value="Cuarto">Cuarto</option>
                                    <option value="Quinto">Quinto</option>
                                    <option value="Sexto">Sexto</option>
                                    <option value="Septimo">Septimo</option>
                                    <option value="Octavo">Octavo</option>
                                    <option value="Noveno">Noveno</option>
                                    <option value="Decimo">Decimo</option>
                                    <option value="Undecimo">Undecimo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('Grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2">
                                <label for="direccionM" :value="__('direccion')" class="form-label">Direcciòn
                                </label>
                                <input id="direccionM" class="form-control @error('direccion') is-invalid @enderror"
                                    type="text" name="direccionM" value="{{ old('direccionM') }}" required
                                    autofocus wire:model="direccion" />
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>
                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-1 ">
                                <label for="password" :value="__('password')" class="form-label">Contraseña
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" wire:model="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-1">
                                <label for="password-confirm"
                                    class="form-label ">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="current-password"
                                    wire:model="password">
                            </div>

                        </div>

                    </div>




















            </div>
            <div class="modal-footer d-flex justify-content-around">
                <button type="button" wire:click.prevent="cancelar()"class="btn col-3 btn-danger text-white"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="submit"  class="btn btn-warning text-white col-3 bi bi-save rounded"
                    >Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>




<div wire:ignore.self class="modal fade" id="modalEditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary d-flex justify-content-center">
                <div class="card-header col-12  text-center bg-primary">
                    <h4 class=" text-white">Actualizar  Usuario</h4>
                </div>
                <button type="button bg-white nav-link " wire:click.prevent="cancelar()" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="actualizarUsuario">



                    <div class="row d-flex  justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="">
                                <label for="name" :value="__('Nombre')"
                                    class="form-label">{{ __('Name') }}</label>

                                <input id="name" type="text"
                                    class="form-control  @error('name') is-invalid @enderror "
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    wire:model="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="">
                                <label for="lastname" :value="__('Apellidos')" class="form-label">Apellidos
                                </label>
                                <input id="lastname" class="form-control  @error('lastname') is-invalid @enderror"
                                    type="text"  value="  {{ old('lastname') }}" required autofocus
                                    autocomplete="lastname" wire:model="lastname" />
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="" >
                                <label for="email" class="form-label ">{{ __('Email Address') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autocomplete="email" wire:model="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="">
                                <label for="celular" :value="__('Celular')" class="form-label">Celular
                                </label>
                                <input id="celular" min="0"
                                    class="form-control  @error('celular') is-invalid @enderror" type="number"
                                    max-length="10" value="{{ old('celular') }}" required
                                    wire:model="celular" />
                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class=" ">
                                <label for="TipoDoc" :value="__('TipoDoc')" class="form-label ">Tipo De Documento
                                </label>
                                <select class="form-select @error('TipoDoc') is-invalid @enderror "
                                    value="{{ old('TipoDoc') }}"  id="TipoDoc"
                                    wire:model="TipoDoc" aria-label="Default select example" required >
                                    <option>Selecione Un Tipo De Documento</option>
                                    <option value="CC">Cedula De Ciudadania</option>
                                    <option value="TI">Tarjeta De Identidad</option>
                                    <option value="CI">Cedula De Extranjeria</option>


                                </select>
                                @error('TipoDoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="">
                                <label for="NumeroDoc" :value="__('NumeroDoc')" class="form-label">Numero
                                    Documento</label>
                                </label>
                                <input id="NumeroDoc" min="0"
                                    class="form-control @error('NumeroDoc') is-invalid @enderror" type="number"
                                    max-length="10" name="NumeroDoc" value="{{ old('NumeroDoc') }}" required
                                    wire:model="NumeroDoc" />
                                @error('NumeroDoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>

                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class=" ">
                                <label for="GradoM" value="__('Grado')" class="form-label ">Grado
                                </label>
                                <select class="form-select @error('Grado') is-invalid @enderror"
                                    value="{{ old('GradoM') }}" required name="GradoM" id="GradoM"
                                    aria-label="Default select example" wire:model="Grado">
                                    <option selected>Selecione Un Grado Escolar</option>
                                    <option  value="Prescolar">Prescolar</option>
                                    <option  value="Primero">Primero</option>
                                    <option  value="Segundo">Segundo</option>
                                    <option value="Tercero">Tercero</option>
                                    <option value="Cuarto">Cuarto</option>
                                    <option value="Quinto">Quinto</option>
                                    <option value="Sexto">Sexto</option>
                                    <option value="Septimo">Septimo</option>
                                    <option value="Octavo">Octavo</option>
                                    <option value="Noveno">Noveno</option>
                                    <option value="Decimo">Decimo</option>
                                    <option value="Undecimo">Undecimo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('Grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-2">
                                <label for="direccionM" :value="__('direccion')" class="form-label">Direcciòn
                                </label>
                                <input id="direccionM" class="form-control @error('direccion') is-invalid @enderror"
                                    type="text" name="direccionM" value="{{ old('direccionM') }}" required
                                    autofocus wire:model="direccion" />
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>
                    <div class="row d-flex justify-content-around mt-1   ">

                        <div class="col-sm-5 col-12 ">
                            <div class="mt-1 ">
                                <label for="password" :value="__('password')" class="form-label">Contraseña
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" wire:model="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-5 col-12 ">
                            <div class="mt-1">
                              <div class="mb-3">
                                <label for="" class="form-label">Cambiar Estado</label>
                                <select class="form-select" wire:model="Estado">
                                    <option >Cambiar Estado Del Usuario</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivado</option>

                                </select>
                              </div>
                            </div>

                        </div>

                    </div>




















            </div>
            <div class="modal-footer d-flex justify-content-around">
                <button type="button" wire:click.prevent="cancelar()"class="btn col-3 btn-danger text-white"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="submit"  class="btn btn-warning text-white col-3 bi bi-save rounded"
                    >Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>



<!-- Ver Detalles  Modal -->
<div wire:ignore.self class="modal fade" id="verDetallesUsuario" data-bs-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Ver Detalles del Usuario</h5>
                <button wire:click.prevent="resetInput()" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-12 ">
                            <h5 class="card-header bi bi-bookmark-star-fill bg-primary text-white">Nombre de Usuario:{{ $name }} {{ $lastname }}</h5>

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">

                                <p class="card-text bi bi-caret-right-fill">Correo electronico:{{ $email }}</p>
                                <p class="card-text bi bi-caret-right-fill" >Tipo de Documento :{{ $TipoDoc }}</p>
                                <p class="card-text bi bi-caret-right-fill">Numero de Documento:{{ $NumeroDoc }}</p>
                                <p class="card-text bi bi-caret-right-fill">Direccion:{{ $direccion }}</p>
                                <p class="card-text bi bi-caret-right-fill">Celular:{{ $celular }}</p>
                                <p class="card-text bi bi-caret-right-fill">Grado:{{ $Grado }}</p>
                                <p class="card-text bi bi-caret-right-fill text-warning"">Estado:{{ $Estado }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetInput()" class="btn btn-warning text-white close-btn"
                        data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
