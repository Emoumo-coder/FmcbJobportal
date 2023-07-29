<div class="pxp-dashboard-inbox-messages-header">
    <div class="pxp-dashboard-inbox-list-item-left">
        <div class="pxp-dashboard-inbox-list-item-avatar pxp-cover" 
        style="background-image: url({{ asset('storage/images/profile_photos/'. ($user->profile && $user->profile->photo ? $user->profile->photo : ($user->gender == 'male' ? 'avatar-1.jpg' : 'avatar-3.jpg'))) }});"></div>
        <div class="pxp-dashboard-inbox-list-item-name ms-2">{{ $user->username }}</div>
    </div>
    <div class="d-flex align-items-center">
        <div class="pxp-dashboard-inbox-list-item-options">
            <button title="Delete conversation" data-user-id="{{ $user->id }}"><span class="fa fa-trash-o"></span></button>
        </div>
        <button class="btn rounded-pill pxp-dashboard-inbox-messages-close-btn d-inline-block d-xxl-none"><span class="fa fa-angle-left"></span> Back</button>
    </div>
</div>
<div class="pxp-dashboard-inbox-messages-content">
    @if (empty($conversationData))
    <p class="text-center">No messages yet. Start a conversation.</p>
    @else
    @foreach ($conversationData as $message)
    @include('partials.__message_item')
    @endforeach
    @endif
</div>
<form class="pxp-dashboard-inbox-messages-footer">
    <div class="pxp-dashboard-inbox-messages-footer-field">
        <input type="text" 
            name="message_content"
            class="form-control shadow-lg inbox-input"
            placeholder="Type your message here..."
             />
        <input type="hidden" name="userId" value="{{ $user->id }}">
        <input 
            type="hidden" 
            id="lastMessageTimestamp"
            name="lastMessageTimestamp" value="{{ $lastMessageTimestamp  }}" />
    </div>
    <div class="pxp-dashboard-inbox-messages-footer-btn ms-1 shadow-lg">
        <button class="btn rounded-right pxp-section-cta not-active send-btn">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</form>