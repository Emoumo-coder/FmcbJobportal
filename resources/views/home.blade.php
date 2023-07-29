@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
                {{ Auth::user()->name }}

                @can('isAdmin')
                    Mugu mddhdhdh
                @endcan
            </div>
        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')

