@extends('dashboard.master')

@section('content')

<a class="btn btn-success btn-lg mb-3 border border-dark" href="{{ route('post.create') }}">Crear</a>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <td>
                ID
            </td>
            <td>
                Titulo
            </td>
            <td>
                Posteado
            </td>
            <td>
                Creación
            </td>
            <td>
                Actualización
            </td>
            <td>
                <center>Acciones</center>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td> 
                {{ $post->id }} 
            </td>
            <td> 
                {{ $post->title }} 
            </td>
            <td> 
                {{ $post->posted }} 
            </td>
            <td> 
                {{ $post->created_at->format('d-m-Y') }} 
            </td>
            <td> 
                {{ $post->updated_at->format('d-m-Y') }} 
            </td>
            <td>
                <center>
                    <div>
                        <a class="btn btn-primary" href="{{ route('post.show',$post->id) }}">Ver</a>
                        <a class="btn btn-success" href="#">Actualizar</a>
                        <a class="btn btn-danger" href="#">Eliminar</a>
                    </div>
                </center> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>   

{{ $posts->links() }}

@endsection
