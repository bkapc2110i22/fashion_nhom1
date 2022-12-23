@extends('layouts.admin')
@section('title','Sửa Blog')
@section('main')
<h2>Blog</h2>
<form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
        <label  for="">Tên blog</label>
        <input class="form-control" name="name" placeholder="..." value="{{$blog->name}}">
        @error('title') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Mô tả</label>
        <input class="form-control" name="desc" placeholder="..." value="{{$blog->desc}}">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Nội dung</label>
        <textarea name="content" class="form-control" >{{$blog->content}}</textarea>
        @error('content') <div>{{$message}}</div> @enderror
    </div>
 
    <div class="form-group">
        <label  for="">Ảnh</label>
        <input type="file" class="form-control" name="upload" placeholder="...">
        @error('upload') <div>{{$message}}</div> @enderror
        <hr>
        <img src="{{url('uploads')}}/{{$blog->image}}" alt="" width="250">
    </div>
    
    <div class="form-group">
        <label  for="">Trạng thái danh mục</label>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1"  {{$blog->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{$blog->status == 0 ? 'checked' : ''}}>
                Ẩn
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()