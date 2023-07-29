@props(['title', 'value', 'period' => '', 'company' => ''])
<div class="pxp-single-candidate-timeline-item">
    <div class="pxp-single-candidate-timeline-dot"></div>
    <div class="pxp-single-candidate-timeline-info ms-3">
        @if ($period)
        <div class="pxp-single-candidate-timeline-time"><span class="me-3">{{ $period }}</span></div>
        @endif
        <div class="pxp-single-candidate-timeline-position mt-2">{{ $title }}</div>
        @if ($company)
        <div class="pxp-single-candidate-timeline-company pxp-text-light">{{ $company }}</div>
        @endif
        <div class="pxp-single-candidate-timeline-about mt-2 pb-4">{!! $value !!}</div>
    </div>
</div>