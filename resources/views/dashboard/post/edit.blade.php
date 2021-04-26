@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("post.update", $post->id) }}" method="post">
        @method('put')
        @include('dashboard.post._form')
    </form>

    <br>

    <form action="{{ route("post.image", $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col">
                <input class="btn btn-success" type="submit" value="Subir">
            </div>  
        </div>
        
    </form>

@endsection
