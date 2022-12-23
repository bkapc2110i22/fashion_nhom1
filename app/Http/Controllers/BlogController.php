<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
      $blog = Blog::get();
      return view('blog.index',compact('blog'));
    }
    public function create()
    {
       return view('blog.create');
    }
    public function store(Request $req)
    {
        // $req->validate([
        //     'name' => 'required|min:3',
        //     'desc' => 'required|min:3',
        //     'content' => 'required|min:10',
        //     'image' => 'required|mimes:jpg,jpeg,png,gif',
        // ]);
        $form_data = $req->only('name','desc','content','image');
        $file_name = $req->upload->getClientOriginalName();
        $req->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name;
        Blog::create($form_data);
        return redirect()->route('blog.index')->with('yes','Thêm mới thành công...');;
    }
    public function edit (Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }
    public function update(Blog $blog, Request $req)
    {
        // $req->validate([
        //     'name' => 'required|min:3',
        //     'desc' => 'required|min:3',
        //     'content' => 'required|min:10',
        //     'image' => 'required|mimes:jpg,jpeg,png,gif',
        // ]);

        $form_data = $req->only('name','desc','content'
        ,'status','image');
        if ($req->has('upload')) {
            $file_name = $req->upload->getClientOriginalName();
            $req->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }
        
        $blog->update($form_data);
        return redirect()->route('blog.index')->with('yes','Cập nhật thành côngc...');;
    }
    public function destroy (Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('yes','Xoá thành công');
    }
    public function trashed()
    {
       $blog = Blog::onlyTrashed()->get();
       return view('blog.trashed', compact('blog'));
    }

    public function restore($id)
    {
        try {
            $blog_restore = Blog::withTrashed()->find($id);
            $blog_restore->restore();
            return redirect()->route('blog.index')->with('yes','Khôi phục thành công...');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Không thể khôi phục...');
        }

    }
    public function forceDelete($id)
    {
        try {
            $blog_delete = Blog::withTrashed()->find($id);
            $blog_delete->forceDelete();
            return redirect()->back()->with('yes','Xoá thành công...');
        } catch (\Throwable $th) {
            // return redirect()->back()->with('no','Không thành công...');
        }
    }
}