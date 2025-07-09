@extends('layouts.client')

@section('content')
    <h1>Editar produto</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method("PUT")

        <x-input name="name" type="text" label="Nome" value="{{ $product->name }}" required />

        <div class="mb-3">
            <label for="parent_id" class="form-label">Categoria</label>

            <select class="form-select mb-3" name="category_id">
                @foreach(auth()->user()->categories()->get() as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('parent_id')
                <span class="form-text">{{ $message }}</span>
            @enderror
        </div>

        <x-input name="price" type="number" label="Valor unitário" value="{{ $product->price }}" required />

        <x-input name="quantity" type="number" label="Quantidade em estoque" value="{{ $product->quantity }}" required />

        <x-input name="min_quantity" type="number" label="Quantidade mínima em estoque" value="{{ $product->min_quantity }}" required />

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>

            <textarea id="description" name="description" class="form-control">
                {{ $product->description }}
            </textarea>
        </div>

        <x-button text="Salvar" />

        <a href="/products">Voltar</a>
    </form>
@endsection
