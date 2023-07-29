@props(['isEdit' => false])
@php
    $type = $isEdit ? 'edit' : 'add';
@endphp
<div class="row mt-3 mt-lg-4">
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-education-title" class="form-label">Title</label>
            <input type="text" id="{{ $type }}-education-title" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="E.g. Architecure">
        </div>
    </div>
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-education-school" class="form-label">School</label>
            <input type="text" id="{{ $type }}-education-school" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="School name">
        </div>
    </div>
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-education-time" class="form-label">Time period</label>
            <input type="text" id="{{ $type }}-education-time" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="E.g. 2005 - 2013">
        </div>
    </div>
</div>
@if ($type == 'edit')
    <input type="hidden" id="education_id" name="education_id">
@endif
<div class="mb-3">
    <label for="{{ $type }}-education-description" class="form-label">Description</label>
    <textarea class="form-control {{ $isEdit ? 'p-3 h-150' : '' }} pxp-smaller" 
        id="{{ $type }}-education-description" 
        placeholder="Type a short description here..."></textarea>
</div>
<button class="btn rounded-pill pxp-subsection-cta" id="{{ $type }}EducationBtn">
    {{ $isEdit  ? 'Save ' : 'Add ' }} Education
</button>