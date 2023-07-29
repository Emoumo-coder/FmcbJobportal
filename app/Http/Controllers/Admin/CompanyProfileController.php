<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfileGallery;
use App\Http\Controllers\FormatController;

class CompanyProfileController extends Controller
{

    public function show ()
    {
        $profile = CompanyProfile::firstOrFail();
        $galleries = CompanyProfileGallery::orderBy('id')->take(6)->get();
        $isHomePage = request()->is('company/profile');
        $noBackground = true;

        return \view('company.profile.show', 
        compact('isHomePage', 'profile', 'galleries', 'noBackground'));
    }

    public function edit ()
    {
        $profile = CompanyProfile::first();
        $galleries = CompanyProfileGallery::orderBy('id')->take(6)->get();
        return \view('admin.companyProfile.edit', compact('profile', 'galleries'));
    }

    public function update (Request $request)
    {
        // dd($request->file('photo')->Extension());
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'website' => 'required|url|max:255',
            'about' => 'required|string|max:2200',
            'cover_photo' => 'nullable|max:255|mimes:png,jpeg,jpg,gif',
            'photo' => 'nullable|max:255|mimes:png,jpeg,jpg,gif',
            'industry' => 'required|string|max:255',
            'founded' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'facebook_link' => 'required|url|max:255',
            'twitter_link' => 'required|url|max:255',
            'instagram_link' => 'required|url|max:255',
            'linkedin_link' => 'required|url|max:255',
        ]);

        $companyProfile = CompanyProfile::first();

        if ($request->hasFile('cover_photo')) {
            // Delete the previous cover photo, if it exist
            if ($companyProfile) {
                if ($companyProfile->cover_photo) {
                    FormatController::deleteFile($companyProfile->cover_photo, 'storage/images/company/cover_photos');
                }
            }
            // Upload the coverPhoto to the storage location
            $coverPhoto = $request->file('cover_photo');
            $coverPhotoName = time() . '_cover_photo.' . $coverPhoto->Extension();

            // $coverPhotoPath = $coverPhoto->storeAs('images/cover_photos', $coverPhotoName);
            $coverPhoto->move(public_path('storage/images/company/cover_photos'), $coverPhotoName);

            $formFields['cover_photo'] = $coverPhotoName;
        }
        
        if ($request->hasFile('photo')) {
            // Delete the previous cover photo, if it exist
            if ($companyProfile) {
                if ($companyProfile->photo) {
                    FormatController::deleteFile($companyProfile->photo, 'storage/images/company/profile_photos');
                }
            }
            // Upload the profilePhoto to the storage location
            $profilePhoto = $request->file('photo');
            $profilePhotoName = time() . '_profile_photo.' . $profilePhoto->Extension();

            // $profilePhotoPath = $profilePhoto->storeAs('images/profile_photos', $profilePhotoName);
            $profilePhoto->move(public_path('storage/images/company/profile_photos'), $profilePhotoName);

            $formFields['photo'] = $profilePhotoName;
        }

        if ($companyProfile) {
            if ($companyProfile->update($formFields)) {
                $message = $companyProfile->wasChanged() ? 'Company profile saved successfully!' : 'There is nothing to save.';
            } else {
                $message = 'Something went wrong while saving company profile!';
            }
        } else {
            $companyProfile = CompanyProfile::create($formFields);
            if ($companyProfile) {
                $message = 'Company profile saved successfully!';
            } else {
                $message = 'Something went wrong while saving company profile!';
            }
        }
        
        if ($companyProfile) {
            return response()->json(['success' => true, 'message' => $message]);
        } else {
            return response()->json(['success' => false, 'message' => $message]);
        }
    }
    
    public function updateCaption(Request $request)
    {
        $galleryId = $request->input('galleryId');
        $caption = $request->input('caption');

        $request->validate([
            'caption' => [
                'required',
                Rule::unique('company_profile_galleries')->ignore($galleryId),
            ],
        ]);

        $gallery = CompanyProfileGallery::findOrFail($galleryId);

        if (!$gallery) {
            return response()->json(['success' => false, 'message' => 'Gallery not found.']);
        }

        $gallery->caption = $caption;

        if ($gallery->save()) {
            
            $message = $gallery->wasChanged() ? 'Caption updated successfully!' : 'There is nothing to save!';
            
            return \response()->json(['success' => true, 'message' => $message]);
        }

        return \response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }

    public function enableDisable (Request $request)
    {
        $galleryId = $request->input('galleryId');
        $disabled = $request->input('disabled');

        $request->validate(['disabled' => 'required']);

        $gallery = CompanyProfileGallery::findOrFail($galleryId);

        $gallery->disabled = $disabled;

        if ($gallery->save()) {
            return \response()->json(['success' => true, 'message' => 'Gallery disability updated successfully!']);
        }
    
        return \response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }

    public function updatePhoto (Request $request)
    {
        $request->validate(['photo' => 'required|max:255|mimes:png,jpeg,jpg,gif']);
        $galleryId = $request->input('galleryId');

        $gallery = CompanyProfileGallery::findOrFail($galleryId);

        if ($request->hasFile('photo')) {
            // Delete the previous cover photo, if it exist
            if (FormatController::deleteFile($gallery->photo, 'storage/images/galleries')) {

                // Upload the galleryPhoto to the storage location
                $galleryPhoto = $request->file('photo');
                $galleryPhotoName = "company-hero-$galleryId."  . $galleryPhoto->Extension();

                $galleryPhoto->move(public_path('storage/images/galleries'), $galleryPhotoName);

                $gallery->photo = $galleryPhotoName;

                if ($gallery->save()) {
                    return \response()->json(['success' => true, 'message' => 'Gallery photo updated successfully!']);
                }
            }
            
            return \response()->json(['success' => false, 'message' => 'Something went wrong!']);
        }
    }

    public function updateMoreDetail (Request $request)
    {
        $formFields = $request->validate([
            'overview' => 'nullable|string|max:1000',
            'youtube_link' => 'nullable|url|max:255',
            'youtube_link_description' => 'nullable|string|max:680'
        ]);

        $companyProfile = CompanyProfile::firstOrFail();

        if ($companyProfile->update($formFields)) {
            $message = $companyProfile->wasChanged() ? 'Company profile more detail saved successfully!' : 'There is nothing to save.';
            $success = true;
        } else {
            $message = 'Something went wrong while saving company profile more detail!';
            $success = false;
        }

        return \response()->json(['success' => $success, 'message' => $message]);
    }
}
