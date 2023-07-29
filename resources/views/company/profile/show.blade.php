@php
    use App\Http\Controllers\FormatController;
@endphp
@extends('layouts.app')

@section('content')
<x-header :isHomePage="$isHomePage" />

    <section class="pxp-single-company-hero pxp-cover" 
    style="background-image: url({{ asset('storage/images/company/cover_photos/'. $profile->cover_photo ) }});">
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-single-company-hero-caption">
            <div class="pxp-container">
                <div class="pxp-single-company-hero-content">
                    <div class="pxp-single-company-hero-logo" 
                    style="background-image: url({{ asset('storage/images/company/profile_photos/'. $profile->photo ) }});"></div>
                    <div class="pxp-single-company-hero-title">
                        <h1>{{ $profile->name }}</h1>
                        <div class="pxp-single-company-hero-location"><span class="fa fa-globe">
                            </span>{{ FormatController::location($profile->city, $profile->country) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-100">
        <div class="pxp-container">
            <div class="row">
                <div class="col-lg-7 col-xl-8 col-xxl-9">
                    <div class="pxp-single-company-content">
                        <h2>About {{ config('app.name', 'fmcbjobport') }}</h2>
                        <p>{{ $profile->about }}</p>

                        <div class="pxp-single-company-gallery mt-3 mt-lg-4">
                            <div class="row">
                            
                                @foreach ($galleries as $index => $gallery)
                                    @if ($index === 0 || $index === 2)
                                    <div class="col-md-6 col-lg-12 col-xl-6 col-xxl-3">
                                    @elseif ($index === 3)
                                    <div class="col-xl-12 col-xxl-6">
                                    @elseif ($index === 4)
                                    <div class="row">
                                    @endif
                                    @if ($index > 3)
                                        <div class="col-6">
                                    @endif
                                    
                                        <a href="{{ url('storage/images/galleries/' . $gallery->photo) }}" class="pxp-single-company-gallery-item {{ $index === 2 ? 'pxp-is-tall' : '' }}">
                                            <div class="pxp-single-company-gallery-item-fig pxp-cover" style="background-image: url({{ asset('storage/images/galleries/' . $gallery->photo) }});"></div>
                                            <div class="pxp-single-company-gallery-item-caption">{{ $gallery->caption }}</div>
                                        </a>
                                    @if ($index > 3)
                                        </div>
                                    @endif
                                    @if ($index === 5)   
                                            </div>
                                    @endif
                                    @if ($index === 1 || $index === 2 || $index === 5)
                                    </div>
                                    
                                    @endif
                                @endforeach
                            </div>
                            
                        </div>

                        <div class="mt-4 mt-lg-5">
                            <p>{{ $profile->overview }}</p>
                        </div>

                        <div class="mt-4 mt-lg-5">
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <iframe src="{{ $profile->youtube_link }}" title="YouTube video player" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-5 mt-3 mt-md-0">
                                    <p>{{ $profile->youtube_link_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 col-xxl-3">
                    <x-company-info type="company" :info="$profile" />

                    <div class="pxp-single-company-side-panel mt-4 mt-lg-5">
                        <h3>Contact Company</h3>
                        
                        <x-contact-form />
                    </div>
                </div>
            </div>
        </div>
    </section>
<x-footer />

@endsection('content')