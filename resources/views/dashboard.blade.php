@extends('layouts.client')

@section('content')
    <h1>Olá, {{ auth()->user()->name }}</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <x-infobox
                text="Categorias"
                count="{{ auth()->user()->categories()->count() }}"
                icon="fa-list"
                link=""
                footerText="Veja, crie e edite categorias"
            />
        </div>
        <div class="col">
            <x-infobox
                text="Produtos"
                count="{{ auth()->user()->products()->count() }}"
                icon="fa-box"
                link="/products"
                footerText="Veja, crie e edite produtos"
            />
        </div>
        <div class="col">
            <x-infobox
                text="Transações"
                count="{{ auth()->user()->transactions()->count() }}"
                icon="fa-receipt"
                link="/transactions"
                footerText="Veja e adicione transações"
            />
        </div>
    </div>
@endsection
