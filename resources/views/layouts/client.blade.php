@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="">Produtos</a></li>
            </ul>
        </div>
    </div>
</nav>
@endsection
