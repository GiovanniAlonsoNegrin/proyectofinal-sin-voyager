@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("post.update", $post->id) }}" method="post">
        @method('put')
        @include('dashboard.post._form')
    </form>

@endsection
