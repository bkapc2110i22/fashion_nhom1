<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Customer;
use Auth;
use Str;

class HomeController extends Controller
{
    // public function blog_details(){
    //     return view('home.blog-details');
    // }
    public function checkout(){
        return view('home.checkout');
    }
    public function contact(){
        return view('home.contact');
    }
    public function category(Category $cats){
        $products = Product::orderBy('id')->get();
        return view('home.category',compact('cats','products'));
    }
    public function blog(){
        $blog = Blog::orderBy('id')->paginate(3);
        return view('home.blog',compact('blog'));
    }
    public function blog_detail(Blog $blog){
    $previous = Blog::where('id', '<', $blog->id)->max('id');
    $next = Blog::where('id', '>', $blog->id)->min('id');
    return view('home.blog-detail',compact('blog','previous','next'));
    }
    public function index(){
        $products = Product::orderBy('id')->paginate(4);
        $cats = Category::orderBy('id')->get();
        $banner = Banner::orderBy('id')->get();
        // ->limit(1)->get();
        return view('home.index',compact('products','cats','banner'));
    }
    public function main(){
        return view('home.main');
    }
    public function productDetail(Product $product){
        return view('home.product-details',compact('product'));
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
    public function check_login (Request $req)
    {
        $form_data= $req->only('email','password');
        $check = Auth::guard('cus')->attempt($form_data);
        if ($check) {
            return redirect()->route('home.index');
        } 
        return redirect()->back()->with('no','Đăng nhập thất bại, kiểm tra lại tài khoản');
    }
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home.login');
    }
    public function post_register (Request $req)
    {
        $req->validate([
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|alpha_dash|same:password',
        ]);
        $form_data= $req->only('email','password','name','phone','address');
        $form_data['password'] = bcrypt($req->password);
        if(Customer::create($form_data)) {
            return redirect()->route('home.login')->with('yes','Đăng ký thành công, Vui lòng đăng nhập');
        }
        return redirect()->back()->with('no','Đăng ký thất bại, thông tin đã tồn tại hoặc sai định dạng bạn nhập');
    }
}
