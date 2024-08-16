<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Product;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        $lots= Lot::with('product')->get();
        return view('lots.index', compact('lots'));
    }

    public function create()
    {
        $products = Product::all();
        return view('lots.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'product_id' => 'required|exists:products,id'
        ]);
        Lot::create($request->all());
        return redirect()->route('lots.index')->with('success', 'New lot created successfully.');
    }

    public function edit(Lot $lot)
    {
        $products = Product::all();
        return view('lots.edit', compact('lot', 'products'));
    }

    public function update(Request $request, Lot $lot)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'product_id' => 'required|exists:products,id'
        ]);
        $lot->update($request->all());
        return redirect()->route('lots.index')->with('success', 'Lot updated successfully.');
    }

    public function destroy(Lot $lot)
    {
        $lot->delete();
        return redirect()->route('lots.index')->with('success', 'Lot deleted successfully.');
    }
}
