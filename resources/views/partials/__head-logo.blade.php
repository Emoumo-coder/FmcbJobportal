@php
    if(!isset($isHomePage)){
        $isHomePage = null;
    }
@endphp
<div class="pxp-logo {{  $isHomePage ? 'pxp-light' : ''  }}">
    <a href="{{ URL('/') }}" class="pxp-animate">
        <span style="color: var(--pxpMainColor)">{{ substr(config('app.name', 'fmcbjobport'), 0, 4) }}</span>{{ substr(config('app.name', 'fmcbjobport'), 4) }}
    </a>
</div>