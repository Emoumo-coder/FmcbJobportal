<div class="row justify-content-between align-content-center">
    <div class="col-auto order-2 order-sm-1">
        <div class="pxp-company-dashboard-jobs-bulk-actions mb-3">
            <select class="form-select" id="bulkActionSelect">
                <option value="">Bulk actions</option>
                <option value="delete">Delete</option>
                @can('isEmployer')
                    <option value="approve">Approve</option>
                    <option value="reject">Reject</option>
                @endcan
            </select>
            
            <button class="btn ms-2" id="applicationBulkActionBtn" 
            data-table-id="@can('isEmployer') application-data-table @endcan 
            @can('isUser') candidateApplication-data-table @endcan">Apply</button>
        </div>
    </div>
    
</div>