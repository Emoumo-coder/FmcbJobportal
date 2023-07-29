<x-show-profile :user="$candidate" :isHomePage="$isHomePage">
    @unless (empty($candidate->profile->skills))
        <div class="mt-4 mt-lg-5">
            <h2>Skills</h2>
            <div class="pxp-single-candidate-skills">
                <ul class="list-unstyled">
                    @forelse ($candidate->profile->skills as $skill)
                        <li>{{ $skill->skill_name }}</li>
                    @empty
                        <li>No skills uploaded yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @endunless

    @unless (empty($candidate->profile->experiences))
    <div class="mt-4 mt-lg-5">
        <h2>Work Experience</h2>
        <div class="pxp-single-candidate-timeline">
            @forelse ($candidate->profile->experiences as $experience)
                <x-timeline :title="$experience->title" :value="$experience->description" :period="$experience->period" :company="$experience->company" />
            @empty
                <p>No Experience uploaded yet.</p>
            @endforelse
        </div>
    </div>
    @endunless

    @unless (empty($candidate->profile->education))
    <div class="mt-4 mt-lg-5">
        <h2>Education & Training</h2>
        <div class="pxp-single-candidate-timeline">
            @forelse ($candidate->profile->education as $education)
                <x-timeline :title="$education->title" :value="$education->description" :period="$education->period" :company="$education->school_name" />
            @empty
                <p>No Education & Training uploaded yet.</p>
            @endforelse
        </div>
    </div>
    @endunless
</x-show-profile>