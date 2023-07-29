<div id="createSec2" class="create-section-container">
    <h1>{{ $mode === 'create' ? 'Add Requirements' : 'Edit Requirements' }}</h1>
    <p class="pxp-text-light">{{ $mode === 'create' ? 'Add requirement for the applicant.' : 'Edit the application requirements.' }}</p>
    <x-error-list />
    <div class="row mt-4 mt-lg-5 sect-2-append">
        @if ($mode === 'create')
        <div class="row mb-3 requirement-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-requirement-1" class="form-label">Job requirement 1</label>
                <textarea class="form-control" id="pxp-company-job-requirement-1" name="requirements[]"
                    placeholder="Type the requirement here..." style="height: 54px; border-radius: 7px">{{ old('requirements.0') }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta add">add</button>
            </div>
        </div>
        @else
        @forelse ($listing->requirements as $index => $requirement)
        <div class="row mb-3 requirement-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-requirement-{{ $index + 1 }}" class="form-label">Job requirement {{ $index + 1 }}</label>
                <textarea class="form-control" id="pxp-company-job-requirement-{{ $index + 1 }}" name="requirements[]"
                    placeholder="Type the requirement here..." style="height: 54px; border-radius: 7px">{{ $requirement->content }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta{{ $index === 0 ? ' add' : ' remove' }}">{{ $index === 0 ? 'add' : 'remove' }}</button>
            </div>
        </div>
        @empty
        <div class="row mb-3 requirement-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-requirement-1" class="form-label">Job requirement 1</label>
                <textarea class="form-control" id="pxp-company-job-requirement-1" name="requirements[]"
                    placeholder="Type the requirement here..." style="height: 54px; border-radius: 7px">{{ old('requirements.0') }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta add">add</button>
            </div>
        </div>
        @endforelse
        @endif
    </div>
    <div class="mt-4 mt-lg-5">
        <button type="button" class="btn rounded-pill pxp-section-cta-o" onclick="prevSection(2)">Previous</button>
        <button type="button" class="btn rounded-pill pxp-section-cta ms-3" onclick="nextSection(2)">Next</button>
    </div>
</div>