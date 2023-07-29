<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateApplyListing;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\FormatController;

class ListingApplicationController extends Controller
{
    /**
     * view all the employer Listing Application
     */
    public function index(Request $request)
    {

        // $currentEmployer = Auth::user(); // Get the authenticated employer user
        //     $listings = $currentEmployer->listings; // Get the listings of the current employer

        //     $listingIds = $listings->pluck('id'); // Get the IDs of the listings

        //     $applications = CandidateApplyListing::whereIn('listing_id', $listingIds)
        //         ->with('listing:id,title') // Eager load the `listing` relationship with `id` and `title` attributes
        //         ->get();
        //     foreach($applications as $application)
        //     {
        //         dd($application);
        //     }
        // dd($applications);
        if ($request->ajax()) {
            $currentEmployer = Auth::user(); // Get the authenticated employer user
            $listings = $currentEmployer->listings; // Get the listings of the current employer

            $listingIds = $listings->pluck('id'); // Get the IDs of the listings

            $applications = CandidateApplyListing::whereIn('listing_id', $listingIds)
                ->latest()
                ->get();

            return DataTables::of($applications)
                ->editColumn('id', function ($application) {
                    $id_input = '<input type="checkbox" 
                                    name="application_id[]" value="'. $application->id .'"
                                    class="form-check-input select" />';
                    return $id_input;
                })
                
                ->addColumn('name', function ($application) {
                    $name_column = '<a href="'. $application->user->id .'">
                                            <div class="pxp-company-dashboard-job-title applicant-name" 
                                            data-name="'. $application->user->name .'">
                                            '. $application->user->name .'
                                            </div>
                                    </a>';
                    return $name_column;
                })

                ->addColumn('listing_title', function ($application) {
                    $title_column = '<a href="/listings/'. $application->listing->id .'">
                                            <div class="pxp-company-dashboard-job-title" 
                                             />
                                            '. $application->listing->title .'
                                            </div>
                                    </a>';
                    return $title_column;
                })

                ->editColumn('status', function ($application) {
                    if ($application->status == 0) {
                        $status_text = 'N/A';
                        $status_bg = 'bg-secondary';
                    }else if ($application->status == 1) {
                        $status_text = 'Approved';
                        $status_bg = 'bg-success';
                    }else{
                        $status_text = 'Rejected';
                        $status_bg = 'bg-danger';
                    }
                    
                    
                    $html = '<div class="pxp-company-dashboard-job-status">
                    <span class="badge rounded-pill '.$status_bg.'">'.$status_text.'</span>
                    </div>';
                    return $html;
                })

                ->editColumn('created_at', function ($application) {
                    $date = $application->created_at->format('Y-m-d');
                    
                    $html = '<div class="pxp-company-dashboard-job-status">
                    <div class="pxp-company-dashboard-job-date mt-1">'.$date.'</div>';
                    return $html;
                })

                ->addColumn('action', function ($application) {
                    $actionBtn = '<div class="pxp-dashboard-table-options">
                    <ul class="list-unstyled">
                        <li>
                        <form action="/employer/applications/'.$application->id.'" method="get">
                            <button title="Preview"><span class="fa fa-eye"></span></button>
                        </form>
                        </li>
                        <li>
                            <button title="Send message" id="sendMessageBtn">
                                <span class="fa fa-envelope-o"></span>
                            </button>
                        </li>
                        <li>
                            <button title="Approve" class="changeApplicationStatusBtn" data-id="'.$application->id.'" data-status="1">
                                <span class="fa fa-check"></span>
                            </button>
                        </li>
                        <li>
                            <button title="Reject" class="changeApplicationStatusBtn" data-id="'.$application->id.'" data-status="2">
                                <span class="fa fa-ban"></span>
                            </button>
                        </li>
                        <li>
                            <button title="Delete" class="deleteApplicationBtn" data-id="'.$application->id.'">
                                <span class="fa fa-trash-o"></span>
                            </button>
                        </li>
                    </ul>
                </div>';
                    return $actionBtn;
                })
                ->removeColumn(['user_id'])
                ->rawColumns(['id', 'name', 'listing_title', 'status', 'created_at', 'action'])
                ->make(true);
        }

        return view('employer.applications.index');
    }

    /**
     * Display the specified application.
     */
    public function show(CandidateApplyListing $application)
    {
        $application->load('user:id,username,gender', 'listing:id,title', 'user.profile:id,user_id,cover_photo,photo,title');
        
        return \view('employer.applications.show', compact('application'));
    }

    /**
     * change the application status
     */
    public function changeStatus(Request $request)
    {
        $application = CandidateApplyListing::find($request->id);
        if ($application) {
            $application->status = $request->status;
            $application->save();

            // Set a flash message

            return response()->json(['success' => true, 'message' => 'Application status updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Application status failed to updated successfully.']);
    }

    /**
     * Remove the specified application from storage.
     */
    public function destroy(CandidateApplyListing $application)
    {
        if (FormatController::deleteFile($application->resume, 'storage')) {
            if ($application->delete()) {
                return response()->json(['success' => true, 'message' => 'Application deleted successfully!']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Application deletion failed!']);
    }

    /**
     * perform the bulk operation
     */
    public function bulkAction (Request $request)
    {
        $action = $request->input('action');
        $applicationIds = $request->input('applicationIds');

        switch ($action) {
            case 'delete':
                // Delete the selected applications
                $applications = CandidateApplyListing::whereIn('id', $applicationIds)->get();

                foreach ($applications as $application) {
                    // Delete the resume file
                    if (FormatController::deleteFile($application->resume, 'storage')){
                        // Delete the application record
                        $application->delete();
                    }
                }
                break;
            case 'approve':
                // Approve the selected applications
                CandidateApplyListing::whereIn('id', $applicationIds)->update(['status' => 1]);
                break;

            case 'reject':
                // Reject the selected applications
                CandidateApplyListing::whereIn('id', $applicationIds)->update(['status' => 2]);
                break;
            
            default:
                // Invalid action
                return response()->json(['success' => false, 'errors' => 'Invalid action'], 422);
                break;
        }
        
        return response()->json(['success' => true, 'message' => 'Bulk action performed successfully!'], 200);
    }
}
