<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Sale;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0.01',
    ]);

    $product = new Product([
        'name' => $request->input('name'),
        'quantity' => $request->input('quantity'),
        'price' => $request->input('price'),
    ]);

    $product->save();

    return redirect()->route('products.show', ['product' => $product->id])
        ->with('success', 'Product added successfully');
}

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    public function show($id)
{
    $product = Product::findOrFail($id);

    return view('products.show', ['product' => $product]);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0.01',
        ]);

        $product = Product::findOrFail($id);
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function dashboard()
    {
        $today = now()->format('Y-m-d');
        $yesterday = now()->subDay()->format('Y-m-d');
        $thisMonth = now()->startOfMonth()->format('Y-m-d');
        $lastMonth = now()->subMonth()->startOfMonth()->format('Y-m-d');

        $salesFigures = [
            'today' => Sale::whereDate('created_at', $today)->sum('amount'),
            'yesterday' => Sale::whereDate('created_at', $yesterday)->sum('amount'),
            'this_month' => Sale::whereDate('created_at', '>=', $thisMonth)->sum('amount'),
            'last_month' => Sale::whereDate('created_at', '>=', $lastMonth)->whereDate('created_at', '<', $thisMonth)->sum('amount'),
        ];

        return view('dashboard')->with('salesFigures', $salesFigures);
    }

    public function transactions()
    {
        $transactions = Product::latest()->get();
        return view('transactions')->with('transactions', $transactions);
    }
}
