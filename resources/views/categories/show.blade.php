@extends('layouts.client')

@section('content')
    <h1>{{ $category->name }}</h1>

    <h2>Subcategorias</h2>

    @if($category->children()->count() == 0)
        <p>Esta categoria não possui nenhuma subcategoria.</p>
    @else
        <p>Esta categoria possui {{ $category->children()->count() }} subcategoria(s).</p>

        @foreach($category->children()->get() as $child)
            <x-category-card :category="$child" />
        @endforeach
    @endif

    <h2>Produtos desta categoria</h2>

    @if($category->products()->count() == 0)
        <p>Não há nenhum produto cadastrado nesta categoria, mas não se preocupe, <a class="fw-bold" href="{{ route('products.index') }}">associe um produto agora mesmo</a>.</p>
    @else
        @foreach($category->products()->get() as $product)
            <x-product-card :product="$product" />
        @endforeach
    @endif
@endsection
