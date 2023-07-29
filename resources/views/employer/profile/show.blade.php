<x-show-profile :user="$employer" :isHomePage="$isHomePage">
    @unless (empty($employer->socialMediaLinks))
        <div class="mt-4 mt-lg-5">
            <h2>Social media links</h2>
            <div class="pxp-single-candidate-skills">
                <ul class="list-unstyled">
                    @forelse ($employer->socialMediaLinks as $social_link)
                        <li class="shadow-sm bg-primary"><a href="{{ $social_link->link }}"
                            class="text-white" target="_blank" rel="noopener noreferrer">{{ $social_link->link }}</a></li>
                    @empty
                        <li>No social media link added yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @endunless
</x-show-profile>