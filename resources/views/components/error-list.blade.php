@if ($errors->any())
    <div class="m-auto text-center" style="margin-bottom: -25px !important">
        @foreach ($errors->all() as $error)
            <li class="text-danger list-none">
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif