@extends('layouts.admin')
@section('title','Tạo Blog')
@section('main')
<h2>Blog</h2>
<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label  for="">Tên blog</label>
        <input class="form-control" name="name" placeholder="...">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Mô tả</label>
        <input class="form-control" name="desc" placeholder="...">
        @error('desc') <div>{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <label  for="">Nội dung</label>
        <textarea name="content" class="form-control" ></textarea>
        @error('content') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Ảnh</label>
        <input type="file" class="form-control" name="upload" placeholder="...">
        @error('upload') <div>{{$message}}</div> @enderror
    </div>
    
    <div class="form-group">
        <label  for="">Trạng thái danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" id="inputstatus" value="1" checked="checked">
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0">
                Ẩn
            </label>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop()