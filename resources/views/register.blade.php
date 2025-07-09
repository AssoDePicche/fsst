@extends('layouts.guest')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <h1>Cadastre-se</h1>

        <x-input name="name" type="text" label="Nome" required />

        <x-input name="email" type="email" label="E-mail" required />

        <x-input name="password" type="password" label="Senha" required />

        <x-button text="Cadastrar" />

        <a href="/login">Já possui uma conta?</a>
    </form>
@endsection
