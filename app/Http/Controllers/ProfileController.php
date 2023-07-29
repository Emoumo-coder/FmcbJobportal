<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SocialMediaLink;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\FormatController;

class ProfileController extends Controller
{
    public function __construct ()
    {
        $this->middleware(['can:isEmployer'], ['except' => 'show']);
    }

    public function edit ()
    {
        $employer = Auth::user();

        if ($employer->role == 'user') {
            return abort(404);
        }
    
        $employer->load('profile', 'socialMediaLinks:id,user_id,link');
        return \view('employer.profile.edit', compact('employer'));
    }

    public function update (ProfileRequest $request)
    {
        // Validate the form fields
        $request->validated();

        // update employer's profile information
        $employer = Auth::user();
        $employer->name = $request->input('name');
        $employer->gender = $request->input('gender');
        $employer->save();

        $employerProfile = $employer->profile ?? new CandidateProfile(); // Get the employer profile or create a new one
        $employerProfile->title = $request->input('title');
        $employerProfile->location = $request->input('location');
        $employerProfile->phone = $request->input('phone');
        $employerProfile->about = $request->input('about');

        if ($request->hasFile('cover_photo')) {
            // Delete the previous cover photo, if it exist
            if ($employerProfile->cover_photo) {
                FormatController::deleteFile($employerProfile->cover_photo, 'storage/images/cover_photos');
            }
            // Upload the coverPhoto to the storage location
            $coverPhoto = $request->file('cover_photo');
            $coverPhotoName = time() . '_cover_photo.' . $coverPhoto->Extension();

            // $coverPhotoPath = $coverPhoto->storeAs('images/cover_photos', $coverPhotoName);
            $coverPhoto->move(public_path('storage/images/cover_photos'), $coverPhotoName);

            $employerProfile->cover_photo = $coverPhotoName;
        }
        
        if ($request->hasFile('photo')) {
            // Delete the previous cover photo, if it exist
            if ($employerProfile->photo) {
                FormatController::deleteFile($employerProfile->photo, 'storage/images/profile_photos');
            }
            // Upload the profilePhoto to the storage location
            $profilePhoto = $request->file('photo');
            $profilePhotoName = time() . '_profile_photo.' . $profilePhoto->Extension();

            // $profilePhotoPath = $profilePhoto->storeAs('images/profile_photos', $profilePhotoName);
            $profilePhoto->move(public_path('storage/images/profile_photos'), $profilePhotoName);

            $employerProfile->photo = $profilePhotoName;
        }

        if ($employer->profile()->save($employerProfile)) {
            // check whether the values were changed
            if ($employer->wasChanged() || $employerProfile->wasChanged()) {
                $message = 'Profile saved successfully!';
            }else {
                $message = 'There is nothing to save.';
            }
            return response()->json(['success' => true, 'message' => $message]);
        }else{
            return response()->json(['success' => false, 'message' => 'Something went wrong while saving your profile!']);
        }
    }

    public function addSocialLink (Request $request)
    {
        $request->validate(['social_link' => 'required|url']);
        $social_link = $request->input('social_link');

        $employerProfileId = Auth::user()->id; // Retrieve the candidate_profile_id

        // Create a new SocialMediaLink
        $socialMediaLink = new SocialMediaLink();
        $socialMediaLink->user_id = $employerProfileId;
        $socialMediaLink->link = $social_link;
        if ($socialMediaLink->save()) {
            // Return the ID of the added skill
            return response()->json(['success' => true, 'message' => 'Social media link added successfully', 'social_link_id' => $socialMediaLink->id], 200);
        }

        return response()->json(['success' => false, 'message' => 'Something went wrong while adding link'], 200);
    }

    public function deleteSocialLink (SocialMediaLink $social_link)
    {
        if ($social_link->delete()) {
            return response()->json(['success' => true, 'message' => 'Social media link deleted successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Something went wrong while deleting the social link!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        // Check if the username starts with @
        if (Str::startsWith($username, '@')) {
            $username = Str::after($username, '@'); // Removes the @ symbol
            // Rerieve the employer profile based on the username
            $employer = User::where('username', $username)
                ->with(
                    'profile', 
                    'socialMediaLinks:id,user_id,link'
                )
                ->first();

            $isHomePage = request()->is('/');

            if ($employer) {
                if ($employer->role == 'employer') {
                    // Return the view to display the employer profile
                    return \view('employer.profile.show', compact('employer', 'isHomePage'));
                }
                
            };
        }

        // Handle case when employer is not found or '@' symbol is missing
        return abort(404);
    }
}
