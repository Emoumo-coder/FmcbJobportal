@extends('layouts.app')

@section('content')

    <x-header :isHomePage="$isHomePage" />

        <section class="pxp-hero pxp-hero-bg pxp-cover" style="background-image: url(images/hero-bg-2.jpg);">
            <div class="pxp-hero-opacity"></div>
            <div class="pxp-hero-caption">
                <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-9 col-xxl-8">
                            <h1 class="text-white text-center">Find the right job for you</h1>

                            <x-search-listings class="mt-4 mt-lg-5" />

                            <div class="pxp-hero-subtitle text-white text-center mt-3 mt-lg-4">Search your career opportunity through <strong>12,800</strong> jobs</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About us section -->
        <x-sectioncontainer>
                <div class="row justify-content-between align-items-center mt-4 mt-md-5">
                    <div class="col-lg-7 col-xxl-5">
                        <div class="pxp-info-fig pxp-animate-in pxp-animate-in-right">
                            <div class="pxp-info-fig-image pxp-cover" style="background-image: url(images/company-hero-3.jpg);"></div>
                            
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-7">
                        <div class="pxp-info-caption pxp-animate-in pxp-animate-in-top mt-4 mt-sm-5 mt-lg-0">
                            <h2 class="pxp-section-h2">About us</h2>
                            <p class="pxp-text-light">The company is headquartered near Beaverton, Oregon, in the Portland metropolitan area.[3] It is the world's largest supplier of athletic shoes and apparel and a major manufacturer of sports equipment, with revenue in excess of US$37.4 billion in its fiscal year 2020 (ending May 31, 2020).[4] As of 2020, it employed 76,700 people worldwide.[5] In 2020 the brand alone was valued in excess of $32 billion, making it the most valuable brand among sports businesses.[6] Previously, in 2017, the Artistre Studio brand was valued at $29.6 billion.[7] Artistre Studio ranked 89th in the 2018 Fortune 500 list of the largest United States corporations by total revenue.[8]</p>
                            <div class="pxp-info-caption-list">
                                <div class="pxp-info-caption-list-item">
                                    <img src="images/check.svg" alt="-"><span>Bring to the table win-win survival</span>
                                </div>
                                <div class="pxp-info-caption-list-item">
                                    <img src="images/check.svg" alt="-"><span>Capitalize on low hanging fruit to identify</span>
                                </div>
                                <div class="pxp-info-caption-list-item">
                                    <img src="images/check.svg" alt="-"><span>But I must explain to you how all this</span>
                                </div>
                            </div>
                            <div class="pxp-info-caption-cta">
                                <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">Get Started Now<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
        </x-sectioncontainer>
        <!-- !About us section -->        

        <x-sectioncontainer>
                <h2 class="pxp-section-h2 text-center">Search by Department</h2>
                <p class="pxp-text-light text-center">View our job listings by department.</p>

                <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top">
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-pie-chart"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Business Development</div>
                            <div class="pxp-categories-card-2-subtitle">139 open positions</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-bullhorn"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Marketing & Communication</div>
                            <div class="pxp-categories-card-2-subtitle">366 open positions</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-address-card-o"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Human Resources</div>
                            <div class="pxp-categories-card-2-subtitle">435 open positions</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-calendar-o"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Project Management</div>
                            <div class="pxp-categories-card-2-subtitle">324 open positions</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-comments-o"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Customer Service</div>
                            <div class="pxp-categories-card-2-subtitle">39 open positions</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 col-xxl-2 pxp-categories-card-2-container">
                        <a href="jobs-list-1.html" class="pxp-categories-card-2">
                            <div class="pxp-categories-card-2-icon-container">
                                <div class="pxp-categories-card-2-icon">
                                    <span class="fa fa-terminal"></span>
                                </div>
                            </div>
                            <div class="pxp-categories-card-2-title">Software Engineering</div>
                            <div class="pxp-categories-card-2-subtitle">439 open positions</div>
                        </a>
                    </div>
                </div>

                <div class="mt-4 mt-md-5 text-center pxp-animate-in pxp-animate-in-top">
                    <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">All Categories<span class="fa fa-angle-right"></span></a>
                </div>
        </x-sectioncontainer>

        <!-- featured job offer section -->
        <x-sectioncontainer>
                <h2 class="pxp-section-h2 text-center">Featured Job Offers</h2>
                <p class="pxp-text-light text-center">Search your career opportunity through 12,800 jobs</p>

                <div class="loader"></div>
                <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top listing-container">
                    
                </div>

                <div class="mt-4 mt-md-5 text-center pxp-animate-in pxp-animate-in-top">
                    <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta-o">All Job Offers<span class="fa fa-angle-right"></span></a>
                </div>
        </x-sectioncontainer>
        <!-- featured job offer section -->

        

        <x-sectioncontainer>
                <div class="pxp-promo-img pxp-cover pt-100 pb-100 pxp-animate-in pxp-animate-in-top" style="background-image: url(images/promo-img-bg.jpg);">
                    <div class="row">
                        <div class="col-sm-7 col-lg-5">
                            <h2 class="pxp-section-h2">See right away whether candidates are the right fit</h2>
                            <p class="pxp-text-light">We help candidates know whether they’re qualified for a job – and allow you to see their match potential – giving you a better pool of qualified candidates to choose from.</p>
                            <div class="mt-4 mt-md-5">
                                <a href="jobs-list-1.html" class="btn rounded-pill pxp-section-cta">All Job Offers<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
        </x-sectioncontainer>
    <x-footer />
        <script src="{{ asset('storage/js/index.js') }}"></script>
@endsection('content')