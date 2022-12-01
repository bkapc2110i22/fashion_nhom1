@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('main')
<h2>Sản phẩm</h2>


<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
        <label class="sr-only" for="">Danh mục</label>
       
       <select name="category_id" id="input" class="form-control" >
           <option value="">Chọn danh mục</option>
           @foreach($cats as $cat)
           <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
           @endforeach
       </select>
       
        @error('category_id') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Tên sản phẩm</label>
        <input class="form-control" name="name" placeholder="..." value="{{$product->name}}">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Giá sản phẩm</label>
        <input class="form-control" name="price" placeholder="..." value="{{$product->price}}">
        @error('price') <div>{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <label  for="">Giá KM</label>
        <input class="form-control" name="sale_price" placeholder="..." value="{{$product->sale_price}}">
        @error('sale_price') <div>{{$message}}</div> @enderror
    </div>
    
    <div class="form-group">
        <label  for="">Nội dung</label>
        
        <textarea name="content" class="form-control" >{{$product->name}}</textarea>
        
        @error('content') <div>{{$message}}</div> @enderror
    </div>
 
    <div class="form-group">
        <label  for="">Ảnh</label>
        <input type="file" class="form-control" name="upload" placeholder="...">
        @error('upload') <div>{{$message}}</div> @enderror
        <hr>
        <img src="{{url('uploads')}}/{{$product->image}}" alt="" width="250">
    </div>
    
    <div class="form-group">
        <label  for="">Trạng thái danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="1"  {{$product->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}>
                Ẩn
            </label>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()
