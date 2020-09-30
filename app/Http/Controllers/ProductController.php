<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('Products')->get();
        dd($products);
        return view('products.index');
        //return 'This is the list of products from CONTROLLER';
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
        //using first we'll get the information of the first row and not the collection
        //$product = DB::table('Products')->where('id', $product)->first();
        //other way to get the same result by the parameter $product
        $product = DB::table('products')->find($product);
        dd($product);
        return view('products.show');
        //return "Showing products with id {$product}";
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
