@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <h1>Edit Profile</h1>
            <p class="pxp-text-light">Edit your candidate profile page info.</p>

            <x-form.basic-profile-form :user="$candidate"  />

            <form>
                <div class="mt-4 mt-lg-5">
                    <h2>Skills</h2>
                    <div class="pxp-candidate-dashboard-skills mb-3">
                        <ul class="list-unstyled" id="skillsList">
                            @unless (empty($candidate->profile->skills))
                                @forelse ($candidate->profile->skills as $skill)
                                    <li>{{ $skill->skill_name }}<span data-id="{{ $skill->id }}" class="fa fa-trash-o remove-skill"></span></li>
                                @empty
                                    
                                @endforelse
                            @endunless
                        </ul>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="skillInput" class="form-control" placeholder="Skill">
                        <button class="btn" id="addSkillListBtn">Add Skill</button>
                    </div>
                </div>
            </form>

            <form>
                <div class="mt-4 mt-lg-5">
                    <h2>Work Experience</h2>
                    <div class="table-responsive">
                        <table class="table experience-table align-middle">
                            @unless (empty($candidate->profile->experiences))
                                @forelse ($candidate->profile->experiences as $experience)
                                <tr>
                                    <td style="width: 30%;"><div class="pxp-candidate-dashboard-experience-title"
                                        id="">{{ $experience->title }}</div></td>
                                    <td style="width: 25%;"><div class="pxp-candidate-dashboard-experience-company">{{ $experience->company }}</div></td>
                                    <td style="width: 25%;"><div class="pxp-candidate-dashboard-experience-time">{{ $experience->period }}</div>
                                    <span class="none experience-description" data-description="{{ $experience->description }}"
                                        data-id="{{ $experience->id }}"></span>
                                    </td>
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled">
                                                <li><button title="Edit" class="edit-experience-btn"><span class="fa fa-pencil"></span></button></li>
                                                <li><button title="Delete" class="delete-experience-btn"><span class="fa fa-trash-o"></span></button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <p>Please fill in your experiences</p>
                                @endforelse
                            @endunless
                            
                        </table>
                    </div>

                    <x-candidate.experience-form />
                </div>
            </form>

            <form>
                <div class="mt-4 mt-lg-5">
                    <h2>Education & Training</h2>
                    <div class="table-responsive">
                        <table class="table education-table align-middle">
                            @unless (empty($candidate->profile->education))
                                @forelse ($candidate->profile->education as $edu)
                                <tr>
                                    <td style="width: 30%;"><div class="pxp-candidate-dashboard-education-title">{{ $edu->title }}</div></td>
                                    <td style="width: 25%;"><div class="pxp-candidate-dashboard-education-school">{{ $edu->school_name }}</div></td>
                                    <td style="width: 25%;"><div class="pxp-candidate-dashboard-education-time">{{ $edu->period }}</div>
                                        <span class="none education-description" data-description="{{ $edu->description }}"
                                            data-id="{{ $edu->id }}"></span>
                                    </td>
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled">
                                                <li><button title="Edit" class="edit-education-btn"><span class="fa fa-pencil"></span></button></li>
                                                <li><button title="Delete" class="delete-education-btn"><span class="fa fa-trash-o"></span></button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <p>Please fill in your education</p>
                                @endforelse
                            @endunless
                            
                        </table>
                    </div>

                    <x-candidate.education-form />
                </div>
            </form>
        </x-auth.dashboard-card>

        {{-- edit experience modal --}}
        <x-modal modal_id="editExperienceModal" modal_size="modal-lg">
            <div class="pxp-user-modal-fig text-center">
                <h5 class="modal-title text-center mt-4 text-capitalize" 
                id="employerSendMessageTitle"></h5>
                <div class="invalid-application-div"></div>
            </div>

            <h2>Edit Experience</h2>
            
            <x-candidate.experience-form isEdit="true" />
        </x-modal>

        {{-- edit Education modal --}}
        <x-modal modal_id="editEducationModal" modal_size="modal-lg">
            <div class="pxp-user-modal-fig text-center">
                <h5 class="modal-title text-center mt-4 text-capitalize" 
                id="employerSendMessageTitle"></h5>
                <div class="invalid-application-div"></div>
            </div>

            <h2>Edit Education</h2>
            
            <x-candidate.education-form isEdit="true" />
        </x-modal>
    <x-auth.auth-footer />
</div>

@endsection('content')

