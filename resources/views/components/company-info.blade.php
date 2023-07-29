@php
    use App\Http\Controllers\FormatController;
@endphp
@props(['type' => 'job', 'info', 'companyProfile' => null])
@if ($type == 'job')
<div class="pxp-single-job-side-panel mt-5 mt-lg-0">
    <div>
        <div class="pxp-single-job-side-info-label pxp-text-light">Experience</div>
        <div class="pxp-single-job-side-info-data">Minimum {{ $info->job_experience }} year</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-job-side-info-label pxp-text-light">Work Level</div>
        <div class="pxp-single-job-side-info-data">{{ $info->job_level }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-job-side-info-label pxp-text-light">Employment Type</div>
        <div class="pxp-single-job-side-info-data">{{ $info->employment_type }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-job-side-info-label pxp-text-light">Salary</div>
        <div class="pxp-single-job-side-info-data">${{ $info->salary }} / year</div>
    </div>
</div>
@endif

@php
    if ($type == 'company') {
        $location = FormatController::location($info->city, $info->country);
    }else {
        $location = FormatController::location($companyProfile->city, $companyProfile->country);
    }
@endphp

<div class="mt-{{ $type == 'job' ? '3' : '5' }} mt-lg-{{ $type == 'job' ? '4' : '0' }} pxp-single-{{ $type }}-side-panel">
    @if ($type == 'job')
    <div class="pxp-single-job-side-company">
        <div class="pxp-single-job-side-company-logo pxp-cover" style="background-image: url(images/company-logo-2.png);"></div>
        <div class="pxp-single-job-side-company-profile">
            <div class="pxp-single-job-side-company-name">Craftgenics</div>
            <a href="single-company-1.html">View profile</a>
        </div>
    </div>
    @endif
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Industry</div>
        <div class="pxp-single-{{ $type }}-side-info-data">
            {{ $type == 'company' ? $info->industry : $companyProfile->industry }}
        </div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Company size</div>
        <div class="pxp-single-{{ $type }}-side-info-data">
            {{ $type == 'company' ? $info->size : $companyProfile->size }}
        </div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Founded in</div>
        <div class="pxp-single-{{ $type }}-side-info-data">{{ $type == 'company' ? $info->founded : $companyProfile->founded }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Phone</div>
        <div class="pxp-single-{{ $type }}-side-info-data">{{ $info->phone }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Email</div>
        <div class="pxp-single-{{ $type }}-side-info-data">{{ $info->email }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Location</div>
        <div class="pxp-single-{{ $type }}-side-info-data">{{ $location }}</div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-label pxp-text-light">Website</div>
        <div class="pxp-single-{{ $type }}-side-info-data">
            <a href="{{ $type == 'company' ? $info->website : $companyProfile->website }}">
                {{ $type == 'company' ? $info->website : $companyProfile->website }}
            </a>
        </div>
    </div>
    <div class="mt-4">
        <div class="pxp-single-{{ $type }}-side-info-data">
            <ul class="list-unstyled pxp-single-{{ $type }}-side-info-social">
                <li>
                    <a href="{{ $type == 'company' ? $info->facebook_link : $companyProfile->facebook_link }}">
                        <span class="fa fa-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ $type == 'company' ? $info->twitter_link : $companyProfile->twitter_link }}">
                        <span class="fa fa-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ $type == 'company' ? $info->instagram_link : $companyProfile->instagram_link }}">
                        <span class="fa fa-instagram"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ $type == 'company' ? $info->linkedin_link : $companyProfile->linkedin_link }}">
                        <span class="fa fa-linkedin"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>