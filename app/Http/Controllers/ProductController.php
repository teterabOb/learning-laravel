<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /*
        Since I wrote this construct
        All the functions here are protected by the middleware
        In case the user wants to acces to this functions
        Must be logged into the system
    */
    public function __construct()
    {
        $this->middleware('auth');
        /*
            In this case ONLY the function index written bellow is being protected
                $this->middleware('auth')->only('index');
            In this other case all the functions are being protected excepting 
            index and create as we can se both being part of the array
                $this->middleware('auth')->except(['index', 'create']);

        */
    }

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
