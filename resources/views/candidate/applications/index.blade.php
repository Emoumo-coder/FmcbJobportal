@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
        <x-auth.dashboard-card>
            <h1>My Applications</h1>
            <p class="pxp-text-light">List jobs you applied for.</p>

            <div class="mt-4 mt-lg-5">
                <x-bulk-action />
                <x-table table_id="candidateApplication-data-table">
                    <th style="width: 1%;"><input type="checkbox" class="form-check-input" id="select_all"></th>
                    <th style="width: 25%;">Name</th>
                    <th style="width: 20%;">Applied for</th>
                    <th style="width: 15%;">Status</th>
                    <th>Date<span class="fa fa-angle-up ms-3"></span></th>
                    <th class="text-center">Action</th>
                </x-table>
            </div>
        </x-auth.dashboard-card>

    <x-auth.auth-footer />
</div>

@endsection('content')
