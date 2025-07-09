@extends('layouts.client')

@section('content')
    <h1>Nova transação</h1>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Produto</label>

            <select class="form-select mb-3" name="product_id">
                @foreach(auth()->user()->products()->get() as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>

            @error('product_id')
                <span class="form-text">{{ $message }}</span>
            @enderror
        </div>

        <x-input name="quantity" type="number" label="Quantidade" required />

        <div class="mb-3">
            <label for="type" class="form-label">Tipo de transação</label>

            <select class="form-select mb-3" name="type">
                <option value="entry">Entrada</option>
                <option value="exit">Saída</option>
            </select>

            @error('product_id')
                <span class="form-text">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Observações</label>

            <textarea id="notes" name="notes" class="form-control"></textarea>
        </div>

        <x-button text="Adicionar" />

        <a href="/transactions">Voltar</a>
    </form>
@endsection
