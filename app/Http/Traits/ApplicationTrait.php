<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

trait ApplicationTrait
{
    function GetApplicationDataTable ($applications)  
    {
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
                        <form action="/'. $this->GetUrlPrefix() .'/applications/'.$application->id.'" method="get">
                            <button title="Preview"><span class="fa fa-eye"></span></button>
                        </form>
                        </li>';
                    if (Gate::allows('isEmployer') && Auth::user()->id != $application->user_id) {
                        $actionBtn .= ' <li>
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
                                        </li>';
                    }
                    $actionBtn .='  <li>
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

    private function GetUrlPrefix ():string
    {
        return Gate::allows('isEmployer') ? 'employer' : 'candidate';
    }
}