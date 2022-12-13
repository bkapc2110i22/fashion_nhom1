<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\home;

class HomeController extends Controller
{
    public function blog_details(){
        return view('home.blog-details');
    }
    public function blog(){
        return view('home.blog');
    }
    public function checkout(){
        return view('home.checkout');
    }
    public function contact(){
        return view('home.contact');
    }
    public function index(){
        return view('home.index');
    }
    public function main(){
        return view('home.main');
    }
    public function product_details(){
        return view('home.product-details');
    }
    public function shop_cart(){
        return view('home.shop-cart');
    }
    public function shop(){
        return view('home.shop');
    }
    public function login(){
        return view('home.login');
    }
    public function register(){
        return view('home.register');
    }
}
