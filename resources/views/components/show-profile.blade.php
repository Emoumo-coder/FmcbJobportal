@props(['user', 'isHomePage']);

@extends('layouts.app')

@section('content')
<x-header :isHomePage="$isHomePage" />
    <section>
        <div class="pxp-container">
            <div class="pxp-single-candidate-container pxp-has-columns">
                <div class="row">
                    <div class="col-lg-7 col-xl-8 col-xxl-9">
                        <div class="pxp-single-candidate-hero pxp-cover pxp-boxed" 
                        style="background-image: url({{ asset('storage/images/cover_photos/' . ($user->profile && $user->profile->cover_photo ? $user->profile->cover_photo : 'candidate-cover-1.jpg')) }});">
                            <div class="pxp-hero-opacity"></div>
                            <div class="pxp-single-candidate-hero-caption">
                                <div class="pxp-container">
                                    <div class="pxp-single-candidate-hero-content">
                                        <div class="pxp-single-candidate-hero-avatar" 
                                        style="
                                        background-image: url({{ asset('storage/images/profile_photos/' . ($user->profile && $user->profile->photo ? $user->profile->photo : ($user->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"
                                        ></div>
                                        <div class="pxp-single-candidate-hero-name">
                                            <h1>{{ $user->name }}</h1>
                                            <div class="pxp-single-candidate-hero-title">{{ $user->profile ? Str::title($user->profile->title??"") : "" }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="mt-4 mt-lg-5">
                            <div class="pxp-single-candidate-content">
                                <h2>About {{ Str::ucfirst($user->username) }}</h2>
                                <p>{{ $user->profile ? Str::ucfirst($user->profile->about??"") : "" }}</p>
                                {{ $slot }}
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-5 col-xl-4 col-xxl-3">
                        <div class="pxp-single-candidate-side-panel mt-5 mt-lg-0">
                            <div>
                                <div class="pxp-single-candidate-side-info-label pxp-text-light">Email</div>
                                <div class="pxp-single-candidate-side-info-data">{{ $user->email }}</div>
                            </div>
                            <div class="mt-4">
                                <div class="pxp-single-candidate-side-info-label pxp-text-light">Location</div>
                                <div class="pxp-single-candidate-side-info-data">{{ $user->profile ? $user->profile->location : '' }}</div>
                            </div>
                            <div class="mt-4">
                                <div class="pxp-single-candidate-side-info-label pxp-text-light">Phone</div>
                                <div class="pxp-single-candidate-side-info-data">{{ $user->profile ? $user->profile->phone : '' }}</div>
                            </div>
                        </div>

                        <div class="pxp-single-candidate-side-panel mt-4 mt-lg-5">
                            <h3>Contact {{ $user->username }}</h3>
                            
                            <x-contact-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<x-footer />

@endsection('content')