<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveListingController extends Controller
{

    /**
     * view the your saved listings
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $unFormattedSavedListings = $user->savedListings()->get();

            $savedListings = FormatController::formatListings($unFormattedSavedListings);
        }

        return view('candidate.view-saved-listing', compact('savedListings'));
    }

    /**
     * save the listing for the user
     */
    public function save(Request $request)
    {
        $user = $request->user();
        $listingId = $request->input('listing_id');
        $saved = false;
        $message = '';
        
        if ($user->savedListings()->where('listing_id', $listingId)->exists()) {
            $user->savedListings()->detach($listingId);
            $message = 'Listing unsaved successfully!';
        }else{
            $user->savedListings()->attach($listingId);
            $saved = true;
            $message = 'Listing saved successfully!';
        }

        return response()->json(['success' => true, 'saved' => $saved, 'message' => $message]);
    }

    /**
     * delete saved listing
     */
    public function delete(Request $request)
    {
        $user = $request->user();
        $listingId = $request->input('listing_id');

        $user->savedListings()->detach($listingId);

        return response()->json(['success' => true, 'message' => 'Job removed successfully!']);
    }
}
