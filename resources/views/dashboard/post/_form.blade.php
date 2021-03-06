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
    <label for="categories_id">Categorías</label>
    <select class="js-example-basic-multiple js-states form-control" name="categories_id[]" id="categories_id" multiple="multiple">
        @forelse ($categories as $title => $id)
            <option {{ in_array($id, old('categories_id') ?: $post->categories->pluck("id")->toArray()) ? "selected" : "" }} value="{{ $id }}" id="{{ $id }}">{{ $title }}</option>
        @empty
            <option>No hay categorías</option>
        @endforelse
    </select>
</div>

<div class="form-group">
    <label for="posted">Posteado</label>
    <select class="form-control" name="posted" id="posted">
        @include('dashboard.partials.option-yes-not', ['val' => $post->posted])
    </select>
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea class="form-control" name="content" id="content" rows="">{{ old('content', $post->content) }}</textarea>

    @error('content')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> 
<button class="btn btn-primary" type="submit">Enviar</button>
<a class="btn btn-secondary" href="{{ route('post.index') }}">Cancelar</a>

<script>
    window.onload = function () { 
        $(document).ready(function() {
            $('#categories_id').select2();
        });
    }   
</script>