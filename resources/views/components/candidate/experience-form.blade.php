@props(['isEdit' => false])
@php
    $type = $isEdit ? 'edit' : 'add';
@endphp
<div class="row mt-3 mt-lg-4 apply-form">
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-experience-title" class="form-label">Job title</label>
            <input type="text" id="{{ $type }}-experience-title" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="E.g. Web Designer">
        </div>
    </div>
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-experience-company" class="form-label">Company</label>
            <input type="text" id="{{ $type }}-experience-company" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="Company name">
        </div>
    </div>
    <div class="{{ $isEdit ? 'col-md-12 col-lg-6' : 'col-md-4' }}">
        <div class="mb-3">
            <label for="{{ $type }}-experience-time" class="form-label">Time period</label>
            <input type="text" id="{{ $type }}-experience-time" class="form-control {{ $isEdit ? 'p-3' : '' }}" placeholder="E.g. 2005 - 2013">
        </div>
    </div>
</div>
@if ($type == 'edit')
    <input type="hidden" id="experience_id" name="experience_id">
@endif
<div class="mb-3">
    <label for="{{ $type }}-experience-description" class="form-label">Description</label>
    <textarea class="form-control {{ $isEdit ? 'p-3 h-150' : '' }} pxp-smaller" 
    id="{{ $type }}-experience-description" placeholder="Type a short description here..."></textarea>
</div>
<button class="btn rounded-pill pxp-subsection-cta" 
id="{{ $type }}ExperienceBtn">
{{ $isEdit  ? 'Save ' : 'Add ' }}Experience
</button>
