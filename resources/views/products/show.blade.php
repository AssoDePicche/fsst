@extends('layouts.client')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p>Categoria: {{ $product->category->name }}</p>

    <p>Valor unitário: R$ {{ number_format($product->price, 2) }}</p>

    <p>Valor total em estoque: R$ {{ number_format($product->price * $product->quantity, 2) }}</p>

    <p>Quantidade em estoque: {{ $product->quantity }}</p>

    <p>Quantidade mínima em estoque: {{ $product->min_quantity }}</p>

    <h3>Descrição</h3>

    <p>{{ $product->description }}</p>

    <h2>Transações</h2>

    @if($product->transactions()->count() == 0)
        <p>Não há nenhuma transação associada a este produto, mas não se preocupe, <a class="fw-bold" href="{{ route('transactions.index') }}">associe uma transação agora mesmo</a>.</p>
    @else
        <table class="table">
            <thead>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Observações</th>
            </thead>
            <tbody>
                @foreach($product->transactions()->get() as $transaction)
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-{{
                                $transaction->type === 'entry' ? 'success' : 'danger'}}">
                                {{ $transaction->type === 'entry' ? 'Entrada' : 'Saída' }}
                            </span>
                        </td>
                        <td>
                            {{ $transaction->quantity }}
                        </td>
                        <td>
                            {{ $transaction->notes ?? 'Nenhuma observação' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
