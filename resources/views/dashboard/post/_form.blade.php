@csrf
<div class="form-group">
    <label for="title">Título</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">

    @error('title')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input class="form-control" type="text" name="url_clean" id="url_clean" value="{{ old('url_clean', $post->url_clean) }}">
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea class="form-control" name="content" id="content" rows="">{{ old('content', $post->content) }}</textarea>

    @error('content')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> 
<button class="btn btn-primary" type="submit">Enviar</button>
<a class="btn btn-success border border-dark" href="{{ route('post.index') }}">Volver</a>
