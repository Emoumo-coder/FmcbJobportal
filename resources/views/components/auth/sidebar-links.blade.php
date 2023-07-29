@props(['class', 'viewType'])

<ul class="{{ $class }}">
    @if ($viewType == 'mobile')
        <li class="pxp-dropdown-header">Admin tools</li>
    @endif
    
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="{{ route('home') }}"><span
                class="fa fa-home"></span>Dashboard</a></li>
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="@can('isEmployer')
        {{ route('employer.profile.edit') }}
    @endcan
    @can('isUser')
        {{ route('candidate.profile.edit') }}
    @endcan"><span
                class="fa fa-pencil"></span>Edit Profile</a></li>
    @can('isAdmin')
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="{{ route('manage.company.profile.edit') }}"><span
                class="fa fa-heart"></span>Company Profile</a></li>
    @endcan
    @can('isUser')
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="{{ route('candidate.save-listing.index') }}"><span
                class="fa fa-heart"></span>Favourite Jobs</a></li>
    @endcan
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="
        @can('isEmployer')
            {{ route('listings.create') }}
        @endcan
        @can('isUser')
            {{ route('candidate.applications.index') }}
        @endcan
        "><span
                class="fa fa-file-text-o"></span>
                @can('isEmployer')
                New Job Offer
                @endcan
                @can('isUser')
                Applications
                @endcan
            </a></li>
    @can('isEmployer')
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="{{ route('listings.manage') }}"><span
                class="fa fa-briefcase"></span>Manage Jobs</a></li>
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="{{ route('employer.applications.index') }}"><span
                class="fa fa-user-circle-o"></span>Candidates</a></li>
    @endcan
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="company-dashboard-subscriptions.html"><span
                class="fa fa-credit-card"></span>Subscriptions</a></li>
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}"><a href="company-dashboard-password.html"><span
                class="fa fa-lock"></span>Change Password</a></li>
    @if ($viewType == 'desktop')
</ul>
<div class="pxp-dashboard-side-label mt-3 mt-lg-4">Insights</div>
<ul class="list-unstyled">
    @else
    <li class="pxp-dropdown-header mt-4">Insights</li>
    @endif

    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}">
        <a href="company-dashboard-inbox.html"
            class="d-flex justify-content-between align-items-center">
            <div><span class="fa fa-envelope-o"></span>Inbox</div>
            <span class="badge rounded-pill">14</span>
        </a>
    </li>
    <li class="{{ $viewType == 'mobile' ? 'nav-item' : '' }}">
        <a href="company-dashboard-notifications.html"
            class="d-flex justify-content-between align-items-center">
            <div><span class="fa fa-bell-o"></span>Notifications</div>
            <span class="badge rounded-pill">5</span>
        </a>
    </li>
</ul>
