<div class="pxp-single-candidate-container pxp-has-columns mt-0">
    <div class="row">
        <div class="col-lg-12 col-xl-8 col-xxl-9">
            <div class="pxp-single-candidate-hero pxp-cover pxp-boxed" 
            style="background-image: url({{ asset('storage/images/cover_photos/' . ($application->user->profile && $application->user->profile->cover_photo ? $application->user->profile->cover_photo : 'candidate-cover-1.jpg')) }});">
                <div class="pxp-hero-opacity"></div>
                <div class="pxp-single-candidate-hero-caption">
                    <div class="pxp-container">
                        <div class="pxp-single-candidate-hero-content">
                            <div class="pxp-single-candidate-hero-avatar" style="background-image: url({{ asset('storage/images/profile_photos/' . ($application->user->profile && $application->user->profile->photo ? $application->user->profile->photo : ($application->user->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"></div>
                            <div class="pxp-single-candidate-hero-name">
                                <h1>{{ Str::title($application->first_name . ' ' .$application->last_name) }}</h1>
                                <div class="pxp-single-candidate-hero-title">{{ $application->user->profile->title }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="mt-4 mt-lg-5">
                <div class="pxp-single-candidate-content">

                    <div class="mt-4 mt-lg-5">
                        <h2>Application Details</h2>
                        <div class="pxp-single-candidate-timeline">
                            <x-timeline title="First Name" :value="Str::ucfirst($application->first_name)" />

                            <x-timeline title="Last Name" :value="Str::ucfirst($application->last_name)" />

                            @php
                                $email_link = "<a href='mailto:". $application->email ."'>
                                    ". $application->email ."</a>";
                            @endphp

                            <x-timeline title="Email" :value="$email_link" />

                            @php
                                $phone_link = "<a href='mailto:". $application->phone_number ."'>
                                    ". $application->phone_number ."</a>";
                            @endphp
                            <x-timeline title="Phone Number" :value="$phone_link" />

                            @php
                                $url_link = "<a href='". $application->personal_url ."
                                    target='_blank'>
                                    ". $application->personal_url ."</a>";
                            @endphp

                            <x-timeline title="Personal URL" :value="$url_link" />

                            <x-timeline title="Massage" 
                                    :value="$application->message" />
                            
                            @php
                                if ($application->status == 0)
                                {
                                    $status = "<span class='py-1 px-2 rounded bg-secondary text-white'>N/A</span>";
                                }elseif ($application->status == 1)
                                {
                                    $status = "<span class='py-1 px-2 rounded bg-success text-white'>Accepted</span>";
                                }else
                                {
                                    $status = "<span class='py-1 px-2 rounded bg-danger text-white'>Rejected</span>";
                                }
                            @endphp
                            <x-timeline title="Status" :value="$status" />

                            <x-timeline title="Date" :value="$application->created_at" />

                            @php
                                $resume_button = "<a href='" . asset('storage/' . $application->resume) . "' class='btn btn-primary'>Download Resume</a>";
                            @endphp

                            <x-timeline title="Resume" :value="$resume_button" />
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="col-lg-12 col-xl-4 col-xxl-3">

            <div class="pxp-single-candidate-side-panel mt-4 mt-lg-0">
                <h3>Contact {{ Str::ucfirst($application->user->username) }}</h3>
                <x-contact-form />
            </div>
        </div>
    </div>
</div>