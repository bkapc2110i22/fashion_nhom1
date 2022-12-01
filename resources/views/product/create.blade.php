@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('main')
<h2>Sản phẩm</h2>


<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="sr-only" for="">Danh mục</label>
       
       <select name="category_id" id="input" class="form-control" >
           <option value="">Chọn danh mục</option>
           @foreach($cats as $cat)
           <option value="{{$cat->id}}">{{$cat->name}}</option>
           @endforeach
       </select>
       
        @error('category_id') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Tên sản phẩm</label>
        <input class="form-control" name="name" placeholder="...">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Giá sản phẩm</label>
        <input class="form-control" name="price" placeholder="...">
        @error('price') <div>{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <label  for="">Giá KM</label>
        <input class="form-control" name="sale_price" placeholder="...">
        @error('sale_price') <div>{{$message}}</div> @enderror
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
