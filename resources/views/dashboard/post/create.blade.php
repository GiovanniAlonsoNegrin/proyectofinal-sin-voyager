@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("post.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
        
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{ old('url_clean') }}">
        </div>
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" name="content" id="content" rows="">{{ old('content') }}</textarea>

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> 
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
@endsection


