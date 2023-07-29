<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ListingRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\FormatController;

class ListingsController extends Controller
{
    public function __construct ()
    {
        $this->middleware(['auth', 'can:isEmployer'], ['except' => ['index', 'show', 'getLatestListings']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'department' => $request->input('department'),
            'search' => $request->input('search'),
            'employment_type_filter' => $request->input('employment_type_filter'),
            'experience_level_filter' => $request->input('experience_level_filter'),
            'salary_range_filter' => $request->input('salary_range_filter'),
            'department' => $request->input('department'),
        ];
        
        $listingsQuery = Listing::latest()->filter($filters)->paginate(4);

        $links = $listingsQuery->links()->toHtml();

        $listings = FormatController::formatListings($listingsQuery->getCollection());
        
        $isHomePage = request()->is('/');

        if ($request->ajax()) {
            return view('partials.__listings_ajax', compact('listings', 'links'))->render();
        }

        return view('listings.index', compact('listings', 'isHomePage', 'filters', 'links'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingRequest $request)
    {
        // dd($request->job_photo->extension());
        
        $formFields = $request->validated();

        if($request->hasFile('job_photo')){
            $newImageName = time() . '-job.' . $request->job_photo->extension();

            $request->job_photo->move(public_path('storage/images/job_photos'), $newImageName);

            $formFields['job_photo'] = $newImageName;
        }

        $listing = Listing::create($formFields);

        // $requirements = $request->input('requirements');
        // foreach ($requirements as $requirement) {
        //     Requirement::create([
        //         'listing_id' => $listing->id,
        //         'content' => $requirement,
        //     ]);
        // }

        // $responsibilities = $request->input('responsibilities');
        // foreach ($responsibilities as $responsibility) {
        //     Responsibility::create([
        //         'listing_id' => $listing->id,
        //         'content' => $responsibility,
        //     ]);
        // }

        $this->createAssociatedRecords(
            $listing,
            $request->input('requirements', []),
            $request->input('responsibilities', [])
        );

        return redirect('listings')->with('message', 'Listing created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $isSaved = false;

        if (Auth::check()) {
            $user = Auth::user();
            
            $isSaved = $user->savedListings->contains($listing);
        }
        $companyProfile = CompanyProfile::select(
                                    'industry', 'size', 'founded', 'country', 
                                    'city', 'website', 'facebook_link', 'twitter_link', 
                                    'instagram_link', 'linkedin_link'
                            )
                            ->first();
        $noBackground = true;

        return view('listings.show', [
            'listing' => $listing,
            'isHomePage' => false,
            'isSaved' => $isSaved,
            'companyProfile' => $companyProfile,
            'noBackground' => $noBackground
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        // dd(Listing::find(4)->requirements()->get());
        return view('listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingRequest $request, Listing $listing)
    {
        $formFields = $request->validated();

        if($request->hasFile('job_photo')){
            // Delete the previous photo, if it exists
            if ($listing->job_photo) {
                FormatController::deleteFile($listing->job_photo, 'storage/images/job_photos');
            }

            $newImageName = time() . '-job.' . $request->job_photo->extension();

            $request->job_photo->move(public_path('storage/images/job_photos'), $newImageName);

            $formFields['job_photo'] = $newImageName;
        }

        $listing->update($formFields);

        $listing->requirements()->delete();
        $listing->responsibilities()->delete();

        $this->createAssociatedRecords(
            $listing,
            $request->input('requirements', []),
            $request->input('responsibilities', [])
        );

        return \back()->with('message', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if (FormatController::deleteFile($listing->job_photo, 'storage/images/job_photos')) {
            $listing->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    private function createAssociatedRecords($listing, $requirements, $responsibilities)
    {
        // Create associated requirements
        foreach ($requirements as $requirement) {
            Requirement::create([
                'listing_id' => $listing->id,
                'content' => $requirement,
            ]);
        }

        // Create associated responsibilities
        foreach ($responsibilities as $responsibility) {
            Responsibility::create([
                'listing_id' => $listing->id,
                'content' => $responsibility,
            ]);
        }
    }

    /**
     * manage listings -- delete, view and edit all
     */
    public function manage(Request $request)
    {
        
        if ($request->ajax()) {
            // dd('ddd');
            // return DataTables::of(Listing::all())->toJson();
            return DataTables::of(Listing::query())
                ->editColumn('created_at', function ($listing) {
                    $date = $listing->created_at->format('Y-m-d');
                    $status_text = $listing->status == 1 ? 'Active' : 'Inactive';
                    $status_bg = $listing->status == 1 ? 'bg-success' : 'bg-secondary';
                    $html = '<div class="pxp-company-dashboard-job-status">
                    <span class="badge rounded-pill '.$status_bg.'">'.$status_text.'</span></div>
                    <div class="pxp-company-dashboard-job-date mt-1">'.$date.'</div>';
                    return $html;
                })
                ->addIndexColumn()
                ->addColumn('action', function ($listing) {
                    $actionBtn = '<div class="pxp-dashboard-table-options">
                    <ul class="list-unstyled">
                        <li>
                        <form action="/listings/'.$listing->id.'/edit" method="get">
                            <button title="Edit"><span class="fa fa-pencil"></span></button>
                        </form>
                        </li>
                        <li>
                        <form action="/listings/'.$listing->id.'" method="get">
                            <button title="Preview"><span class="fa fa-eye"></span></button>
                        </form>
                        </li>
                        <li>
                            <button title="Approve" class="changeStatusBtn" data-id="'.$listing->id.'" data-status="1">
                                <span class="fa fa-check"></span>
                            </button>
                        </li>
                        <li>
                            <button title="Reject" class="changeStatusBtn" data-id="'.$listing->id.'" data-status="0">
                                <span class="fa fa-ban"></span>
                            </button>
                        </li>
                        <li>
                            <button title="Delete" class="deleteListingBtn" data-id="'.$listing->id.'">
                                <span class="fa fa-trash-o"></span>
                            </button>
                        </li>
                    </ul>
                </div>';
                    return $actionBtn;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }

        return view('listings.manage');
    }

    /**
     * change the listing status
     */
    public function changeStatus(Request $request)
    {
        $listing = Listing::find($request->id);
        if ($listing) {
            $listing->status = $request->status;
            $listing->save();

            // Set a flash message
            Session::flash('message', 'Listing status changed successfully.');

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function getLatestListings(Request $request)
    {
        $filters = [
            'department' => $request->input('department'),
            'search' => $request->input('search'),
            'employment_type_filter' => $request->input('employment_type_filter'),
            'experience_level_filter' => $request->input('experience_level_filter'),
            'salary_range_filter' => $request->input('salary_range_filter'),
        ];
        // $perPage = (int)$request->input('limit');
    
        $listings = Listing::latest()->filter($filters)->take(4)->get();

        if($request->input('listing') == 'list'){
            $listingsQuery = Listing::latest()->filter($filters)->paginate(4);

            $links = $listingsQuery->links()->toHtml();

            $listings = FormatController::formatListings($listingsQuery->getCollection());

            return view('partials.__listings_ajax', compact('listings', 'links'));
        }

        $formattedListings = FormatController::formatListings($listings);

        return $formattedListings;
    }
    
    

}
