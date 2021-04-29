@extends('dashboard.master')

@section('content')
    
    @include('dashboard.partials.validation-error')

    <form action="{{ route("user.store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="surname">Surame</label>
            <input readonly class="form-control" type="text" name="surname" id="surname" value="{{ $user->surname }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input readonly class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input readonly class="form-control" type="text" name="rol" id="rol" value="{{ $user->rol->key }}">
        </div>
    </form>
    <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancelar</a>
@endsection
