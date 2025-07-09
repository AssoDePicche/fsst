@extends('layouts.client')

@section('content')
    @if(auth()->user()->products()->count() == 0)
        <h1>Ops!</h1>

        <p>Não há nenhum produto cadastrado, mas não se preocupe, <a class="fw-bold" href="{{ route('products.create') }}">cadastre um produto agora mesmo</a>.</p>
    @else
        <div class="mb-4">
            <a href="{{ route('products.create') }}">
                <span>Adicionar</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        @foreach(auth()->user()->products()->get() as $product)
            <x-product-card :product="$product" />
        @endforeach
    @endif
@endsection
