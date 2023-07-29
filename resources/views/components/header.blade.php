@props(['isHomePage'])
<header class="pxp-header fixed-top {{ $isHomePage ? '' : 'pxp-no-bg' }}">
    
    <div class="pxp-container">
        <div class="pxp-header-container">
            @if($isHomePage)
            <div class="pxp-logo-nav-container">
            @endif
            @include('partials.__head-logo')
                <div class="pxp-nav-trigger {{  $isHomePage ? 'pxp-light' : ''  }} navbar d-xl-none flex-fill">
                    
                    
                    <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                        <div class="pxp-line-1"></div>
                        <div class="pxp-line-2"></div>
                        <div class="pxp-line-3"></div>
                    </a>
                    <div class="offcanvas offcanvas-start pxp-nav-mobile-container" tabindex="-1" id="pxpMobileNav">
                        <div class="offcanvas-header">
                            <div class="pxp-logo">
                                <a href="index.html" class="pxp-animate"><span style="color: var(--pxpMainColor)">j</span>obster</a>
                            </div>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <nav class="pxp-nav-mobile">
                                <ul class="navbar-nav justify-content-end flex-grow-1">
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Home</a>
                                        <ul class="dropdown-menu">
                                            <li class="pxp-dropdown-header">Home Page Versions</li>
                                            <li class="nav-item"><a href="index.html">Hero with Animated Cards</a></li>
                                            <li class="nav-item"><a href="index-2.html">Center Image Rotator Hero</a></li>
                                            <li class="nav-item"><a href="index-3.html">Hero with Illustration</a></li>
                                            <li class="nav-item"><a href="index-4.html">Boxed Hero with Animation</a></li>
                                            <li class="nav-item"><a href="index-5.html">Full Image Background Hero</a></li>
                                            <li class="nav-item"><a href="index-6.html">Full Image with Top Search</a></li>
                                            <li class="nav-item"><a href="index-7.html">Hero With Image Card</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Find Jobs</a>
                                        <ul class="dropdown-menu">
                                            <li class="pxp-dropdown-header">Job Listings</li>
                                            <li class="nav-item"><a href="jobs-list-1.html">Top Search with Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-2.html">Top Search with Small Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-3.html">Top Search with List</a></li>
                                            <li class="nav-item"><a href="jobs-list-4.html">Left Search with Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-5.html">Left Search with Small Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-6.html">Left Search with List</a></li>
                                            <li class="nav-item"><a href="jobs-list-7.html">No Sidebar with Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-8.html">No Sidebar with Small Cards</a></li>
                                            <li class="nav-item"><a href="jobs-list-9.html">No Sidebar with List</a></li>
                                            <li class="nav-item"><a href="jobs-list-10.html">Top Search with Card Details</a></li>
                                            <li class="pxp-dropdown-header">Single Job</li>
                                            <li class="nav-item"><a href="single-job-1.html">Wide Content</a></li>
                                            <li class="nav-item"><a href="single-job-2.html">Right Side Panel</a></li>
                                            <li class="nav-item"><a href="single-job-3.html">Center Boxed Content</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Companies</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item dropdown">
                                                <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Companies List</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="companies-list-1.html">Top Search</a></li>
                                                    <li class="nav-item"><a href="companies-list-2.html">Left Search Side Panel</a></li>
                                                    <li class="nav-item"><a href="companies-list-3.html">Top Search Light</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Single Company</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="single-company-1.html">Wide Content</a></li>
                                                    <li class="nav-item"><a href="single-company-2.html">Right Side Panel</a></li>
                                                    <li class="nav-item"><a href="single-company-3.html">Center Boxed Content</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="company-dashboard.html">Company Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Candidates</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item dropdown">
                                                <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Candidates List</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="candidates-list-1.html">Top Search</a></li>
                                                    <li class="nav-item"><a href="candidates-list-2.html">Left Search Side Panel</a></li>
                                                    <li class="nav-item"><a href="candidates-list-3.html">Top Search Light</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Single Candidate</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item"><a href="single-candidate-1.html">Wide Content</a></li>
                                                    <li class="nav-item"><a href="single-candidate-2.html">Right Side Panel</a></li>
                                                    <li class="nav-item"><a href="single-candidate-3.html">Center Boxed Content</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item"><a href="candidate-dashboard.html">Candidate Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="blog-list-1.html">Articles Cards</a></li>
                                            <li class="nav-item"><a href="blog-list-2.html">Articles List</a></li>
                                            <li class="nav-item"><a href="blog-list-3.html">Articles Boxed</a></li>
                                            <li class="nav-item"><a href="single-blog-post.html">Single Article</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                            <li class="nav-item"><a href="pricing.html">Pricing</a></li>
                                            <li class="nav-item"><a href="faqs.html">FAQs</a></li>
                                            <li class="nav-item"><a href="contact-us.html">Contact Us</a></li>
                                            <li class="nav-item"><a href="sign-in.html">Sign In</a></li>
                                            <li class="nav-item"><a href="sign-up.html">Sign Up</a></li>
                                            <li class="nav-item"><a href="404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <nav class="pxp-nav {{ $isHomePage ? 'pxp-light' : '' }} dropdown-hover-all d-none d-xl-block">
                    <ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Home</a>
                            <ul class="dropdown-menu">
                                <li class="pxp-dropdown-body">
                                    <div class="pxp-dropdown-layout">
                                        <div class="pxp-dropdown-header">Home Page Versions</div>
                                        <div class="row gx-5 pxp-dropdown-lists">
                                            <div class="col-auto pxp-dropdown-list">
                                                <ul>
                                                    <li>
                                                        <a href="index.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-1-nav-icon%402x.png" alt="Hero with Animated Cards">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Hero with Animated Cards
                                                                <span>Home page version 1</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index-2.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-2-nav-icon%402x.png" alt="Center Image Rotator Hero">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Center Image Rotator Hero
                                                                <span>Home page version 2</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index-3.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-3-nav-icon%402x.png" alt="Hero with Illustration">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Hero with Illustration
                                                                <span>Home page version 3</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index-4.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-4-nav-icon%402x.png" alt="Boxed Hero with Animation">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Boxed Hero with Animation
                                                                <span>Home page version 4</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-auto pxp-dropdown-list">
                                                <ul>
                                                    <li>
                                                        <a href="index-5.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-5-nav-icon%402x.png" alt="Full Image Background Hero">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Full Image Background Hero
                                                                <span>Home page version 5</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index-6.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-6-nav-icon%402x.png" alt="Full Image with Top Search">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Full Image with Top Search
                                                                <span>Home page version 6</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index-7.html" class="pxp-has-icon">
                                                            <div class="pxp-dropdown-icon">
                                                                <img src="images/index-7-nav-icon%402x.png" alt="Hero With Image Card">
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Hero With Image Card
                                                                <span>Home page version 7</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Find Jobs</a>
                            <ul class="dropdown-menu">
                                <li class="pxp-dropdown-body">
                                    <div class="pxp-dropdown-layout">
                                        <div class="row gx-5 pxp-dropdown-lists">
                                            <div class="col-auto pxp-dropdown-list">
                                                <div class="pxp-dropdown-header">Job Listings</div>
                                                <ul>
                                                    <li>
                                                        <a href="jobs-list-1.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th-large"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Top Search with Cards
                                                                <span>Jobs listing version 1</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-2.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Top Search with Small Cards
                                                                <span>Jobs listing version 2</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-3.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th-list"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Top Search with List
                                                                <span>Jobs listing version 3</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-4.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-toggle-right"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Left Search with Cards
                                                                <span>Jobs listing version 4</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-5.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-list-ul"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Left Search with Small Cards
                                                                <span>Jobs listing version 5</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="pxp-dropdown-header mt-3">Single Job</div>
                                                <ul>
                                                    <li>
                                                        <a href="single-job-1.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-align-justify"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Wide Content
                                                                <span>Single job version 1</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="single-job-2.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-dedent"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Right Side Panel
                                                                <span>Single job version 2</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-auto pxp-dropdown-list">
                                                <div class="pxp-dropdown-header">&nbsp;</div>
                                                <ul>
                                                    <li>
                                                        <a href="jobs-list-6.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-indent"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Left Search with List
                                                                <span>Jobs listing version 6</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-7.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th-large"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                No Sidebar with Cards
                                                                <span>Jobs listing version 7</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-8.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                No Sidebar with Small Cards
                                                                <span>Jobs listing version 8</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-9.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-th-list"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                No Sidebar with List
                                                                <span>Jobs listing version 9</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="jobs-list-10.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-list-alt"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Top Search with Card Details
                                                                <span>Jobs listing version 10</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="pxp-dropdown-header mt-3">&nbsp;</div>
                                                <ul>
                                                    
                                                    
                                                    <li>
                                                        <a href="single-job-3.html" class="pxp-has-icon-small">
                                                            <div class="pxp-dropdown-icon">
                                                                <span class="fa fa-align-center"></span>
                                                            </div>
                                                            <div class="pxp-dropdown-text">
                                                                Center Boxed Content
                                                                <span>Single job version 3</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Companies</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-th-large"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Companies List
                                            <span>List of companies versions</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="companies-list-1.html">
                                                <div class="pxp-dropdown-text">
                                                    Top Search
                                                    <span>Companies list version 1</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="companies-list-2.html">
                                                <div class="pxp-dropdown-text">
                                                    Left Search Side Panel
                                                    <span>Companies list version 2</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="companies-list-3.html">
                                                <div class="pxp-dropdown-text">
                                                    Top Search Light
                                                    <span>Companies list version 3</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle pxp-has-icon-small" href="#" data-bs-toggle="dropdown">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-file-text-o"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Single Company
                                            <span>Company profile page versions</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="single-company-1.html">
                                                <div class="pxp-dropdown-text">
                                                    Wide Content
                                                    <span>Company profile version 1</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="single-company-2.html">
                                                <div class="pxp-dropdown-text">
                                                    Right Side Panel
                                                    <span>Company profile version 2</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="single-company-3.html">
                                                <div class="pxp-dropdown-text">
                                                    Center Boxed Content
                                                    <span>Company profile version 3</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="company-dashboard.html" class="pxp-has-icon-small">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-cogs"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Company Dashboard
                                            <span>Useful insights and settings</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Candidates</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-th-large"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Candidates List
                                            <span>List of candidates versions</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="candidates-list-1.html">
                                                <div class="pxp-dropdown-text">
                                                    Top Search
                                                    <span>Candidates list version 1</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="candidates-list-2.html">
                                                <div class="pxp-dropdown-text">
                                                    Left Search Side Panel
                                                    <span>Candidates list version 2</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="candidates-list-3.html">
                                                <div class="pxp-dropdown-text">
                                                    Top Search Light
                                                    <span>Candidates list version 3</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropend">
                                    <a class="dropdown-item dropdown-toggle pxp-has-icon-small" href="#" data-bs-toggle="dropdown">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-user-circle-o"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Single Candidate
                                            <span>Candidate profile page versions</span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="single-candidate-1.html">
                                                <div class="pxp-dropdown-text">
                                                    Wide Content
                                                    <span>Candidate profile version 1</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="single-candidate-2.html">
                                                <div class="pxp-dropdown-text">
                                                    Right Side Panel
                                                    <span>Candidate profile version 2</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="single-candidate-3.html">
                                                <div class="pxp-dropdown-text">
                                                    Center Boxed Content
                                                    <span>Candidate profile version 3</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="candidate-dashboard.html" class="pxp-has-icon-small">
                                        <div class="pxp-dropdown-icon">
                                            <span class="fa fa-cog"></span>
                                        </div>
                                        <div class="pxp-dropdown-text">
                                            Candidate Dashboard
                                            <span>Useful insights and settings</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="blog-list-1.html">Articles Cards</a></li>
                                <li><a class="dropdown-item" href="blog-list-2.html">Articles List</a></li>
                                <li><a class="dropdown-item" href="blog-list-3.html">Articles Boxed</a></li>
                                <li><a class="dropdown-item" href="single-blog-post.html">Single Article</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="about-us.html">About Us</a></li>
                                <li><a class="dropdown-item" href="pricing.html">Pricing</a></li>
                                <li><a class="dropdown-item" href="faqs.html">FAQs</a></li>
                                <li><a class="dropdown-item" href="contact-us.html">Contact Us</a></li>
                                <li><a class="dropdown-item" href="sign-in.html">Sign In</a></li>
                                <li><a class="dropdown-item" href="sign-up.html">Sign Up</a></li>
                                <li><a class="dropdown-item" href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            @if($isHomePage)
            </div>
            @endif

        
            <nav class="pxp-user-nav {{  $isHomePage ? 'd-none d-sm-flex' : 'pxp-on-light'  }}">
                @if (!Auth::check())
                    <a href="company-dashboard-new-job.html" class="btn rounded-pill pxp-nav-btn">Post a Job</a>
                    <a class="btn rounded-pill pxp-user-nav-trigger" data-bs-toggle="modal" href="#pxp-signin-modal" role="button">Sign in</a>
                
                @else
                    <a href="company-dashboard-new-job.html" class="btn rounded-pill pxp-nav-btn"> Job</a>
                    <div class="dropdown pxp-user-nav-dropdown">
                        <a href="index.html" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="pxp-user-nav-avatar pxp-cover" style="background-image: url(images/avatar-1.jpg);"></div>
                            <div class="pxp-user-nav-name d-none d-md-block">Derek Cotner</div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="candidate-dashboard-profile.html">Edit profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" 
                                    href="{{ route('logout') }}"  onclick="event.preventDefault(); 
                                    this.closest('form').submit();">{{ __('Log Out') }}</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
                
            </nav>
        </div>
    </div>
</header>