@props(['table_id'])

<div class="table-responsive">
    <table class="table table-hover align-middle" id="{{ $table_id }}">
        <thead>
            <tr>
                {{ $slot }}
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>