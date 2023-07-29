@extends('layouts.app')

@section('content')
@php
    $isHomePage = false;
@endphp
<x-header :isHomePage="$isHomePage" />

    <section class="pxp-hero vh-100" style="background-color: var(--pxpMainColorLight);">
        <div class="row align-items-center pxp-sign-hero-container">
            <div class="col-xl-6 pxp-column">
                <div class="pxp-sign-hero-fig text-center pb-100 pt-100">
                    <img src="images/signup-big-fig.png" alt="Sign up">
                    <h1 class="mt-4 mt-lg-5">Sign In</h1>
                </div>
            </div>
            <div class="col-xl-6 pxp-column pxp-is-light">
                <div class="pxp-sign-hero-form pb-100 pt-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-xl-7 col-xxl-5">
                            <div class="pxp-sign-hero-form-content">
                                <h5 class="text-center">{{ __('Login') }}</h5>
                                <form class="mt-4" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control @error('email') is-invald @enderror" id="pxp-signup-page-email" placeholder="Email address"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        autofocus
                                        />
                                        <label for="pxp-signup-page-email">{{ __('Email Address') }}</label>
                                        <span class="fa fa-envelope-o"></span>
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invald @enderror" id="pxp-signup-page-password" placeholder="Create password" name="password" required
                                        />
                                        <label for="pxp-signup-page-password">{{ __('Password') }}</label>
                                        <span class="fa fa-lock"></span>
                                        @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn rounded-pill pxp-sign-hero-form-cta w-100">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <div class="mt-4 text-center pxp-sign-hero-form-small">
                                            Forgot Your Password? <a href="{{ route('password.request') }}">reset</a>
                                        </div>
                                    @endif
                                    <div class="mt-4 text-center pxp-sign-hero-form-small">
                                        New to {{ config('app.name') }}? <a href="{{ route('register') }}">Create an account</a>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
<x-footer />
@endsection
