<?php

namespace App\View\Components;

use Closure;

use App\Models\Product;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public function __construct(public Product $product)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
