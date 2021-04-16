@extends('dashboard.master')

@section('content')
    {{-- @if ($errors->any())  
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger text-center">
                {{ $error }}
            </div>
        @endforeach
    @endif --}}

    @if ($errors->any())
        <div class="alert alert-danger text-center">
                Ha ocurrido un error
        </div>
    @endif
            
    <form action="{{ route("post.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" type="text" name="title" id="title">
        
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input class="form-control" type="text" name="url_clean" id="url_clean">
        </div>
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" name="content" id="content" rows=""></textarea>

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> 
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
@endsection


