<div id="createSec3" class="create-section-container">
    <h1>{{ $mode === 'create' ? 'Add Responsibilities' : 'Edit Responsibilities' }}</h1>
    <p class="pxp-text-light">{{ $mode === 'create' ? 'Add responsibilty for the applicant.' : 'Edit the application resposibilities.' }}</p>
    <x-error-list />
    <div class="row mt-4 mt-lg-5 sect-3-append">
        @if ($mode === 'create')
        <div class="row mb-3 responsibility-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-responsibility-1" class="form-label">Job responsibility 1</label>
                <textarea class="form-control" id="pxp-company-job-responsibility-1" name="responsibilities[]"
                    placeholder="Type the responsibility here..." style="height: 54px; border-radius: 7px">{{ old('responsibilities.0') }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta add">add</button>
            </div>
        </div>
        @else
        @forelse ($listing->responsibilities as $index => $responsibility)
        <div class="row mb-3 responsibility-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-responsibility-{{ $index + 1 }}" class="form-label">Job responsibility {{ $index + 1 }}</label>
                <textarea class="form-control" id="pxp-company-job-responsibility-{{ $index + 1 }}" name="responsibilities[]"
                    placeholder="Type the responsibility here..." style="height: 54px; border-radius: 7px">{{ $responsibility->content }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta{{ $index === 0 ? ' add' : ' remove' }}">{{ $index === 0 ? 'add' : 'remove' }}</button>
            </div>
        </div>
        @empty
        <div class="row mb-3 responsibility-row">
            <div class="col-sm-10">
                <label for="pxp-company-job-responsibility-1" class="form-label">Job responsibility 1</label>
                <textarea class="form-control" id="pxp-company-job-responsibility-1" name="responsibilities[]"
                    placeholder="Type the responsibility here..." style="height: 54px; border-radius: 7px">{{ old('responsibilities.0') }}</textarea>
            </div>
            <div class="col-sm-2 d-flex align-items-end mt-2 mt-sm-0">
                <button type="button" class="btn rounded-pill pxp-section-cta add">add</button>
            </div>
        </div>
        @endforelse
        @endif
    </div>
    
    <div class="mt-4 mt-lg-5">
        <button type="button" class="btn rounded-pill pxp-section-cta-o" onclick="prevSection(3)">Previous</button>
        <button type="submit" class="btn rounded-pill pxp-section-cta ms-3">Publish Job</button>
    </div>
</div>