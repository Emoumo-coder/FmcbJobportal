<div class="row mt-4 mt-md-5">
    @unless (count($listings) === 0)
        @foreach ($listings as $listing)
        <div class="col-lg-6 pxp-jobs-card-2-container">
            <div class="pxp-jobs-card-2 pxp-has-border">
                <div class="pxp-jobs-card-2-top">
                    <a href="/listings/{{ $listing->id }}" class="pxp-jobs-card-2-company-logo" style="background-image: url({{ asset('storage/images/company-logo-1.png') }});"></a>
                    <div class="pxp-jobs-card-2-info">
                        <a href="/listings/{{ $listing->id }}" class="pxp-jobs-card-2-title">{{ $listing->title }}</a>
                        <div class="pxp-jobs-card-2-details">
                            <a href="/listings/{{ $listing->id }}" class="pxp-jobs-card-2-location">
                                <p>{{ $listing->description_formatted }}</p>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="pxp-jobs-card-2-bottom">
                    <a href="/listings?department={{ $listing->department }}" class="pxp-jobs-card-2-category">
                        <div class="pxp-jobs-card-2-category-label">{{ $listing->department }}</div>
                    </a>
                    
                    <a href="/listings?employment_type_filter={{ $listing->employment_type }}" class="pxp-jobs-card-2-category">
                        <div class="pxp-jobs-card-2-category-label">
                            {{ $listing->employment_type }}
                        </div>
                    </a>
                    
                    <div class="pxp-jobs-card-2-bottom-right">
                        <span class="pxp-jobs-card-2-date pxp-text-light">{{ $listing->created_at_formatted }} by</span> <a href="single-company-1.html" class="pxp-jobs-card-2-company">{{ $listing->user->name }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Oops, No job listings found for this filter!</p>
    @endunless
    
</div>

<div class="mt-4 mt-md-5 text-center pxp-animate-in pxp-animate-in-top">
    {!! $links !!}
</div>