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
                    <h1 class="mt-4 mt-lg-5">Create an account</h1>
                </div>
            </div>
            <div class="col-xl-6 pxp-column pxp-is-light">
                <div class="pxp-sign-hero-form pb-100 pt-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-xl-7 col-xxl-5">
                            <div class="pxp-sign-hero-form-content">
                                <h5 class="text-center">{{ __('Sign Up') }}</h5>
                                <form class="mt-4" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invald @enderror" name="name" id="pxp-signup-page-fname" placeholder="Full name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        />
                                        <label for="pxp-signup-page-fname">{{ __('Full name') }}</label>
                                        <span class="fa fa-user-o"></span>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control @error('email') is-invald @enderror" id="pxp-signup-page-email" placeholder="Email address"
                                        value="{{ old('email') }}" required autocomplete="email"
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
                                        <input type="text" name="username" class="form-control @error('username') is-invald @enderror" id="pxp-signup-page-username" placeholder="username address"
                                        value="{{ old('username') }}" required autocomplete="username"
                                        />
                                        <label for="pxp-signup-page-username">{{ __('Username') }}</label>
                                        <span class="fa fa-id-badge"></span>
                                        @error('username')
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
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="pxp-signup-page-confirmpassword" placeholder="Confirm password" name="password_confirmation" required
                                        />
                                        <label for="pxp-signup-page-confirmpassword">{{ __('Confirm Password') }}</label>
                                        <span class="fa fa-lock"></span>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <select class="form-control @error('account_type') is-invalid @enderror" name="account_type" id="pxp-signup-page-accounttype" required>
                                            <option value="" selected disabled>Select Account Type</option>
                                            <option value="user" 
                                            {{ old('account_type') == 'user' ? 'selected' : '' }}
                                            >User</option>
                                            <option value="employer" 
                                            {{ old('account_type') == 'employer' ? 'selected' : '' }}
                                            >Employer</option>
                                        </select>
                                        <label for="pxp-signup-page-accounttype">{{ __('Account Type') }}</label>
                                        <span class="fa fa-user-circle"></span>
                                        @error('account_type')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="pxp-signup-page-gender" required>
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="male" 
                                            {{ old('gender') == 'male' ? 'selected' : '' }}
                                            >Male</option>
                                            <option value="female" 
                                            {{ old('gender') == 'female' ? 'selected' : '' }}
                                            >Female</option>
                                        </select>
                                        <label for="pxp-signup-page-gender">{{ __('Gender') }}</label>
                                        <span class="fa fa-transgender-alt"></span>
                                        @error('gender')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn rounded-pill pxp-sign-hero-form-cta w-100">
                                        {{ __('Register') }}
                                    </button>
                                    <div class="mt-4 text-center pxp-sign-hero-form-small">
                                        Already have an account? <a href="{{ route('login') }}">Sign in</a>
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
