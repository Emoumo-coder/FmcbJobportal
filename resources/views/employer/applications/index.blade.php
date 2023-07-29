@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
        <x-auth.dashboard-card>
            <h1>Candidate Applications</h1>
            <p class="pxp-text-light">List candidate that applied to your job offers.</p>

            <div class="mt-4 mt-lg-5">
                <x-bulk-action />
                <x-table table_id="application-data-table">
                    <th style="width: 1%;"><input type="checkbox" class="form-check-input" id="select_all"></th>
                    <th style="width: 25%;">Name</th>
                    <th style="width: 20%;">Applied for</th>
                    <th style="width: 15%;">Status</th>
                    <th>Date<span class="fa fa-angle-up ms-3"></span></th>
                    <th>Action</th>
                </x-table>
            </div>
        </x-auth.dashboard-card>

        {{-- show form for the application --}}
    <x-modal modal_id="sendMessageFormMdl" modal_size="modal-lg">
        <div class="pxp-user-modal-fig text-center">
            <h5 class="modal-title text-center mt-4 text-capitalize" 
            id="employerSendMessageTitle"></h5>
            <div class="invalid-application-div"></div>
        </div>
        
        <x-contact-form />
    </x-modal>

    <x-auth.auth-footer />
</div>

@endsection('content')
