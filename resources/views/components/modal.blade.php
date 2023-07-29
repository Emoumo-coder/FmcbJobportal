@props(['modal_id', 'modal_size' => ''])
<div class="modal fade pxp-user-modal" id="{{ $modal_id }}" aria-hidden="true" aria-labelledby="{{ $modal_id }}Modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered {{ $modal_size }}">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>