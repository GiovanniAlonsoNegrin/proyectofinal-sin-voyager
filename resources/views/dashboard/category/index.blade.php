@extends('dashboard.master')

@section('content')

<a class="btn btn-success btn-lg mb-3 border border-dark" href="{{ route('category.create') }}">Crear</a>

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
        @foreach ($categories as $category)
        <tr>
            <td> 
                {{ $category->id }} 
            </td>
            <td> 
                {{ $category->title }} 
            </td>
            <td> 
                {{ $category->created_at->format('d-m-Y') }} 
            </td>
            <td> 
                {{ $category->updated_at->format('d-m-Y') }} 
            </td>
            <td>
                <center>
                    <div>
                        <a class="btn btn-primary" href="{{ route('category.show',$category->id) }}">Ver</a>
                        <a class="btn btn-success" href="{{ route('category.edit',$category->id) }}">Actualizar</a>
                        
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $category->id }}" data-title={{ $category->title }}>Eliminar</button>
                        
                    </div>
                </center> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>   

{{ $categories->links() }}

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar la categoría selececionada?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form id="formDelete" action="{{ route('category.destroy',0) }}" data-action="{{ route('category.destroy',0) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>  
            </div>
        </div>
    </div>
</div> 

<script>
    window.onload = function () {
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            
            var title = button.data('title')

            action = $('#formDelete').attr('data-action').slice(0,-1)
            action += id
            // console.log(action)
            $('#formDelete').attr('action', action)

            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar la categoría: ' + title)
        });
    };
</script>

@endsection