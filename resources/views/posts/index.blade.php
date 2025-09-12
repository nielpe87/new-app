@extends('app')

@section('content')
<h1 class="titulo">Lista de Posts</h1>
<a class="btn btn-success btn-sm" href="{{ route('posts.create') }}">Novo</a>
<table class="table table-houve">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Editar</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf()
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    alert("Listar posts")
</script>
@endsection


