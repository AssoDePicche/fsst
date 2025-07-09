<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user()->categories()->count() === 0) {
            return view('categories.index');
        }

        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'min_quantity' => 'required|integer|min:0',
        ]);

        $resultSet = Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'min_quantity' => $validated['min_quantity'],
        ]);

        return redirect()->route('products.index')->with('success', 'Novo produto adicionado');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $categories = Category::where('user_id', Auth::user()->id);

        $product = Product::findOrFail($id);

        return view('products.edit', compact('categories', 'product'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'min_quantity' => 'required|integer|min:0',
        ]);

        $resultSet = Product::findOrFail($id);

        $resultSet->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'min_quantity' => $validated['min_quantity'],
        ]);

        return redirect()->route('products.index')->with('success', 'Alterações realizadas');
    }

    public function destroy(string $id)
    {
        $resultSet = Product::findOrFail($id);

        $resultSet->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído');
    }
}
