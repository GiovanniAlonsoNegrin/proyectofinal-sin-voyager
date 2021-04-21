@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("category.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{ $category->title }}">
        </div>
        <div class="form-group">
            <label for="url_clean">Url limpia</label>
            <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $category->url_clean }}">
        </div>
    </form>
    <a class="btn btn-success border border-dark" href="{{ route('category.index') }}">Volver</a>
@endsection
