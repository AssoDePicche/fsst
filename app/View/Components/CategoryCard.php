<?php

namespace App\View\Components;

use Closure;

use App\Models\Category;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    public function __construct(public Category $category)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.category-card');
    }
}
