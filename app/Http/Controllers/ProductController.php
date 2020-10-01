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
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('products.create');
        //return 'This is the form to create a product from CONTROLLER';
    }
    public function store()
    {
        if(request()->status == 'available' && request()->stock == 0){
            //session()->put('error', 'If available must have stock');
            session()->flash('error', 'If available must have stock');
            return redirect()->back();
        }

        session()->forget('error');
        $product = Product::create(request()->all());
        //return $product;
        //return redirect()->back();
        //return redirect()->action('MainController@index');
        return redirect()->route('products.index');
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
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
        //return "Showing the form to edit the product with id {$product}";
    }
    public function update($product)
    {
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
        //return $product;
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
        //return $product;
    }
}
