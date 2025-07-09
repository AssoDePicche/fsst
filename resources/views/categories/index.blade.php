@extends('layouts.client')

@section('content')
    @if(auth()->user()->categories()->count() == 0)
        <h1>Ops!</h1>

        <p>Não há nenhuma categoria cadastrada, mas não se preocupe, <a class="fw-bold" href="{{ route('categories.create') }}">cadastre uma categoria agora mesmo</a>.</p>
    @else
        <div class="mb-4">
            <a href="{{ route('categories.create') }}">
                <span>Adicionar</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        @foreach(auth()->user()->categories()->get() as $category)
            <x-category-card :category="$category" />
        @endforeach
    @endif
@endsection
