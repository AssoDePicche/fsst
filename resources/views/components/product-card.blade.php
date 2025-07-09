<div class="shadow-sm mb-3">
    <div class="d-flex align-items-center justify-content-between p-2">
        <div>
            <h5 class="card-title">{{ $product->name }}</h5>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('products.show', $product->id) }}" class="btn btn-link">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-link">
                <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>
