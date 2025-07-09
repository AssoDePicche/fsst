<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::user()->products()->count() == 0) {
            return view('products.index');
        }

        return view('transactions.index');
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($validated['type'] === 'exit' && $product->quantity - $validated['quantity'] < $product->min_quantity) {
            return back()->withErrors([
                'quantity' => 'Não é possível realizar uma transação abaixo do nível mínimo de estoque',
            ]);
        }

        $resultSet = Transaction::create([
            'product_id' => $validated['product_id'],
            'type' => $validated['type'],
            'quantity' => $validated['quantity'],
            'price' => $validated['quantity'] * $product->price,
            'notes' => $validated['notes'],
        ]);

        $product->quantity += ($validated['type'] === 'entry') ? $validated['quantity'] : -$validated['quantity'];

        $product->save();

        return view('transactions.index');
    }

    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transactions.show', compact($transaction));
    }

    public function destroy(string $id)
    {
        $resultSet = Transaction::findOrFail($id);

        $resultSet->delete();

        return redirect()->route('transactions.index')->with('success', 'Transação excluída');
    }
}
