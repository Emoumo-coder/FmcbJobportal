@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <h1>Inbox</h1>
            <p class="pxp-text-light">Keep in touch with Employers, Candidates, and Company</p>

            <div class="row mt-4 mt-lg-5">
                <div class="col-xxl-4">
                    <div class="pxp-dashboard-inbox-search-form">
                        <div class="input-group">
                            <span class="input-group-text"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control" placeholder="Search messages...">
                        </div>
                    </div>

                    <div class="mt-3 mt-lg-4 pxp-dashboard-inbox-list">
                        <ul class="list-unstyled">
                            @switch($users)
                                @case(!empty($users))
                                    @foreach ($users as $user)
                                    <li class="pxp-active">
                                        <a href="#" class="pxp-dashboard-inbox-list-item" data-user-id="{{ $user->id }}">
                                            <div class="pxp-dashboard-inbox-list-item-top">
                                                <div class="pxp-dashboard-inbox-list-item-left">
                                                    <div class="pxp-dashboard-inbox-list-item-avatar pxp-cover" 
                                                    style="background-image: url({{ asset('storage/images/profile_photos/'. ($user->profile && $user->profile->photo ? $user->profile->photo : ($user->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"></div>
                                                    <div class="pxp-dashboard-inbox-list-item-name ms-2">{{ $user->username }}</div>
                                                </div>
                                                <div class="pxp-dashboard-inbox-list-item-right">
                                                    <div class="pxp-dashboard-inbox-list-item-time">
                                                        @if ($user->latest_message)
                                                            {{ $user->latest_message[0]['time'] }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex justify-content-between">
                                                <div class="pxp-dashboard-inbox-list-item-text pxp-text-light">
                                                    @if ($user->latest_message)
                                                        {{ $user->latest_message[0]['content'] }}
                                                    @endif
                                                </div>
                                                <div class="pxp-dashboard-inbox-list-item-no ms-3">
                                                    <span class="badge rounded-pill">
                                                        {{ $user->unread_count }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                    @break
                            
                                @default
                                    <p class="text-center">No user to start conversation with.</p>
                            @endswitch
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-8">
                    <div class="pxp-dashboard-inbox-messages-container" 
                        data-="">
                        <div class="d-flex align-items-center justify-content-center flex-column p-2 h-100">
                            <img 
                                src="{{ asset('storage/images/start-conversation.png') }}" 
                                alt="Start conversation"
                                class="img-fluid mb-2"
                                />
                            <p class="text-center">Select user to start conversation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </x-auth.dashboard-card>

    <x-auth.auth-footer />
</div>


@endsection('content')
@section('scripts')
<script src="{{ url('storage/js/inbox.js') }}"></script>
@endsection('scripts')

