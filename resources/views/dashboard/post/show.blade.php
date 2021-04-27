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
            <label for="categories_id">Categorías</label>
            <select disabled class="js-example-basic-multiple js-states form-control" name="categories_id[]" id="categories_id" multiple="multiple">
                @forelse ($categories as $title => $id)
                    <option {{ in_array($id, old('categories_id') ?: $post->categories->pluck("id")->toArray()) ? "selected" : "" }} value="{{ $id }}" id="{{ $id }}">{{ $title }}</option>
                @empty
                    <option>No hay categorías</option>
                @endforelse
            </select>
        </div>

        <div class="form-group">
            <label for="posted">Posteado</label>
            <select disabled class="form-control" name="posted" id="posted">
                @include('dashboard.partials.option-yes-not', ['val' => $post->posted])
            </select>
        </div>

        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea readonly class="form-control" name="content" id="content" rows="">{{ $post->content }}</textarea>
        </div> 
    </form>
    <a class="btn btn-secondary border border-dark" href="{{ route('post.index') }}">Cancelar</a>
@endsection

<script>
    window.onload = function () { 
        $(document).ready(function() {
            $('#categories_id').select2();
        });
    }   
</script>