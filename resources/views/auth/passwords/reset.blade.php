@extends('layouts.app')


<div class="container-fluid h-100 inicio  m-auto">
    <div class="row d-flex  justify-content-center align-content-center  ">
        <div class="col-md-4">
            <div class="card col-md-12  mt-4">
               

                <div class="card-body  d-flex aling-items-center flex-column justify-content-center">
                    
                    
                                
                                

                <div class="card-header text-center bg-primary text-white">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning bi bi-arrow-clockwise text-white">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
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































































































