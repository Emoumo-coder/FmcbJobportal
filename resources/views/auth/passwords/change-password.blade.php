@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <h1>Inbox</h1>
            <p class="pxp-text-light">Keep in touch with Employers, Candidates, and Company</p>

            
        </x-auth.dashboard-card>

    <x-auth.auth-footer />
</div>


@endsection('content')
@section('scripts')
<script src="{{ url('storage/js/inbox.js') }}"></script>
@endsection('scripts')

