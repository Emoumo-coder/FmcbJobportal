<?php

namespace App\Http\Controllers\candidate;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CandidateSkill;
use App\Models\CandidateProfile;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\FormatController;
use App\Http\Requests\CandidateEducationRequest;
use App\Http\Requests\CandidateExperienceRequest;

class CandidateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        // Check if the username starts with @
        if (Str::startsWith($username, '@')) {
            $username = Str::after($username, '@'); // Removes the @ symbol
            // Rerieve the candidate profile based on the username
            $candidate = User::where('username', $username)
                ->with(
                    'profile', 
                    'profile.education', 
                    'profile.experiences'
                )
                ->first();

            $isHomePage = request()->is('/');

            if ($candidate) {
                if ($candidate->role == 'user') {
                    // Return the view to display the candidate profile
                    return \view('candidate.profile.show', compact('candidate', 'isHomePage'));
                }
                
            };
        }

        // Handle case when candidate is not found or '@' symbol is missing
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $candidate = Auth::user();

        if ($candidate->role != 'user') {
            return abort(404);
        }
        return \view('candidate.profile.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        // Validate the form fields
        $request->validated();

        // update candidate's profile information
        $candidate = Auth::user();
        $candidate->name = $request->input('name');
        $candidate->gender = $request->input('gender');
        $candidate->save();
        
        // $profile = $candidate->profile;

        // if ($profile) {
        //     $profile->title = $request->input('title');
        //     $profile->location = $request->input('location');
        //     $profile->phone = $request->input('phone');
        //     $profile->about = $request->input('about');
        //     $profile->save();
        // } else {
        //     $profile = new CandidateProfile([
        //         'title' => $request->input('title'),
        //         'location' => $request->input('location'),
        //         'phone' => $request->input('phone'),
        //         'about' => $request->input('about'),
        //     ]);
        //     $candidate->profile()->save($profile);
        // }

        $candidateProfile = $candidate->profile ?? new CandidateProfile(); // Get the candidate profile or create a new one
        $candidateProfile->title = $request->input('title');
        $candidateProfile->location = $request->input('location');
        $candidateProfile->phone = $request->input('phone');
        $candidateProfile->about = $request->input('about');

        if ($request->hasFile('cover_photo')) {
            // Delete the previous cover photo, if it exist
            if ($candidateProfile->cover_photo) {
                FormatController::deleteFile($candidateProfile->cover_photo, 'storage/images/cover_photos');
            }
            // Upload the coverPhoto to the storage location
            $coverPhoto = $request->file('cover_photo');
            $coverPhotoName = time() . '_cover_photo.' . $coverPhoto->Extension();

            // $coverPhotoPath = $coverPhoto->storeAs('images/cover_photos', $coverPhotoName);
            $coverPhoto->move(public_path('storage/images/cover_photos'), $coverPhotoName);

            $candidateProfile->cover_photo = $coverPhotoName;
        }
        
        if ($request->hasFile('photo')) {
            // Delete the previous cover photo, if it exist
            if ($candidateProfile->photo) {
                FormatController::deleteFile($candidateProfile->photo, 'storage/images/profile_photos');
            }
            // Upload the profilePhoto to the storage location
            $profilePhoto = $request->file('photo');
            $profilePhotoName = time() . '_profile_photo.' . $profilePhoto->Extension();

            // $profilePhotoPath = $profilePhoto->storeAs('images/profile_photos', $profilePhotoName);
            $profilePhoto->move(public_path('storage/images/profile_photos'), $profilePhotoName);

            $candidateProfile->photo = $profilePhotoName;
        }

        if ($candidate->profile()->save($candidateProfile)) {
            // check whether the values were changed
            if ($candidate->wasChanged() || $candidateProfile->wasChanged()) {
                $message = 'Profile saved successfully!';
            }else {
                $message = 'There is nothing to save.';
            }
            return response()->json(['success' => true, 'message' => $message]);
        }else{
            return response()->json(['success' => false, 'message' => 'Something went wrong while saving your profile!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Add candidate skills
     */
    public function addSkill (Request $request)
    {
        $request->validate(['skill' => 'required']);
        $skillName = $request->input('skill');
        $candidate = Auth::user();
        $candidateProfileId = $candidate->profile->id; // Retrieve the candidate_profile_id

        // Create a new CandidateSkill
        $candidateSkill = new CandidateSkill();
        $candidateSkill->candidate_profile_id = $candidateProfileId;
        $candidateSkill->skill_name = $skillName;
        if ($candidateSkill->save()) {
            // Return the ID of the added skill
            return response()->json(['success' => true, 'message' => 'Skill added successfully', 'skill_id' => $candidateSkill->id], 200);
        }

        return response()->json(['success' => false, 'message' => 'Something went wrong while adding skill'], 200);
    }

    /**
     * Delete the candidate skilll
     */
    public function deleteSkill (CandidateSkill $id)
    {
        if ($id->delete()) {
            return response()->json(['success' => true, 'message' => 'Skill deleted successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Something went wrong while deleting the skill!']);
    }

    /**
     * Add candidate experience
     */
    public function addExperience (CandidateExperienceRequest $request)
    {
        $formFields = $request->validated();

        $candidate = Auth::user();
        $candidateProfileId = $candidate->profile->id; // Retrieve the candidate_profile_id

        $formFields['candidate_profile_id'] = $candidateProfileId;
        if ($saved = CandidateExperience::create($formFields)) {
            return response()->json(
                ['success' => true, 'message' => 'Work experience added successfully', 'experience_id' => $saved->id], 200);
        }else{
            return response()->json(['success' => false, 'message' => 'Something went wrong, while adding work experinece!'], 200);
        }
    }

    /**
     * update candidate experience
     */
    public function updateExperience (CandidateExperienceRequest $request, CandidateExperience $id)
    {
        $formFields = $request->validated();

        if ($id->update($formFields)) {

            if ($id->wasChanged()) {
                $message = 'Work experience Edited successfully!';
            } else {
                $message = 'There is nothing to save.';
            }
            
            return response()->json(
                ['success' => true, 'message' => $message], 200);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong, while editing work experince!'], 200);
        }
    }

    /**
     * Delete candidate experience
     */
    public function deleteExperience (CandidateExperience $id)
    {
        if ($id->delete()) {
            return response()->json(
                ['success' => true, 'message' => 'Work experience deleted successfully'], 200);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong, while deleting work experinece!'], 200);
        }
    }

    /**
     * Add candidate Education
     */
    public function addEducation (CandidateEducationRequest $request)
    {
        $formFields = $request->validated();

        $candidate = Auth::user();
        $candidateProfileId = $candidate->profile->id; // Retrieve the candidate_profile_id

        $formFields['candidate_profile_id'] = $candidateProfileId;
        if ($saved = CandidateEducation::create($formFields)) {
            return response()->json(
                ['success' => true, 'message' => 'Education added successfully', 'education_id' => $saved->id], 200);
        }else{
            return response()->json(['success' => false, 'message' => 'Something went wrong, while adding work experinece!'], 200);
        }
    }

    /**
     * update candidate education
     */
    public function updateEducation (CandidateEducationRequest $request, CandidateEducation $id)
    {
        $formFields = $request->validated();

        if ($id->update($formFields)) {

            if ($id->wasChanged()) {
                $message = 'Education Edited successfully!';
            } else {
                $message = 'There is nothing to save.';
            }

            return response()->json(
                ['success' => true, 'message' => $message], 200);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong, while editing education!'], 200);
        }
    }

    /**
     * Delete candidate education
     */
    public function deleteEducation (CandidateEducation $id)
    {
        if ($id->delete()) {
            return response()->json(
                ['success' => true, 'message' => 'Education deleted successfully!'], 200);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong, while deleting education!'], 200);
        }
    }
}
