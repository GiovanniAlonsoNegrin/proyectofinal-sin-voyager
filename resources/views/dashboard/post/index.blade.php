@extends('dashboard.master')

@section('content')

<table class="table">
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
                Acciones
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
        </tr>
        @endforeach
    </tbody>
</table>   
@endsection
