@extends('layouts.guest')

@section('content')
    <form action="/register" method="POST">
        @csrf

        <h1>Entrar</h1>

        <x-input name="email" type="email" label="E-mail" required />

        <x-input name="password" type="password" label="Senha" required />

        <x-button text="Entrar" />

        <a href="/register">Ainda não possui uma conta?</a>
    </form>
@endsection
