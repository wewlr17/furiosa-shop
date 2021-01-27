<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Sliders;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->user = User::where('name', 'like', 'admin')->first();
    }


    public function index() {
        //$user = DB::table('users')->where('name', 'like', 'admin')->first();
        $slider1 = Sliders::where('name', 'slider1')->get();
        $categories = Category::all();
        $products = Product::all();

        // var_dump($slider1);

        return view('welcome', [
            'user' => $this->user,
            'slider1' => $slider1,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function shop()
    {
        return view ('shop.index', [

        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view ('shop.show', [
            'product' => $product,
        ]);
    }

    public function contact()
    {
        return view ('pages.contact', [
            'user' => $this->user,

        ]);
    }

    public function about()
    {
        return view ('pages.about', [

        ]);
    }


}
