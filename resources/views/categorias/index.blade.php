<h1>Categorias</h1>
<a href="{{ route('categorias.create') }}">Nova Categoria</a>
<ul>
@foreach ($categorias as $cat)
    <li>
        {{ $cat->nome }}
        <a href="{{ route('categorias.edit', $cat) }}">Editar</a>
        <form action="{{ route('categorias.destroy', $cat) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </li>
@endforeach
</ul>
