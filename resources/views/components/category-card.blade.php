<div class="shadow-sm mb-3">
    <div class="d-flex align-items-center justify-content-between p-2">
        <div>
            <h5 class="card-title">{{ $category->name }}</h5>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-link">
                <i class="fa-solid fa-eye"></i>
            </a>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-link">
                <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>
