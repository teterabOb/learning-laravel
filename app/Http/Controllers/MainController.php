<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //return view('index');
        //$name = config('app.undefined', 'welcome');
        //dd($name);
        //return view($name);
        return view('welcome');
    }
}
