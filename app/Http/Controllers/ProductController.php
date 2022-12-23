<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        $product = Product::search()->paginate(3); 
        return view('product.index', compact('product'));
    }

    public function create()
    {
        $cats = Category::orderBy('name','ASC')->get();
        return view('product.create', compact('cats'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price|nullable',
            'upload' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $form_data = $req->only('name','price','sale_price','status','content','category_id');
        $file_name = $req->upload->getClientOriginalName();
        $req->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name;
        product::create($form_data);
        return redirect()->route('product.index')->with('yes','Thêm mới thành công...');;
    }

    public function edit (Product $product)
    {
        $cats = Category::orderBy('name','ASC')->get();
        return view('product.edit', compact('cats','product'));
    }
    public function update(Product $product, Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|lte:price|nullable',
            'upload' => 'mimes:jpg,jpeg,png,gif',
        ]);

        $form_data = $req->only('name','image','price',
        'sale_price','content','created_at','updated_at'
        ,'status','category_id');
        if ($req->has('upload')) {
            $file_name = $req->upload->getClientOriginalName();
            $req->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }
        
        $product->update($form_data);
        return redirect()->route('product.index')->with('yes','Cập nhật thành côngc...');;
    }
    public function forceDelete($id)
    {
        try {
            // truy vấn lấy ra sản phẩm đã xóa theo id
            $product_delete = Product::find($id);

            //  xóa khỏi database 
            $product_delete->forceDelete();
            return redirect()->back()->with('yes','Xoá thành công...');
        } catch (\Throwable $th) {
            // return redirect()->back()->with('no','Không thành công...');
        }
    }
}
