@extends('layouts.master')
@section('main')
        <h2>Chỉnh sửa danh mục: {{$prod->name}}</h2>
    <form action="{{route('product.update',$prod->id)}}" method="POST" role="form">
        @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input class="form-control" name="name" value="{{$prod->name}}">
            <label for="">Dat anh</label>
            <br>
            <img src="{{url('uploads')}}/{{$prod->image}}" width="60">
            <input class="form-control" name="image" type="file" value="{{$prod->image}}">
            <label for="">Gia mac dinh</label>
            <input class="form-control" name="price" placeholder="Ten danh mục" value="{{$prod->price}}">
            <label for="">Giam gia</label>
            <input class="form-control" name="sale_price" placeholder="Ten danh mục" value="{{$prod->sale_price}}">
            <label for="">Noi dung</label>
            <input class="form-control" name="content" placeholder="Ten danh mục" value="{{$prod->content}}">
            <div class="radio">
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Thay doi</button>
    </form>
@stop()