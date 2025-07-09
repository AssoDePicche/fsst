<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $resultSet = Category::create([
            'parent_id' => $validated['parent_id'],
            'user_id' => Auth::user()->id,
            'name' => $validated['name'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Nova categoria adicionada');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $categories = Category::getExcludingParentAndChildren($id);

        $category = Category::findOrFail($id);

        return view('categories.edit', compact('categories', 'category'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'parent_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
        ]);

        $resultSet = Category::findOrFail($id);

        $resultSet->update([
            'parent_id' => $validated['parent_id'],
            'user_id' => Auth::user()->id,
            'name' => $validated['name'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Alterações realizadas');
    }

    public function destroy(string $id)
    {
        $resultSet = Category::findOrFail($id);

        $resultSet->delete();

        return redirect()->route('dashboard')->with('success', 'Categoria excluída');
    }
}
