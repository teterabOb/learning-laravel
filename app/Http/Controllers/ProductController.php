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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if(request()->status == 'available' && request()->stock == 0){
            return redirect()
                    ->back()
                    ->withInput(request()
                    ->all())
                    ->withErrors('If available must have stock');
        }

        //session()->forget('error');
        $product = Product::create(request()->all());
        //session()->flash('success', "The new product with id {$product->id} was created");
        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
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
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()
                ->route('products.index')
                ->withSuccess("The product with id {$product->id} has been deleted");
    }
}
