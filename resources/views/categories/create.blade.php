@extends('layouts.client')

@section('content')
    <h1>Nova categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <x-input name="name" type="text" label="Nome" required />

        <div class="mb-3">
            <label for="parent_id" class="form-label">Subcategoria de</label>

            <select class="form-select mb-3" name="parent_id">
                <option value="" selected>Nenhuma</option>
                @foreach(auth()->user()->categories()->get() as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('parent_id')
                <span class="form-text">{{ $message }}</span>
            @enderror
        </div>

        <x-button text="Adicionar" />

        <a href="/categories">Voltar</a>
    </form>
@endsection
