<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome')->with([
            'products' => Product::all(),
        ]);
    }
}
