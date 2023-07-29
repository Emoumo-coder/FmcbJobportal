<div id="createSec1" class="create-section-container">
    <h1>{{ $mode === 'create' ? 'New Job Offer' : 'Edit Job Offer' }}</h1>
    <p class="pxp-text-light">{{ $mode === 'create' ? 'Add a new job to your company\'s jobs list.' : 'Edit your job offer details.' }}</p>
    <x-error-list />
    <div class="row mt-4 mt-lg-5">
        <div class="col-xxl-6">
            <div class="mb-3">
                <label for="pxp-company-job-title" class="form-label">Job title</label>
                <input type="text" name="title" id="pxp-company-job-title" class="form-control" placeholder="Add title" value="{{ old('title', $mode === 'edit' ? $listing->title : '') }}">
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="mb-3">
                <label for="pxp-company-job-department" class="form-label">Department</label>
                <select id="pxp-company-job-department" name="department" class="form-select">
                    <option>Select a category</option>
                    <option value="Marketing & Communication"{{ (old('department') == 'Marketing & Communication' || ($mode === 'edit' && $listing->department == 'Marketing & Communication')) ? ' selected' : '' }}>Marketing & Communication</option>
                    <option value="Software Engineering"{{ (old('department') == 'Software Engineering' || ($mode === 'edit' && $listing->department == 'Software Engineering')) ? ' selected' : '' }}>Software Engineering</option>
                    <option value="Project Management"{{ (old('department') == 'Project Management' || ($mode === 'edit' && $listing->department == 'Project Management')) ? ' selected' : '' }}>Project Management</option>
                    <option value="Finance"{{ (old('department') == 'Finance' || ($mode === 'edit' && $listing->department == 'Finance')) ? ' selected' : '' }}>Finance</option>
                    <option value="Retail"{{ (old('department') == 'Retail' || ($mode === 'edit' && $listing->department == 'Retail')) ? ' selected' : '' }}>Retail</option>
                    <option value="Sales"{{ (old('department') == 'Sales' || ($mode === 'edit' && $listing->department == 'Sales')) ? ' selected' : '' }}>Sales</option>
                    <option value="Manufacturing"{{ (old('department') == 'Manufacturing' || ($mode === 'edit' && $listing->department == 'Manufacturing')) ? ' selected' : '' }}>Manufacturing</option>
                    <option value="IT"{{ (old('department') == 'IT' || ($mode === 'edit' && $listing->department == 'IT')) ? ' selected' : '' }}>IT</option>
                    <option value="Business Development"{{ (old('department') == 'Business Development' || ($mode === 'edit' && $listing->department == 'Business Development')) ? ' selected' : '' }}>Business Development</option>
                    <option value="Human Resources"{{ (old('department') == 'Human Resources' || ($mode === 'edit' && $listing->department == 'Human Resources')) ? ' selected' : '' }}>Human Resources</option>
                    <option value="Customer Service"{{ (old('department') == 'Customer Service' || ($mode === 'edit' && $listing->department == 'Customer Service')) ? ' selected' : '' }}>Customer Service</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-email" class="form-label">Email</label>
                <input type="text" name="email" id="pxp-company-job-email" class="form-control"
                    placeholder="E.g. employsurgon@fmcb.org" value="{{ $mode === 'create' ? old('email') : $listing->email }}">
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-phone" class="form-label">Phone</label>
                <input type="number" name="phone" id="pxp-company-job-phone" class="form-control"
                    placeholder="E.g. +2348068950848" value="{{ $mode === 'create' ? old('phone') : $listing->phone }}">
            </div>
        </div>
        <div class="col-md-12 col-xxl-6">
            <div class="mb-3">
                <label for="pxp-company-job-photo" class="form-label">Job Photo</label>
                <input type="file" name="job_photo" id="pxp-company-job-photo" class="form-control">
            </div>
        </div>
        
    </div>

    <div class="mb-3">
        <label for="pxp-company-job-description" class="form-label">Job description</label>
        <textarea class="form-control" name="description" id="pxp-company-job-description"
            placeholder="Type the description here...">{{ $mode === 'create' ? old('description') : $listing->description }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-experience" class="form-label">Experience</label>
                <input type="number" name="job_experience" id="pxp-company-job-experience" class="form-control"
                    placeholder="E.g. 3" value="{{ $mode === 'create' ? old('job_experience') : $listing->job_experience }}">
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-level" class="form-label">Career level</label>
                <select id="pxp-company-job-level" name="job_level" class="form-select">
                    <option>No Experience</option>
                    <option value="Entry-Level"{{ (old('job_level') == 'Entry-Level' || ($mode === 'edit' && $listing->job_level == 'Entry-Level')) ? ' selected' : '' }}>Entry-Level</option>
                    <option value="Mid-Level"{{ (old('job_level') == 'Mid-Level' || ($mode === 'edit' && $listing->job_level == 'Mid-Level')) ? ' selected' : '' }}>Mid-Level</option>
                    <option value="Senior-Level"{{ (old('job_level') == 'Senior-Level' || ($mode === 'edit' && $listing->job_level == 'Senior-Level')) ? ' selected' : '' }}>Senior-Level</option>
                    <option value="Manager / Executive"{{ (old('job_level') == 'Manager / Executive' || ($mode === 'edit' && $listing->job_level == 'Manager / Executive')) ? ' selected' : '' }}>Manager / Executive</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-type" class="form-label">Employment type</label>
                <select id="pxp-company-job-type" name="employment_type" class="form-select">
                    <option value="Full Time"{{ (old('employment_type') == 'Full Time' || ($mode === 'edit' && $listing->employment_type == 'Full Time')) ? ' selected' : '' }}>Full Time</option>
                    <option value="Part Time"{{ (old('employment_type') == 'Part Time' || ($mode === 'edit' && $listing->employment_type == 'Part Time')) ? ' selected' : '' }}>Part Time</option>
                    <option value="Remote"{{ (old('employment_type') == 'Remote' || ($mode === 'edit' && $listing->employment_type == 'Remote')) ? ' selected' : '' }}>Remote</option>
                    <option value="Internship"{{ (old('employment_type') == 'Internship' || ($mode === 'edit' && $listing->employment_type == 'Internship')) ? ' selected' : '' }}>Internship</option>
                    <option value="Contract"{{ (old('employment_type') == 'Contract' || ($mode === 'edit' && $listing->employment_type == 'Contract')) ? ' selected' : '' }}>Contract</option>
                    <option value="Training"{{ (old('employment_type') == 'Training' || ($mode === 'edit' && $listing->employment_type == 'Training')) ? ' selected' : '' }}>Training</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="mb-3">
                <label for="pxp-company-job-salary" class="form-label">Salary</label>
                <input type="number" name="salary" id="pxp-company-job-salary" class="form-control"
                    placeholder="E.g. 2000" value="{{ $mode === 'create' ? old('salary') : $listing->salary }}">
            </div>
        </div>
    </div>
    
    <div class="mt-4 mt-lg-5">
        <button type="button" class="btn rounded-pill pxp-section-cta" onclick="nextSection(1)">Proceed</button>
        {{-- <button class="btn rounded-pill pxp-section-cta-o ms-3">Save Draft</button> --}}
    </div>
</div>