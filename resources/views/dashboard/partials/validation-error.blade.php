@if ($errors->any())
    <div class="alert alert-danger text-center">
            Ha ocurrido un error
    </div>
@endif

{{-- @if ($errors->any())  
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">
            {{ $error }}
        </div>
    @endforeach
@endif --}}