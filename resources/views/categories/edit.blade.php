@extends('layouts.client')

@section('content')
    <h1>Editar categoria</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method("PUT")

        <x-input name="name" type="text" label="Nome" value="{{ $category->name }}" required />

        <div class="mb-3">
            <label for="parent_id" class="form-label">Subcategoria de</label>

            <select class="form-select mb-3" name="parent_id">
                <option value="">Nenhuma</option>
                @foreach(auth()->user()->categories()->get() as $c)
                    @if($category->id !== $c->id)
                    <option value="{{ $c->id }}" {{ $category->parent_id === $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                    @endif
                @endforeach
            </select>

            @error('parent_id')
                <span class="form-text">{{ $message }}</span>
            @enderror
        </div>

        <x-button text="Salvar" />

        <a href="/categories">Voltar</a>
    </form>
@endsection
