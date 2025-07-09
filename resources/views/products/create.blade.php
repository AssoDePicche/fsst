@extends('layouts.client')

@section('content')
    <h1>Novo produto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <x-input name="name" type="text" label="Nome" required />

        <div class="mb-3">
            <label for="parent_id" class="form-label">Categoria</label>

            <select class="form-select mb-3" name="category_id">
                <option value="" selected>Selecione uma categoria</option>
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

        <x-input name="price" type="number" label="Valor unitário" required />

        <x-input name="quantity" type="number" label="Quantidade em estoque" required />

        <x-input name="min_quantity" type="number" label="Quantidade mínima em estoque" required />

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>

            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <x-button text="Adicionar" />

        <a href="/products">Voltar</a>
    </form>
@endsection
