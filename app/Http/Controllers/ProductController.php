<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Pest\Support\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name','like','%'.$request->search.'%');
        }

        if ($request->sort == 'name') {
            $query->orderBy('name');
        }

        if ($request->sort == 'price') {
            $query->orderBy('price');
        }

        $products = $query->paginate(5)->withQueryString();

        return view('products.index', compact('products'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);
       
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
