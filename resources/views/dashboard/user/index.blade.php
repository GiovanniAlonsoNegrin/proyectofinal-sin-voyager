@extends('dashboard.master')

@section('content')

<a class="btn btn-success btn-lg mb-3 border border-dark" href="{{ route('user.create') }}">Crear</a>

<table class="table table-striped table-dark">
    <thead>
        <tr>
            <td>
                ID
            </td>
            <td>
                Nombre
            </td>
            <td>
                Apellido
            </td>
            <td>
                Email
            </td>
            <td>
                Rol
            </td>
            <td>
                <center>Acciones</center>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td> 
                {{ $user->id }} 
            </td>
            <td> 
                {{ $user->name }} 
            </td>
            <td> 
                {{ $user->surname }} 
            </td>
            <td> 
                {{ $user->email }} 
            </td>
            <td> 
                {{ $user->rol->key }} 
            </td>
            <td>
                <center>
                    <div>
                        <a class="btn btn-primary" href="{{ route('user.show',$user->id) }}">Ver</a>
                        <a class="btn btn-success" href="{{ route('user.edit',$user->id) }}">Actualizar</a>
                        
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" data-name={{ $user->name }}>Eliminar</button>
                        
                    </div>
                </center> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>   

{{ $users->links() }}

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
                <p>¿Seguro que desea borrar el usuario selececionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form id="formDelete" action="{{ route('user.destroy',0) }}" data-action="{{ route('user.destroy',0) }}" method="post">
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
            
            var name = button.data('name')

            action = $('#formDelete').attr('data-action').slice(0,-1)
            action += id
            // console.log(action)
            $('#formDelete').attr('action', action)

            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar al usuario: ' + name )
        });
    };
</script>

@endsection