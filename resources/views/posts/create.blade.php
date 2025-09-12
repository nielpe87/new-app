@extends('app')

@section('css')
<style>

    .titulo {
        color: red;
    }
</style>
@endsection

@section('content')
<h1 class="titulo">Criar Post</h1>
<form action="{{ route("posts.store") }}" method="post">
    @csrf
    <div class="group m-3">
        <label for="">Titulo:</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="group m-3">
        <label for="">Descrição</label>
        <input type="text" class="form-control" name="description">
    </div>

    <button class="btn btn-primary" type="submit">Salvar</button>

</form>
@endsection
