@extends('layouts.app')

@section('content')
<x-header :isHomePage="$isHomePage" />
    <section class="pxp-page-header-simple" style="background-color: var(--pxpMainColorLight);">
        <div class="pxp-container">
            <h1>Search Jobs</h1>
            <div class="pxp-hero-subtitle pxp-text-ligh">Search your career opportunity through <strong>12,800</strong> jobs</div>
            
            <x-search-listings class="mt-3 mt-lg-4" class_attr="search-listing-form-btn" />
        </div>
    </section>

    <!-- Job listings section -->
    <x-sectioncontainer>
        <x-jobs.filter-job />
        
        <div class="loader"></div>
        <div class="m-0 p-0 listing-ajax-container">
            @include('partials.__listings_ajax')
        </div>

    </x-sectioncontainer>
    <!-- Job listings section -->
<x-footer />

@endsection('content')