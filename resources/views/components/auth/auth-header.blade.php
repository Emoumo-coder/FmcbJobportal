<div class="pxp-dashboard-content-header">
    <div class="pxp-nav-trigger navbar pxp-is-dashboard d-lg-none">
        <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
            <div class="pxp-line-1"></div>
            <div class="pxp-line-2"></div>
            <div class="pxp-line-3"></div>
        </a>
        <div class="offcanvas offcanvas-start pxp-nav-mobile-container pxp-is-dashboard" tabindex="-1"
            id="pxpMobileNav">
            <div class="offcanvas-header">
                @include('partials.__head-logo')
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="pxp-nav-mobile">
                    <x-auth.sidebar-links 
                        class="navbar-nav justify-content-end flex-grow-1"
                        viewType="mobile"
                     />
                </nav>
            </div>
        </div>
    </div>
    <nav class="pxp-user-nav pxp-on-light">
        <a href="company-dashboard-new-job.html" class="btn rounded-pill pxp-nav-btn">Post a Job</a>
        <div class="dropdown pxp-user-nav-dropdown pxp-user-notifications">
            <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                <span class="fa fa-bell-o"></span>
                <div class="pxp-user-notifications-counter">5</div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Scott
                            Goodwin</strong> applied for <strong>Software Engineer</strong>. <span
                            class="pxp-is-time">20m</span></a></li>
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Alayna
                            Becker</strong> sent you a message. <span class="pxp-is-time">1h</span></a></li>
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Erika
                            Tillman</strong> applied for <strong>Team Leader</strong>. <span
                            class="pxp-is-time">2h</span></a></li>
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Scott
                            Goodwin</strong> applied for <strong>Software Engineer</strong>. <span
                            class="pxp-is-time">5h</span></a></li>
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Alayna
                            Becker</strong> sent you a message. <span class="pxp-is-time">1d</span></a></li>
                <li><a class="dropdown-item" href="company-dashboard-notifications.html"><strong>Erika
                            Tillman</strong> applied for <strong>Software Engineer</strong>. <span
                            class="pxp-is-time">3d</span></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item pxp-link" href="company-dashboard-notifications.html">Read All</a>
                </li>
            </ul>
        </div>
        <div class="dropdown pxp-user-nav-dropdown">
            <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                <div class="pxp-user-nav-avatar pxp-cover"
                    style="background-image: url({{ asset('storage/images/profile_photos/' . (auth()->user()->profile && auth()->user()->profile->photo ? auth()->user()->profile->photo : (auth()->user()->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"></div>
                <div class="pxp-user-nav-name d-none d-md-block">{{ Auth::user()->name }}</div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('candidate.profile.edit') }}">Edit profile</a></li>
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
    </nav>
</div>