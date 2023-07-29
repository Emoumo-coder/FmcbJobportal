@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <h1>Edit Profile</h1>
            <p class="pxp-text-light">Edit your company profile page info.</p>
            
            <x-form.basic-profile-form :user="$profile" user_type="company">

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pxp-company-industry" class="form-label">Industry</label>
                            <input type="text" id="pxp-company-industry" class="form-control"
                                name="industry"
                                value="{{ $profile->industry }}"
                                placeholder="E.g. Software" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pxp-company-founded" class="form-label">Founded in</label>
                            <input type="text" id="pxp-company-founded" class="form-control"
                                name="founded"
                                value="{{ $profile->founded }}"
                                 placeholder="E.g. 2001">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pxp-company-size" class="form-label">Company size</label>
                            <select id="pxp-company-size" class="form-select" name="size">
                                <option value="50 employees" {{ $profile->size == '50 employees' ? 'selected' : '' }}>&lt; 50 employees</option>
                                <option value="50 - 100 employees" {{ $profile->size == '50 - 100 employees' ? 'selected' : '' }}>50 - 100 employees</option>
                                <option value="100 - 150 employees"  {{ $profile->size == '100 - 150 employees' ? 'selected' : '' }}>100 - 150 employees</option>
                                <option value="150 - 200 employees"  {{ $profile->size == '150 - 200 employees' ? 'selected' : '' }}>150 - 200 employees</option>
                                <option value="200 - 250 employees"  {{ $profile->size == '200 - 250 employees' ? 'selected' : '' }}>200 - 250 employees</option>
                                <option value="250 - 300 employees"  {{ $profile->size == '250 - 300 employees' ? 'selected' : '' }}>250 - 300 employees</option>
                                <option value="300 employees"  {{ $profile->size == '300 employees' ? 'selected' : '' }}>&gt; 300 employees</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mt-lg-5">
                    <h2>Company Location</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-country" class="form-label">Country/State</label>
                                <input type="text" id="pxp-company-country" class="form-control" 
                                    name="country"
                                    value="{{ $profile->country }}"
                                    placeholder="E.g. United States, CA" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-city" class="form-label">City</label>
                                <input type="text" id="pxp-company-city" class="form-control" 
                                    name="city"
                                    value="{{ $profile->city }}"
                                    placeholder="E.g. San Francisco" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pxp-company-address" class="form-label">Address</label>
                        <input type="text" id="pxp-company-address" class="form-control" 
                            name="address"
                            value="{{ $profile->address }}"
                            placeholder="Type full address here..." />
                    </div>
                </div>

                <div class="mt-4 mt-lg-5">
                    <h2>Social Media</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-facebook" class="form-label">Facebook</label>
                                <input type="url" id="pxp-company-facebook" class="form-control" 
                                name="facebook_link"
                                value="{{ $profile->facebook_link }}"
                                placeholder="https://facebook.com/company" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-twitter" class="form-label">Twitter</label>
                                <input type="url" id="pxp-company-twitter" class="form-control" 
                                    name="twitter_link"
                                    value="{{ $profile->twitter_link }}"
                                    placeholder="https://twitter.com/company" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-instagram" class="form-label">Instagram</label>
                                <input type="url" id="pxp-company-instagram" class="form-control" 
                                    name="instagram_link"
                                    value="{{ $profile->instagram_link }}"
                                    placeholder="https://instagram.com/company" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pxp-company-linkedin" class="form-label">Linkedin</label>
                                <input type="url" id="pxp-company-linkedin" class="form-control" 
                                    name="linkedin_link"
                                    value="{{ $profile->linkedin_link }}"
                                    placeholder="https://linkedin.com/company" />
                            </div>
                        </div>
                    </div>
                </div>

            </x-form.basic-profile-form>

            <form id="companyProfileGalleryForm">
                <div class="mt-4 mt-lg-5">
                    <h2>Company Profile Gallery</h2>

                    <div class="row gallery-container">
                        @unless (empty($galleries))
                            @forelse ($galleries as $key => $gallery)
                            @php
                                $key++
                            @endphp

                            <div class="row align-items-center gallery-item">
                                <div class="col-md-6">
                                    <div class="pxp-gallery-cover mb-3">
                                        <input type="file" 
                                        id="pxp-gallery-cover-{{ $key }}-choose-file" 
                                        class="gallery-item-file"
                                        data-gallery-id="{{ $gallery->id }}"
                                        accept="image/*">
                                        <label 
                                        for="pxp-gallery-cover-{{ $key }}-choose-file" 
                                        style="background-image: url('{{ asset('storage/images/galleries/'. $gallery->photo) }}')"
                                        class="pxp-cover"></label>
                                        
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex">
                                        <input type="url" 
                                        class="form-control w-90 caption-input" 
                                        value="{{ $gallery->caption }}"
                                            data-gallery-id="{{ $gallery->id }}"
                                            placeholder="Caption">
                                        <button 
                                        class="btn {{ $gallery->disabled ? 'btn-success' : 'btn-warning' }} disable-btn w-10 ms-2 text-white"
                                        data-gallery-id="{{ $gallery->id }}"
                                        data-is-disabled="{{ $gallery->disabled }}"
                                        >{{ $gallery->disabled ? 'Enable' : 'Disable' }}</button>
                                    </div>
                                </div>
                                
                            </div>
                            @empty
                                
                            @endforelse
                        @endunless
                        
                    </div>
                </div>
            </form>

            {{-- More detail section --}}

            <form action="" id="moreDetailCompanyProfileForm" enctype="multipart/form-data">
                <div class="mt-4 mt-lg-5">
                    <h2>More Detail</h2>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="pxp-company-overview" class="form-label">Overview</label>
                                <textarea class="form-control" id="pxp-company-overview" 
                                name="overview"
                                placeholder="Type your info here...">{{ $profile->overview ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 d-flex align-items-center">
                            <div class="mb-3 w-100">
                                <label for="pxp-company-youtube-link" class="form-label">Youtube Link</label>
                                <input type="text" id="pxp-company-youtube-link" class="form-control" 
                                    name="youtube_link"
                                    value="{{ $profile->youtube_link ?? '' }}"
                                    placeholder="https://youtube.com/watch=3ks3sd%" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="pxp-company-youtube-link-description" class="form-label">Youtube Link Description</label>
                                <textarea class="form-control" id="pxp-company-youtube-link-description" 
                                name="youtube_link_description"
                                placeholder="Type your info here...">{{ $profile->youtube_link_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <x-form.save-button 
                button_id="moreDetailCompanyProfileFormBtn"
                text="Save Detail" />
            </form>

        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')

