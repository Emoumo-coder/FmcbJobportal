<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ApplicationTrait;
use App\Models\CandidateApplyListing;

class ApplicationController extends Controller
{
    use ApplicationTrait;
    /**
     * view all the employer Listing Application
     */
    public function index(Request $request)
    {   

        if ($request->ajax()) {
            
            $candidate = Auth::user()->id;

            $applications = CandidateApplyListing::where('user_id', $candidate)
                ->with('listing:id,title') // Eager load the `listing` relationship with `id` and `title` attributes
                ->get();

            return $this->GetApplicationDataTable($applications);
        }

        return view('candidate.applications.index');
    }

    /**
     * Display the specified application.
     */
    public function show(CandidateApplyListing $application)
    {
        $application->load('user:id,username,gender', 'listing:id,title', 'user.profile:id,user_id,cover_photo,photo,title');

        return \view('candidate.applications.show', compact('application'));
    }
}
