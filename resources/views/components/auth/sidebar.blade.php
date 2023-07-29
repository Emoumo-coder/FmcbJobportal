@php
    use Illuminate\Support\Str;

    $currentRoute = request()->route()->getName();
    $startsWithCandidate = Str::startsWith($currentRoute, 'candidate');
@endphp
<div class="pxp-dashboard-side-panel d-none d-lg-block">
    @include('partials.__head-logo')

    <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
        <div class="pxp-dashboard-side-label">Admin tools</div>
        <x-auth.sidebar-links 
            class="list-unstyled"
            viewType="desktop"
        />
    </nav>

    <nav class="pxp-dashboard-side-user-nav-container {{ $startsWithCandidate ? 'is-candidate' : '' }}">
        <div class="pxp-dashboard-side-user-nav">
            <div class="dropdown pxp-dashboard-side-user-nav-dropdown dropup">
                <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="pxp-dashboard-side-user-nav-avatar pxp-cover"
                        style="background-image: url({{ asset('storage/images/profile_photos/' . (auth()->user()->profile && auth()->user()->profile->photo ? auth()->user()->profile->photo : (auth()->user()->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"></div>
                    <div class="pxp-dashboard-side-user-nav-name">{{ auth()->user()->name }}</div>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="company-dashboard.html">Dashboard</a></li>
                    <li><a class="dropdown-item" href="company-dashboard-profile.html">Edit profile</a></li>
                    <li><a class="dropdown-item" href="index.html">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
