@extends('layouts.app')
@section('title', __('Cambiar Contraseña'))

<div class="container-fluid h-100 inicio  m-auto">
    <div class="row d-flex  justify-content-center align-content-center  ">
        <div class="col-md-4">
            <div class="card col-md-12  mt-4">
              
                <div class="card-body  d-flex aling-items-center flex-column justify-content-center">
                    
                  
                                
                                
                              
                              <div class="col-md-12">
                                
            <div class="card">
              

                <div class="card-body">
                    <div class="card-header text-white bg-primary text-center">{{ __('Reset Password') }}</div>

                    <div class="col-12 d-flex justify-content-center">
                        <img class="rounded-circle " height="70px" src="{{ asset ('img/escudo-colegio-nombre.png') }} "alt="Escudo  Colegio" >
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center  mt-4">
                            
                                <button type="submit" class="btn col-8 mb-3 bi bi-envelope  text-white btn-warning">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            

                                <a  href="{{route('login')}}" type="submit" class="btn col-8 bi bi-reply-fill  text-white btn-danger">
                                    {{ __('Volver') }}
                                </a>
                            
                        </div>
                    </form>
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

