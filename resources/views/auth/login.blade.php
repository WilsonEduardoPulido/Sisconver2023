@extends('layouts.app')
<link rel="icon" href=" {{ asset('img/lulogo_PLumita.svg') }} " type="image/x-icon">

<body class="inicio">
    

    <button type="button" class="  text-white btn btn-info bi bi-question-circle-fill" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on right">
        Ayuda <strong>sisconver2023@gmail.com</strong>
    </button>
<div class="container-fluid h-100   m-auto">
    
    
    <div class="row d-flex  justify-content-center align-content-center  ">
        <div class="col-md-4">
            <div class="card col-md-12  mt-4">

                <div class="card-body  d-flex aling-items-center flex-column justify-content-center">




                    <div class="col-md-12">
                        <div class="card-body">
                            @if (session('error'))


                            <div class="alert col-12 alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{session('error')}}</strong> 
                              </div>
                            
                            
                                
                            @endif
                            @if (session('cuentaCreada'))


                            <div class="alert col-12 alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{session('cuentaCreada')}}</strong> 
                              </div>
                            
                            
                                
                            @endif

@if (session('errorsancionado'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong> <p>{{session('errorsancionado')}}</p></strong> 
  </div>


    
@endif

                            <div class="card-header  text-center text-white bg-primary">
                                {{ __('Inicio de Sesion Colegio La Independencia') }}</div>
                            <div class="col-12 mt-4 d-flex justify-content-center">
                                <img class="rounded-circle "
                                    src="{{ asset('img/escudo-colegio-nombre.png') }} "alt="Escudo   Colegio" width="90px" height="100px">
                            </div>

                            <form method="POST" class="  bg-ligth  "action="{{ route('login') }}">
                                @csrf

                                <label for="email"
                                    class="col-md-12 m-auto col-form-label text-md-start">{{ __('Correo Electronico') }}</label>
                                <div class=" col-md-10 m-auto  ">


                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="password"
                                    class="col-md-10 m-auto col-form-label text-md-start">{{ __('Password') }}</label>

                                <div class="col-md-10 m-auto">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>




                        <div class="row mb-0   ">
                            <div class="col-md-12 flex-column d-flex justify-content-center aling-items-center  ">


                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning text-white mb-4 col-8">
                                        {{ __('Login') }}
                                    </button>
                                </div>


                                <div class="col-12 d-flex justify-content-center">
                                    <a class="btn btn-info text-white  col-8"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>


                                </div>



                                @if (Route::has('password.request'))
                                    <a class="btn  mt-2 btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    <script>
      var alertList = document.querySelectorAll('.alert');
      alertList.forEach(function (alert) {
        new bootstrap.Alert(alert)
      })
    </script>
    


</div>

