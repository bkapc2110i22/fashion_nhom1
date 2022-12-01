<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
       
        $cats =  Category::search()->paginate();

       return view('category.index', compact('cats'));
    }
    public function trashed()
    {
       
        $cats =  Category::search()->onlyTrashed()->paginate();

       return view('category.trashed', compact('cats'));
    }

    public function restore($id)
    {

        try {
            // truy vấn lấy ra sản phẩm đã xóa theo id
            $category_restore = Category::withTrashed()->find($id);

            // khôi phục sản phẩm đã xóa theo id 
            $category_restore->restore();
            return redirect()->route('category.index')->with('yes','Khôi phục thành công...');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Không thể khôi phục...');
        }

    }
    public function forceDelete($id)
    {
        try {
            // truy vấn lấy ra sản phẩm đã xóa theo id
            $category_restore = Category::withTrashed()->find($id);

            //  xóa khỏi database 
            $category_restore->forceDelete();
            return redirect()->back()->with('yes','Xoá thành công...');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Không thành công do số lượng SP lớn hơn 1, vui lòng nhấn khôi phục để xoá sản phẩm...');
        }
    }
    public function store(Request $req)
    {
        $form_data = $req->all('name','status');
        Category::create($form_data);
        return redirect()->route('category.index')->with('yes','Thêm mới thành công...');;
    }

    public function destroy (Category $category)
    {
        // Category::find(1)->delete();
        // Category::where('status', 0)->delete();
        $category->delete();
        
        $products = Product::where('category_id', $category->id)->get();
        if ($products->count() == 0) {
            $category->delete();
            return redirect()->route('category.index')->with('yes','Xóa thành công...');
        }

        return redirect()->route('category.index')->with('no','Xoá thành công nhưng được chứa vào thùng rác do SP đã được liên kết trước đó...');

    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $req, Category $cat)
    {
        $form_data = $req->all('name','status');
        $cat->update($form_data);
       return redirect()->route('category.index')->with('yes','Cập nhật thành côngc...');;
    }
}
