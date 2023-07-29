{{-- @dd($activeUsers)   --}}
<ul class="list-unstyled" wire:poll.1000ms="pollUsers">
    @switch($activeUsers)
        @case(!empty($activeUsers))
            
            @foreach ($activeUsers as $user)
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
                                @dd($user)
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
