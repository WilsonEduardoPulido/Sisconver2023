

@extends('layouts.app')

<link rel="icon" href=" {{ asset('img/lulogo_PLumita.svg') }} " type="image/x-icon">
<div class="container-fluid h-100 inicio  m-auto">
    <div class="row d-flex  justify-content-center align-content-center  ">
        <div class="col-md-4">
            <div class="card col-md-12  mt-4">
               

                <div class="card-body  d-flex aling-items-center flex-column justify-content-center">
                    
                    
                                
                                

                <div class="card-header text-center">{{ __('Reset Password') }}</div>

                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
































































































