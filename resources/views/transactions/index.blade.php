@extends('layouts.client')

@section('content')
    @if(auth()->user()->transactions()->count() == 0)
        <h1>Ops!</h1>

        <p>Não há nenhuma transação cadastrada, mas não se preocupe, <a class="fw-bold" href="{{ route('transactions.create') }}">cadastre uma transação agora mesmo</a>.</p>
    @else
        <div class="mb-4">
            <a href="{{ route('transactions.create') }}">
                <span>Adicionar</span>
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <table class="table">
            <thead>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Total (R$)</th>
            </thead>
            <tbody>
                @foreach(auth()->user()->transactions()->get() as $transaction)
                    <tr>
                        <td>
                            <a href="{{ route('products.show', $transaction->product()->first()->id) }}">
                                {{ $transaction->product()->first()->name }}
                            </a>
                        <td>
                        <span class="badge badge-pill badge-{{
                            $transaction->type === 'entry' ? 'success' : 'danger'
                        }}">
                            {{ $transaction->type === 'entry' ? 'Entrada' : 'Saída' }}
                        </span>
                        </td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->price }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endif
@endsection
