@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
        <form action="/listings/{{ $listing->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            @php
                $mode = 'edit';
            @endphp
            
            @include('partials.__create_job_sect1')

            @include('partials.__create_job_sect2')

            @include('partials.__create_job_sect3')
            
        </form>
        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')
