<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        dd($products);
        return view('products.index');
    }

    public function create()
    {
        return 'This is the form to create a product from CONTROLLER';
    }
    public function store()
    {
        //
    }
    public function show($product)
    {
        $product = Product::findOrFail($product);
        //dd($product);
        return view('products.show')->with([
            'product' => $product,
            
        ]);

    }
    public function edit($product)
    {
        return "Showing the form to edit the product with id {$product}";
    }
    public function update($product)
    {
        //
    }
    public function destroy($product)
    {
        //
    }
}
