<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {    
        $product = Product::create($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }
    public function show(Product $product)
    {
        return view('products.show')->with([
            'product' => $product,
            
        ]);

    }
    public function edit(Product $product)
    {
        return view('products.edit')->with([
            'product' => $product,
            //'product' => Product::findOrFail($product),
        ]);
        //return "Showing the form to edit the product with id {$product}";
    }
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }
    public function destroy(Product $product)
    {
        //$product = Product::findOrFail($product);
        $product->delete();
        return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} has been deleted");
    }
}
