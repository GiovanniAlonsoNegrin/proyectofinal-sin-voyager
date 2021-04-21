@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("post.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $post->url_clean }}">
        </div>
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea readonly class="form-control" name="content" id="content" rows="">{{ $post->content }}</textarea>
        </div> 
    </form>
    <a class="btn btn-success border border-dark" href="{{ route('post.index') }}">Volver</a>
@endsection
