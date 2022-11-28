<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $prod = Product::get();
        return view('product.index',compact('prod'));
    }
    public function create(){
        $prod = Product::get();
        return view('product.create');
    }
    public function store(Request $request){
        Product::create($request->all());
        return redirect()->route('product.index');
    }
    public function delete($id){
        Product::where('id',$id)->delete();
        return redirect()->route('product.index');
    }
    public function update($id,Request $request){
        Product::where('id',$id)->update($request->only('name','image','price','sale_price'
        ,'content','status','category_id'));
        return redirect()->route('product.index');
    }
    public function edit($id){
        $prod = Product::find($id);
        return view('product.edit',compact('prod'));
    }

}
