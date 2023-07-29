@php
    use \App\Http\Controllers\FormatController;
@endphp

@extends('layouts.app')

@section('content')
<x-header :isHomePage="$isHomePage" />
    <section>
        <div class="pxp-container">
            <div class="pxp-single-job-content pxp-has-columns">
                <div class="row">
                    @unless (empty($listing)) 
                    <div class="col-lg-7 col-xl-8 col-xxl-9">
                        <div class="pxp-single-job-cover pxp-cover" style="background-image: url({{ asset('storage/images/office-2.jpg') }})"></div>
                        <div class="pxp-single-job-cover-logo" 
                        style="background-image: url({{ asset('storage/images/' . ($listing->job_photo ? 'job_photos/' . $listing->job_photo : 'company-logo-2.png')) }})"></div>

                        <div class="row justify-content-between align-items-center mt-4 mt-lg-5">
                            <div class="col-xl-8 col-xxl-6">
                                <h1>{{ $listing->title }}</h1>
                                <div class="pxp-single-job-company-location">
                                    by <a href="single-company-1.html" class="pxp-single-job-company">Craftgenics</a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="pxp-single-job-options mt-4 col-xl-0">
                                    <button class="btn pxp-single-job-save-btn {{ $isSaved ? 'job-saved' : '' }}" id="save-listing" data-listing-id="{{ $listing->id }}">
                                        <span class="fa fa-bookmark-o"></span>
                                    </button>
                                    <div class="dropdown ms-2">
                                        <button class="btn pxp-single-job-share-btn dropdown-toggle" type="button" id="socialShareBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="fa fa-share-alt">
                                        </span></button>
                                        <ul class="dropdown-menu pxp-single-job-share-dropdown" aria-labelledby="socialShareBtn">
                                            <li><a class="dropdown-item" href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                                            <li><a class="dropdown-item" href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                                            <li><a class="dropdown-item" href="#"><span class="fa fa-pinterest"></span> Pinterest</a></li>
                                            <li><a class="dropdown-item" href="#"><span class="fa fa-linkedin"></span> LinkedIn</a></li>
                                        </ul>
                                    </div>
                                    <button 
                                        class="btn ms-2 pxp-single-job-apply-btn rounded-pill"
                                        data-bs-target="#applyListingFormMdl"
                                        data-bs-toggle="modal"
                                    >Apply Now</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 justify-content-between align-items-center">
                            <div class="col-6">
                                <a href="jobs-list-1.html" class="pxp-single-job-category">
                                    <div class="pxp-single-job-category-icon"><span class="fa fa-calendar-o"></span></div>
                                    <div class="pxp-single-job-category-label">{{ $listing->department }}</div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <div class="pxp-single-job-date pxp-text-light">{{ FormatController::timeRead($listing->created_at) }}</div>
                            </div>
                        </div>

                        <div class="pxp-single-job-content-details mt-4 mt-lg-5">
                            <h4>Overview</h4>
                            <p>{{ $listing->description }}</p>
                            <div class="mt-4">
                                <h4>Responsabilities</h4>
                                <ul>
                                    @forelse ($listing->responsibilities as $responsibility)
                                        <li>{{ $responsibility->content }}</li>
                                    @empty
                                        <li>No responsibility for this job.</li>
                                    @endforelse
                                    
                                    
                                </ul>
                            </div>
                            <div class="mt-4">
                                <h4>Requirements</h4>
                                <ul>
                                    @forelse ($listing->requirements as $requirement)
                                        <li>{{ $requirement->content }}</li>
                                    @empty
                                        <li>No requirement for this job.</li>
                                    @endforelse  
                                </ul>
                            </div>

                            <div class="mt-4 mt-lg-5">
                                <button href="#" 
                                    class="btn rounded-pill pxp-section-cta"
                                    data-bs-target="#applyListingFormMdl"
                                    data-bs-toggle="modal"
                                >Apply Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 col-xxl-3">
                        <x-company-info :companyProfile="$companyProfile" :info="$listing" />
                    </div>
                    @endunless
                </div>
            </div>
        </div>
    </section>

    {{-- show form for the application --}}
    <x-modal modal_id="applyListingFormMdl" modal_size="modal-lg">
        <div class="pxp-user-modal-fig text-center">
            <h5 class="modal-title text-center mt-4 text-capitalize">{{ $listing->title }}</h5>
            <div class="invalid-application-div"></div>
        </div>
        
        <form class="mt-4 row apply-form" id="applyListingForm" method="post" enctype="multipart/form-data">
            <h5 class="fs-6">My personal data</h5>
            <div class="form-floating mb-3 col-12 col-md-10 col-xl-6">
                <input type="text" class="form-control" 
                id="pxp-applyList-fname" placeholder="First name" name="first_name">
                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <label for="pxp-applyList-fname">First name</label>
            </div>
            <div class="form-floating mb-3 col-12 col-md-10 col-xl-6">
                <input type="text" class="form-control" id="pxp-applyList-lname" 
                placeholder="Last name" name="last_name">
                <label for="pxp-applyList-lname">Last name</label>
            </div>
            <div class="form-floating mb-3 col-12 col-md-10 col-xl-6">
                <input type="email" class="form-control" id="pxp-applyList-email"
                 placeholder="Email address" name="email">
                <label for="pxp-applyList-email">Email address</label>
            </div>
            <div class="form-floating mb-3 col-12 col-md-10 col-xl-6">
                <input type="number" class="form-control" id="pxp-applyList-phone" 
                placeholder="Phone number" maxlength="11" size="11" name="phone_number">
                <label for="pxp-applyList-phone">Phone number</label>
            </div>

            <h5 class="fs-6 mt-3">My professional background</h5>
            <div class="form-floating mb-3 col-12 col-md-10 col-xl-6">
                <input type="text" class="form-control" id="pxp-applyList-url" 
                placeholder="Personal URL to share" name="personal_url">
                <label for="pxp-applyList-url">Personal URL to share (<small>Portfolio, Linkedin profile...*</small>)</label>
            </div>
            
            <div class="pxp-upload-resume-cover pxp-candidate-cover mb-3 col-12 col-md-10 col-xl-6">
                <input type="file" id="pxp-upload-resume-cover-choose-file" 
                accept="application/pdf, .doc, .docx" name="resume">
                <label for="pxp-upload-resume-cover-choose-file" class="pxp-cover"><span>Upload resume (.pdf, .doc, .docx - 10MB max)</span></label>
            </div>
            <h5 class="fs-6 mt-3">Add a message</h5>
            <div class="form-floating mb-3 col-12">
                <textarea class="form-control pxp-smaller" id="pxp-applyList-work-about" 
                placeholder="Example: Cover letter" 
                style="height: 100px" name="message"
                ></textarea>
                <label for="pxp-applyList-message" class="form-label">Example: Cover letter</label>
            </div>
            <button class="btn rounded-pill pxp-modal-cta" id="applyListingFormBtn">Send my application</button>
            
        </form>
    </x-modal>
<x-footer />

@endsection('content')