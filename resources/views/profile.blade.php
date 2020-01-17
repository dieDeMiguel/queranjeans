@extends('plantilla')

@section("titulo")

QueranJeans - PERFIL

@endsection

@section("principal")

    <div class="perfil" style="display: flex; flex-direction: column; align-items: center; margin-top:200px;">
            <h2 style="text-decoration: underline; margin-bottom: 30px;">Tu perfil:</h2> 
            <h2>Nombre Completo: {{$user->name}} {{$user->surname}}</h2>
            <h2>Email: {{$user->email}}</h2>
            
            <br>
            <img class="imgAvatarEdit" src='{{$user->avatar}}' alt="avatar usuario" style="width:300px; height: 300px; border-radius: 150px; border: 1px solid grey;">
            <br>
            <a href="edit" style="font-weight: bold; text-transform: uppercase; text-decoration: none; color: slategrey;">Hace Click aca para editar tus datos!</a>
        </div>        
    </div>
@endsection
