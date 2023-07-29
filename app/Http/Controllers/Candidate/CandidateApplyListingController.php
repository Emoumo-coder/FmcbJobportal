<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateApplyListing;

class CandidateApplyListingController extends Controller
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
        $messages = [
            'listing_id.required' => 'The job you are applying for is required.',
        ];
        
        $validatedData = $request->validate([
            'listing_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|max:11',
            'resume' => ['required', 'mimes:pdf,doc,docx', 'max:10000'],
            'personal_url' => 'required|url',
            'message' => 'required',
        ], $messages);

        // check if the application already exists
        $existingApplication = CandidateApplyListing::where('email', $request->email)
            ->where('listing_id', $request->listing_id)
            ->exists();

        if($existingApplication){
            return response()->json(['success' => false, 'message' => 'Application already submitted for this listing.']);
        }

        // Upload the resume to the storage location
        $resume = $request->file('resume');
        $resumeName = time() . '_resume.' . $resume->Extension();

        $resumePath = $resume->storeAs('images/resumes', $resumeName);

        $validatedData['resume'] = $resumePath;
        $validatedData['user_id'] = Auth::user()->id;

        CandidateApplyListing::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Your application has been submitted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
