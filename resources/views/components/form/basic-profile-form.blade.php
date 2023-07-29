@props(['user', 'user_type' => 'candidate'])

<form id="{{ $user_type }}ProfileForm" action="" method="POST" enctype="multipart/form-data">
    <div class="invalid-application-div"></div>
    <div class="row mt-4 mt-lg-5">
        <div class="col-xxl-8">
            <div class="mb-3">
                <label for="pxp-{{ $user_type }}-name" class="form-label">Name</label>
                <input type="text" id="pxp-{{ $user_type }}-name" 
                class="form-control"
                name="name" 
                value="{{ $user->name ?? '' }}"
                placeholder="Add your name">
            </div>
            @unless ($user_type == 'company')
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-title" class="form-label">Title</label>
                        <input type="text" id="pxp-{{ $user_type }}-title" class="form-control" 
                        name="title"
                        value="{{ $user->profile->title ?? '' }}"
                        placeholder="E.g. Web Designer">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-location" class="form-label">Location</label>
                        <input type="text" id="pxp-{{ $user_type }}-location" 
                        class="form-control" 
                        name="location"
                        value="{{ $user->profile->location ?? '' }}"
                        placeholder="E.g. San Francisco, CA">
                    </div>
                </div>
            </div>
            @endunless
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-email" class="form-label">Email</label>
                        <input type="email" id="pxp-{{ $user_type }}-email" class="form-control" 
                        name="email"
                        value="{{ $user->email ?? '' }}"
                        placeholder="{{ $user_type }}@email.com"
                        @if ($user_type == 'company')
                        @readonly(false)
                        @else
                        @readonly(true)
                        @endif />
                    </div>
                </div>
                @unless ($user_type == 'company')
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-username" class="form-label">Username</label>
                        <input type="text" id="pxp-{{ $user_type }}-username" class="form-control" 
                        name="username"
                        value="{{ $user->username ?? '' }}"
                        placeholder="Username"
                        @readonly(true) />
                    </div>
                </div>
                @endunless
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-phone" class="form-label">Phone</label>
                        <input type="number" id="pxp-{{ $user_type }}-phone" class="form-control" 
                        name="phone"
                        value="{{ $user_type == 'company' ? $user->phone ?? '' : $user->profile->phone ?? '' }}"
                        placeholder="(+12) 345 6789">
                    </div>
                </div>
                @unless ($user_type == 'company')
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="pxp-{{ $user_type }}-gender" class="form-label">Gender</label>
                        <select id="pxp-cadidate-gender" name="gender" class="form-select">
                            <option @disabled(true)>Select Gender</option>
                            <option {{ $user->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                            <option {{ $user->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                        </select>
                    </div>
                </div>
                @endunless

                @if ($user_type == 'company')
                <div class="mb-3">
                    <label for="pxp-company-website" class="form-label">Website</label>
                    <input type="url" id="pxp-company-website" class="form-control" 
                        name="website"
                        value="{{ $user->website }}"
                        placeholder="https://company.io">
                </div>
                @endif
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="form-label">&nbsp;</div>
            <div class="pxp-candidate-cover mb-3">
                <input type="file" id="pxp-candidate-cover-choose-file" 
                name="cover_photo"
                accept="image/*">
                <label for="pxp-candidate-cover-choose-file" class="pxp-cover"><span>Upload Cover Image</span></label>
            </div>
            <div class="pxp-candidate-photo mb-3">
                <input type="file" id="pxp-candidate-photo-choose-file" 
                name="photo"
                accept="image/*">
                <label for="pxp-candidate-photo-choose-file" class="pxp-cover"><span>Upload<br>Photo</span></label>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="pxp-{{ $user_type }}-about" class="form-label">About {{ $user_type == 'company' ? 'the company' : 'you' }}</label>
        <textarea class="form-control" id="pxp-{{ $user_type }}-about" 
        name="about"
        placeholder="Type your info here...">{{ $user_type == 'company' ? $user->about ?? '' : $user->profile->about ?? '' }}</textarea>
    </div>

    {{ $slot }}

    <x-form.save-button :button_id="$user_type . 'ProfileFormBtn'" />
</form>