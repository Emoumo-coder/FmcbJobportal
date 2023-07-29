@props(['button_id', 'text' => 'Save Profile'])

<div class="mt-4 mt-lg-5 {{ $attributes->get('div_class') }}">
    <button class="btn rounded-pill pxp-section-cta {{ $attributes->get('button_class') }}" id="{{ $button_id }}">
        {{ $text }}
    </button>
</div>
