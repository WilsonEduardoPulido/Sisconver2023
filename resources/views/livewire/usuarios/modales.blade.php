<!-- Modal Crear Usuario -->
<div wire:ignore.self class="modal fade" id="modalAñadirUsuario" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg ">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <div class="card-header   bg-primary">
                    <h5 class=" text-white">Añadir Nuevo Usuario</h5>
                </div>
                <button type="button bg-white nav-link " wire:click.prevent="limpiarCampos" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="crearUsuario">





                    <div class="row d-flex   m-auto   ">

                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="name" :value="__('Nombre')" class="form-label">Nombres</label>

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
                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="lastname" :value="__('Apellidos')" class="form-label">Apellidos
                                </label>
                                <input id="lastname" class="form-control  @error('lastname') is-invalid @enderror"
                                    type="text" value="  {{ old('lastname') }}" required autofocus
                                    autocomplete="lastname" wire:model="lastname" />
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="row d-flex  m-auto   ">

                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="email" class="form-label ">Correo electrònico</label>


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
                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="celular" :value="__('Celular')" class="form-label">Nùmero De Celular
                                </label>
                                <input id="celular" class="form-control  @error('celular') is-invalid @enderror"
                                    type="number" value="{{ old('celular') }}" required wire:model="celular" />
                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>















                    </div>

                    <div class="row d-flex  m-auto   ">

                        <div class="col-sm-6 col-12 ">
                            <div class=" ">
                                <label for="TipoDoc" :value="__('TipoDoc')" class="form-label ">Tipo De Documento
                                </label>
                                <select class="form-select @error('TipoDoc') is-invalid @enderror "
                                    value="{{ old('TipoDoc') }}" id="TipoDoc" wire:model="TipoDoc"
                                    aria-label="Default select example" required>
                                    <option>Selecione Un Tipo De Documento</option>
                                    <option value="CC">Cèdula De Ciudadanìa</option>
                                    <option value="TI">Tarjeta De Identidad</option>
                                    <option value="CI">Cèdula De Extranjerìa</option>


                                </select>

                                @error('TipoDoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="NumeroDoc" :value="__('NumeroDoc')" class="form-label">Nùmero De
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

                    <div class="row d-flex  m-auto   ">

                        <div class="col-sm-6 col-12 ">
                            <div class=" ">
                                <label for="GradoM" value="__('Grado')" class="form-label ">Grado
                                </label>
                                <select class="form-select @error('Grado') is-invalid @enderror"
                                    value="{{ old('GradoM') }}" required name="GradoM" id="GradoM"
                                    aria-label="Default select example" wire:model="Grado">
                                    <option selected>Selecione Un Grado Escolar</option>
                                    <option value="Prescolar">Prescolar</option>
                                    <option value="Primero">Primero</option>
                                    <option value="Segundo">Segundo</option>
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
                        <div class="col-sm-6 col-12 ">
                            <div class="">
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









                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="password" :value="__('password')" class="form-label">Contraseña
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" wire:model="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>


                        <div class="col-sm-6 col-12 ">
                            <div class="">
                                <label for="password-confirm"
                                    class="form-label ">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="current-password"
                                    wire:model="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                            </div>

                        </div>




                    </div>
                    <div class="modal-footer d-flex justify-content-around mt-2">
                        <button type="button" wire:click.prevent="limpiarCampos()"class="btn col-3 btn-danger text-white"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit"
                            class="btn btn-warning text-white col-3 bi bi-save rounded">Guardar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>



</div>


    <div wire:ignore.self class="modal fade" id="modalEditarUsuario" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <div class="card-header    bg-primary">
                        <h4 class=" text-white">Actualizar Usuario</h4>
                    </div>
                    <button type="button bg-white  " wire:click.prevent="limpiarCampos()" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>



                        <div class="row d-flex   m-auto   ">

                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="name" :value="__('Nombre')" class="form-label">Nombres</label>

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
                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="lastname" :value="__('Apellidos')" class="form-label">Apellidos
                                    </label>
                                    <input id="lastname"
                                        class="form-control  @error('lastname') is-invalid @enderror" type="text"
                                        value="  {{ old('lastname') }}" required autofocus autocomplete="lastname"
                                        wire:model="lastname" />
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>















                        </div>

                        <div class="row d-flex  m-auto   ">

                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="email" class="form-label ">Correo electrònico</label>


                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        wire:model="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="celular" :value="__('Celular')" class="form-label">Nùmero De Celular
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

                        <div class="row d-flex  m-auto   ">

                            <div class="col-sm-6 col-12 ">
                                <div class=" ">
                                    <label for="TipoDoc" :value="__('TipoDoc')" class="form-label ">Tipo De
                                        Documento
                                    </label>
                                    <select class="form-select @error('TipoDoc') is-invalid @enderror "
                                        value="{{ old('TipoDoc') }}" id="TipoDoc" wire:model="TipoDoc"
                                        aria-label="Default select example" required>
                                        <option>Selecione Un Tipo De Documento</option>
                                        <option value="CC">Cèdula De Ciudadanìa</option>
                                        <option value="TI">Tarjeta De Identidad</option>
                                        <option value="CI">Cèdula De Extranjerìa</option>


                                    </select>
                                    @error('TipoDoc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="NumeroDoc" :value="__('NumeroDoc')" class="form-label">Nùmero De
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

                        <div class="row d-flex  m-auto   ">

                            <div class="col-sm-6 col-12 ">
                                <div class=" ">
                                    <label for="GradoM" value="__('Grado')" class="form-label ">Grado
                                    </label>
                                    <select class="form-select @error('Grado') is-invalid @enderror"
                                        value="{{ old('GradoM') }}" required name="GradoM" id="GradoM"
                                        aria-label="Default select example" wire:model="Grado">
                                        <option selected>Selecione Un Grado Escolar</option>
                                        <option value="Prescolar">Prescolar</option>
                                        <option value="Primero">Primero</option>
                                        <option value="Segundo">Segundo</option>
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
                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="direccionM" :value="__('direccion')" class="form-label">Direcciòn
                                    </label>
                                    <input id="direccionM"
                                        class="form-control @error('direccion') is-invalid @enderror" type="text"
                                        name="direccionM" value="{{ old('direccionM') }}" required autofocus
                                        wire:model="direccion" />
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>







                            <div class="col-sm-6 col-12 ">
                                <div class="">
                                    <label for="" class="form-label">Cambiar Estado</label>
                                    <select class="form-select" wire:model="Estado">
                                        <option>Cambiar Estado Del Usuario</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivado</option>

                                    </select>
                                    @error('NumeroDoc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                            </div>

                        </div>
                        <div class="   mt-5 d-flex justify-content-center col-12 ">

                                <button type="button" wire:click.prevent="actualizarUsuario"
                                    class="btn col-8 btn-warning text-white  bi bi-save ">Actualizar Datos</button>


                        </div>

                    </form>













                    <div class="form-group d-flex row m-auto">

                        <div class="alert alert-info mt-2  " role="alert">
                            <strong>
                                <p class="alert-heading">Cambiar Contraseña</p>
                                <p>En este apartado podra cambiar su contraseña de usuario !No Olvide
                                    Dar Click En La Opciòn De Cambiar Contraseña...</p>
                            </strong>
                        </div>



                                                <div class="col-sm-6 col-12 ">
                                                    <div class="">
                                                        <label for="password" :value="__('password')" class="form-label">Contraseña
                                                        </label>
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                                            autocomplete="new-password" wire:model="password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                </div>


                                                <div class="col-sm-6 col-12 ">
                                                    <div class="">
                                                        <label for="password-confirm"
                                                            class="form-label ">{{ __('Confirm Password') }}</label>
                                                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" autocomplete="current-password"
                                                            wire:model="password_confirmation">
                                                            @error('password_confirmation')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror


                                                    </div>

                                                </div>



                        <div class="col-12 justify-content-start d-flex mt-3">
                            <button type="button" class="btn btn-info text-white "
                                wire:click=" cambiarContrasena" name="button">Cambiar
                                Contraseña</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </div>




 <div wire:ignore.self class="modal fade" id="verDetallesUsuario" data-bs-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="createDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createDataModalLabel">Ver Detalles del Usuario
                                        </h5>
                                        <button wire:click.prevent="limpiarCampos()" type="button"
                                            class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-12 ">
                                                    <h5
                                                        class="card-header bi bi-bookmark-star-fill bg-primary text-white">
                                                        Nombre de Usuario:{{ $name }} {{ $lastname }}
                                                    </h5>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card-body">

                                                        <div class="table-responsive col-12">
                                                            <table class="table table-light">
                                                                <thead>

                                                                </thead>
                                                                <tbody>

                                                                    <tr class="">
                                                                        <th scope="col-6">Correo electronico:</td>
                                                                        <td>{{ $email }}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <th scope="row">Tipo de Documento :</td>
                                                                        <td>{{ $TipoDoc }}</td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <th scope="row">Numero de Documento:
                                                                        </th>
                                                                        <td>{{ $NumeroDoc }}</td>

                                                                    </tr>

                                                                    <tr class="">
                                                                        <th scope="row">Direccion:</th>
                                                                        <td>{{ $direccion }}</td>

                                                                    </tr>

                                                                    <tr class="">
                                                                        <th scope="row">Celular:</th>
                                                                        <td>{{ $celular }}</td>

                                                                    </tr>

                                                                    <tr class="">
                                                                        <th scope="row">Grado:</th>
                                                                        <td>{{ $Grado }}</td>

                                                                    </tr>

                                                                    <tr class="">
                                                                        <th scope="row">Estado:</th>
                                                                        <td>{{ $Estado }}</td>

                                                                    </tr>


                                                                </tbody>

                                                                <div class="row m-auto ">
                                                                    <caption>
                                                                        <h6>Sanciones Del Usuario</h6>
                                                                    </caption>


                                                                    <div class="col-8">
                                                                        <table class="table  table-striped table-light">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col-1">Motivo De La Sanciòn
                                                                                    </th>
                                                                                    <th scope="col">Fecha De La Sancion
                                                                                    </th>
                                                                                    <th scope="col">Estado</th>
                                                                                    <th scope="col">Acciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($usuarioSa as $key => $value)
                                                                                <tr class="">



                                                                                    <td colspan="1"> {{ $value['Descripcion'] }} </td>

                                                                                    <td> {{ $value['created_at'] }} </td>
                                                                                    <td> {{ $value['Estado'] }} </td>
                                                                                    <td>
                                                                                        <a title="Retirar Sancion"
                                                                                            class="bi bi-lock-fill  m-1 text-white btn btn-warning  "
                                                                                            wire:click="retirarSancion({{ $idSancion }})">
                                                                                        </a>
                                                                                        <a title="eliminar Sanciòn"
                                                                                            class="bi bi-lock-fill  m-1 text-white btn btn-danger  "
                                                                                            wire:click="eliminarSancion({{ $idSancion }})">
                                                                                        </a>

                                                                                    </td>




                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                            </table>



                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" wire:click="limpiarCampos()"
                                                        class="btn btn-warning text-white close-btn"
                                                        data-bs-dismiss="modal">Cerrar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>







                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
