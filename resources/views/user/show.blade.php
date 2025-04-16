<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Usuário</title>
</head>
<body>

    <a href="{{ route('user.index')}}"> Listar </a>
    <a href=" {{ route('user.edit', ['user'=> $user->id]) }}"> Editar</a>

    {{-- <a href=" {{ route('user.destroy', ['user'=> $user->id]) }}"> Apagar </a> --}}

    <form method="POST" action="{{ route('user.destroy', ['user'=> $user->id])}}">
        @csrf
        @method('delete')
        <button type="submit" onclick=" return confirm('Tem certeza que deseja excluir o usuário {{ $user->name }}?')">Apagar</button>
    
    </form>
    
    <h1>Visualizar Usuário</h1>

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>

    {{-- Cadastrado em: {{ ($user-> create_at) }} --}}
    Cadastrado em: {{ \Carbon\Carbon::parse( $user->create_at)->format('d/m/Y H:i:s')}}<br>
    Editado em {{ \Carbon\Carbon::parse( $user->update_at)->format('d/m/Y H:i:s')}}<br>

    
</body>
</html>