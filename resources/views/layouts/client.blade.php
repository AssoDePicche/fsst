@extends('layouts.app')

@section('navbar')
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand text-bold" href="/dashboard">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
        <a class="nav-link" href="/categories">Categorias</a>
        <a class="nav-link" href="/products">Produtos</a>
        <a class="nav-link" href="/transactions">Transações</a>
        <a class="nav-link" href="/logout">Sair</a>
      </div>
    </div>
  </div>
</nav>
@endsection
