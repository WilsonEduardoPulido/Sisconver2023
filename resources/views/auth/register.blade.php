<link rel="icon" href=" {{ asset('img/lulogo_PLumita.svg') }} " type="image/x-icon">@extends('layouts.app')

<body class="inicio">
    <button type="button" class="  text-white btn btn-info bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
        Ayuda <strong>sisconver2023@gmail.com</strong>
    </button>

@section('content')
<div class="container-fluid  h-100 m-auto">
    <div class="row d-flex  justify-content-center align-content-center  ">
        <div class="col-md-8 ">
            <div class="card col-md-12 mt-4">


                <div class="card-body  d-flex aling-items-center flex-column justify-content-center">





                    <div class="col-md-12">
                        <div class="card-body col-sm-12 overflow-auto" >
                            <div class="card-header  text-center text-white bg-primary">
                                {{ __('Registro de Usuario Colegio La Independencia') }}
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row d-flex  justify-content-around mt-1   ">

                                    <div class="col-sm-5 col-12 ">
                                        <div class="mt-2 ">
                                            <label for="name" :value="__('Nombre')"
                                                class="form-label">{{ __('Name') }}</label>

                                            <input id="name" type="text" class="form-control  " name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                            <input id="lastname" class="form-control" type="text" name="lastname"
                                              value="  {{ old('lastname')}}" required autofocus autocomplete="lastname" />
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
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

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
                                            <input id="celular" min="0" class="form-control" type="number"
                                                max-length="10" name="celular" value="{{ old('celular') }}" required />
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
                                            <select class="form-select" value="{{ old('TipoDoc') }}" required name="TipoDoc" id="TipoDoc" aria-label="Default select example">
                                                <option >Selecione Un Tipo De Documento</option>
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
                                            <input id="NumeroDoc" min="0" class="form-control" type="number"
                                                max-length="10" name="NumeroDoc" value="{{ old('NumeroDoc') }}" required />
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
                                            <label for="Grado" value="__('Grado')" class="form-label ">Grado
                                            </label>
                                            <select class="form-select" value="{{ old('Grado') }}" required name="Grado" id="Grado" aria-label="Default select example">
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
                                    <div class="col-sm-5 col-12 ">
                                        <div class="mt-2">
                                            <label for="direccion" :value="__('direccion')" class="form-label">Direcciòn
                                            </label>
                                            <input id="direccion" class="form-control" type="text" name="direccion"
                                            value="{{ old('direccion') }}" required autofocus />
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
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">

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
                                            name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                    </div>















                                </div>
                                    <div class="row col-12 d-flex mt-3 m-auto justify-content-around mb-0">



                                        <a  href="{{route('login')}}" type="submit" class="btn col-5 btn-danger text-white">
                                            {{ __('Cancelar') }}
                                        </a>


                                        <button type="submit" class="btn col-5 bg-warning text-white">
                                            {{ __('Register') }}
                                        </button>

                                    </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

</body>
