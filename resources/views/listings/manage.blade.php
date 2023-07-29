@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
        <x-auth.dashboard-card>
            <h1>Manage Jobs</h1>
            <p class="pxp-text-light">Detailed list with all your job offers.</p>

            <div class="mt-4 mt-lg-5">
                <div class="row justify-content-between align-content-center">
                    <div class="col-auto order-2 order-sm-1">
                        <div class="pxp-company-dashboard-jobs-bulk-actions mb-3">
                            <select class="form-select">
                                <option>Bulk actions</option>
                                <option>Edit</option>
                                <option>Delete</option>
                            </select>
                            <button class="btn ms-2">Apply</button>
                        </div>
                    </div>
                    <div class="col-auto order-1 order-sm-2">
                        <div class="pxp-company-dashboard-jobs-search mb-3">
                            <div class="pxp-company-dashboard-jobs-search-results me-3">16 jobs</div>
                            <div class="pxp-company-dashboard-jobs-search-search-form">
                                <div class="input-group">
                                    <span class="input-group-text"><span class="fa fa-search"></span></span>
                                    <input type="text" class="form-control" placeholder="Search jobs...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table data-table table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 1%;">S/N</th>
                                <th style="width: 25%;">Title</th>
                                <th style="width: 20%;">Department</th>
                                <th style="width: 12%;">Type</th>
                                <th>Date<span class="fa fa-angle-up ms-3"></span></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td>
                                    <a href="#">
                                        <div class="pxp-company-dashboard-job-title">Software developer</div>
                                        <div class="pxp-company-dashboard-job-location"><span class="fa fa-globe me-1"></span>San Francisco, CA</div>
                                    </a>
                                </td>
                                <td><div class="pxp-company-dashboard-job-category">Software Engineering</div></td>
                                <td><div class="pxp-company-dashboard-job-type">Full-time</div></td>
                                <td><a href="#" class="pxp-company-dashboard-job-applications">3 Candidates</a></td>
                                <td>
                                    <div class="pxp-company-dashboard-job-status"><span class="badge rounded-pill bg-success">Published</span></div>
                                    <div class="pxp-company-dashboard-job-date mt-1">2020/08/24 at 11:56 am</div>
                                </td>
                                <td>
                                    <div class="pxp-dashboard-table-options">
                                        <ul class="list-unstyled">
                                            <li><button title="Edit"><span class="fa fa-pencil"></span></button></li>
                                            <li><button title="Preview"><span class="fa fa-eye"></span></button></li>
                                            <li><button title="Delete"><span class="fa fa-trash-o"></span></button></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr> --}}
                            
                        </tbody>
                    </table>

                    <div class="row mt-4 mt-lg-5 justify-content-between align-items-center">
                        <div class="col-auto">
                            <nav class="mt-3 mt-sm-0" aria-label="Jobs list pagination">
                                <ul class="pagination pxp-pagination">
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">1</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn rounded-pill pxp-section-cta mt-3 mt-sm-0">Show me more<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')
