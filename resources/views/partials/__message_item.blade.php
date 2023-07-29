<div class="pxp-dashboard-inbox-messages-item">
    <div class="row justify-content-{{ $message['is_self'] ? 'end' : 'start' }}">
        <div class="col-7">
            <div class="pxp-dashboard-inbox-messages-item-header {{ $message['is_self'] ? 'flex-row-reverse' : '' }}">
                
                <div class="pxp-dashboard-inbox-messages-item-time pxp-text-light {{ $message['is_self'] ? 'me-3' : 'ms-3' }}">{{ $message['time'] }}</div>
            </div>
            <div class="pxp-dashboard-inbox-messages-item-message {{ $message['is_self'] ? 'pxp-is-self' : 'pxp-is-other' }} mt-2">
                {{ $message['content'] }}
            </div>
        </div>
    </div>
</div>