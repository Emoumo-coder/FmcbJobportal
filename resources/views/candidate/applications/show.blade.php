@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
        <x-auth.dashboard-card>
           @include('partials.__show_application')
        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')