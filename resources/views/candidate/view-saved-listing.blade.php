@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    

            <div class="container-fluid mt-2">
                <div class="card saved-job-card">
                    <div class="card-header saved-job-card-header py-2 px-3">
                      <h2 class="text-white">Saved Jobs</h2>
                    </div>
                    <div class="card-body">
                        @foreach ($savedListings as $listing)
                        <div class="col-12 pxp-jobs-card-2-container saved-listing">
                            <div class="pxp-jobs-card-2 pxp-has-border">
                                <div class="pxp-jobs-card-2-top">
                                    <a href="/listings/{{ $listing->id }}" class="pxp-jobs-card-2-company-logo" style="background-image: url({{ asset('storage/images/company-logo-1.png') }});"></a>
                                    <div class="pxp-jobs-card-2-info d-flex flex-wrap align-items-center justfy-content-between w-100">
                                        <div class="col-9">
                                            <a href="/listings/{{ $listing->id }}" class="pxp-jobs-card-2-title">{{ $listing->title }}</a>
                                            Posted by <a href="single-company-1.html" class="pxp-jobs-card-2-company">{{ $listing->user->name }}</a>
                                        </div>
                                        <div class="col-3">
                                            <div class="m-3 mt-xxl-0 pxp-text-right">
                                                <a href="javascript:void()" class="btn rounded-pill pxp-card-btn remove-saved-listing" data-listing-id="{{ $listing->id }}">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxp-jobs-card-2-bottom">
                                    <a href="/listings?department={{ $listing->department }}" class="pxp-jobs-card-2-category">
                                        <div class="pxp-jobs-card-2-category-label">{{ $listing->department }}</div>
                                    </a>
                                    
                                    <a href="/listings?employment_type_filter={{ $listing->employment_type }}" class="pxp-jobs-card-2-category">
                                        <div class="pxp-jobs-card-2-category-label">
                                            {{ $listing->employment_type }}
                                        </div>
                                    </a>
                                    
                                    <div class="pxp-jobs-card-2-bottom-right">
                                        <span class="pxp-jobs-card-2-date pxp-text-light">{{ $listing->created_at_formatted }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>

            
    <x-auth.auth-footer />
</div>

@endsection('content')

