<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::available('status', 'available')->get();
        return view('welcome')->with([
            'products' => $products,
        ]);
    }

}
