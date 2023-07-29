@php
    use Illuminate\Support\Str;

    $currentRoute = request()->route()->getName();
    $startsWithCandidate = Str::startsWith($currentRoute, 'candidate');
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="pxp-root">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&amp;display=swap" rel="stylesheet">
        <link href="{{ asset('storage/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('storage/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/css/jquery.dataTables.min.css') }}">
        @livewireStyles
        <title>{{ config('app.name', 'fmcbjobport') }}</title>
    </head>
    <body 
    @unless (request()->route()->getName() == 'candidate.profile.show' || isset($noBackground))
    style="background-color: var(--{{ $startsWithCandidate ? 'pxpSecondaryColorLight' : 'pxpMainColorLight' }});"
    @endunless
    >
        <div class="pxp-preloader"><span>Loading...</span></div>
        

        @yield('content')


        <x-modal modal_id="unAuthorizedError">
            <h5 class="modal-title text-center mt-1" id="signinModal">You must register or log in to continue</h5>
            <form class="mt-3" action="{{ route('login') }}">
                <div class="mt-4 text-center pxp-modal-small">
                    <button class="btn w-100 rounded pxp-modal-cta" type="submit">Log in <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </x-modal>

        <div class="modal fade pxp-user-modal" id="pxp-signin-modal" aria-hidden="true" aria-labelledby="signinModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="pxp-user-modal-fig text-center">
                            <img src="images/signin-fig.png" alt="Sign in">
                        </div>
                        <h5 class="modal-title text-center mt-4" id="signinModal">Welcome back!</h5>
                        <form class="mt-4">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="pxp-signin-email" placeholder="Email address">
                                <label for="pxp-signin-email">Email address</label>
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="pxp-signin-password" placeholder="Password">
                                <label for="pxp-signin-password">Password</label>
                                <span class="fa fa-lock"></span>
                            </div>
                            <a href="#" class="btn rounded-pill pxp-modal-cta">Continue</a>
                            <div class="mt-4 text-center pxp-modal-small">
                                <a href="#" class="pxp-modal-link">Forgot password</a>
                            </div>
                            <div class="mt-4 text-center pxp-modal-small">
                                New to fmcbjob? <a role="button" class="" data-bs-target="#pxp-signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade pxp-user-modal" id="pxp-signup-modal" aria-hidden="true" aria-labelledby="signupModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="pxp-user-modal-fig text-center">
                            <img src="images/signup-fig.png" alt="Sign up">
                        </div>
                        <h5 class="modal-title text-center mt-4" id="signupModal">Create an account</h5>
                        <form class="mt-4">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="pxp-signup-email" placeholder="Email address">
                                <label for="pxp-signup-email">Email address</label>
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="pxp-signup-password" placeholder="Create password">
                                <label for="pxp-signup-password">Create password</label>
                                <span class="fa fa-lock"></span>
                            </div>
                            <a href="#" class="btn rounded-pill pxp-modal-cta">Continue</a>
                            <div class="mt-4 text-center pxp-modal-small">
                                Already have an account? <a role="button" class="" data-bs-target="#pxp-signin-modal" data-bs-toggle="modal">Sign in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        <script src="{{ asset('storage/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('storage/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('storage/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('storage/js/nav.js') }}"></script>
        <script src="{{ asset('storage/js/job.js') }}"></script>
        <script src="{{ asset('storage/js/main.js') }}"></script>
        <script src="{{ asset('storage/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('storage/js/ajax.js') }}"></script>
        <script src="{{ asset('storage/js/paginate.js') }}"></script>
        @yield('scripts')
        <x-flash-message />
    </body>
</html>