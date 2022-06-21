<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::get();
        $categories = Category::get();

        return view('site.index',compact('products','categories'));
    }
}
