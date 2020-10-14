<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\PanelProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scopes\AvailableScope;

class ProductController extends Controller
{
    public function index()
    {
        //$products = Product::all();
        return view('products.index')->with([
            'products' => PanelProduct::without('images')->get(),
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {    
        $product = PanelProduct::create($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }
    public function show(PanelProduct $product)
    {
        return view('products.show')->with([
            'product' => $product,
            
        ]);

    }
    public function edit(PanelProduct $product)
    {
        return view('products.edit')->with([
            'product' => $product,
            //'product' => Product::findOrFail($product),
        ]);
        //return "Showing the form to edit the product with id {$product}";
    }
    public function update(ProductRequest $request, PanelProduct $product)
    {
        $product->update($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }
    public function destroy(PanelProduct $product)
    {
        //$product = Product::findOrFail($product);
        $product->delete();
        return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} has been deleted");
    }
}
