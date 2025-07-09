@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome da Categoria</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Atualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
