<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
      $banner = Banner::get();
       return view('banner.index',compact('banner'));
    }
    public function create()
    {
       return view('banner.create');
    }
    public function store(Request $req){
      $req->validate([
         'title' => 'required|max:20',
         'name' => 'required|max:20',
     ]);
      $form_data = $req->all('title','name');
      Banner::create($form_data);
      return redirect()->route('banner.index')->with('yes','Thêm mới thành công...');
    }
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }
    public function update(Banner $banner,Request $req)
    {
      $req->validate([
         'title' => 'required|max:20',
         'name' => 'required|max:20',
     ]);
        $form_data = $req->all('title','name');
        $banner->update($form_data);
       return redirect()->route('banner.index')->with('yes','Cập nhật thành công...');;
    }
    public function destroy (Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')->with('yes','Xoá thành công');
    }
    public function trashed()
    {
       $banner = Banner::onlyTrashed()->get();
       return view('banner.trashed', compact('banner'));
    }

    public function restore($id)
    {
        try {
            $banner_restore = Banner::withTrashed()->find($id);
            $banner_restore->restore();
            return redirect()->route('banner.index')->with('yes','Khôi phục thành công...');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Không thể khôi phục...');
        }

    }
    public function forceDelete($id)
    {
        try {
            $banner_restore = Banner::withTrashed()->find($id);
            $banner_restore->forceDelete();
            return redirect()->back()->with('yes','Xoá thành công...');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no','Không thành công');
        }
    }
}
