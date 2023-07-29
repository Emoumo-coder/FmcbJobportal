<div id="alerts">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>    

    @elseif (session()->has('warning'))

        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>    

    @else
        
    @endif
</div>