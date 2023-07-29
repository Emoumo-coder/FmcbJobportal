@extends('layouts.app')

@section('content')
<x-auth.sidebar />
    
<div class="pxp-dashboard-content">
    <x-auth.auth-header />
    
        <x-auth.dashboard-card>
            <h1>Edit Profile</h1>
            <p class="pxp-text-light">Edit your candidate profile page info.</p>

            <x-form.basic-profile-form :user="$employer" user_type="employer"  />

            <form>
                <div class="mt-4 mt-lg-5">
                    <h2>Social media links</h2>
                    <div class="pxp-candidate-dashboard-skills mb-3">
                        <ul class="list-unstyled" id="socialLinkList">
                            @unless (empty($employer->socialMediaLinks))
                                @forelse ($employer->socialMediaLinks as $social_link)
                                    <li>
                                        <a href="{{ $social_link->link }}" target="_blank" rel="noopener noreferrer">
                                            {{ $social_link->link }}<span data-id="{{ $social_link->id }}" class="fa fa-trash-o remove-social-link"></span>
                                        </a>
                                    </li>
                                @empty
                                    
                                @endforelse
                            @endunless
                        </ul>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="scoialMeidaLinkInput" class="form-control" placeholder="https://facebook.com/umarumar">
                        <button class="btn" id="addSocialMediaLinkBtn">Add link</button>
                    </div>
                </div>
            </form>

        </x-auth.dashboard-card>
    <x-auth.auth-footer />
</div>

@endsection('content')

