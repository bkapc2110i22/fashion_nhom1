@extends('layouts.master')
@section('main')
<h2>Thêm mới danh mục danh mục</h2>
    <form action="{{route('product.store')}}" method="POST" role="form">
    @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input class="form-control" name="name" placeholder="Ten danh mục">
            <label for="">Dat anh</label>
            <input class="form-control" name="image" type="file">
            <label for="">Gia mac dinh</label>
            <input class="form-control" name="price" placeholder="Ten danh mục">
            <label for="">Giam gia</label>
            <input class="form-control" name="sale_price" placeholder="Ten danh mục">
            <label for="">Noi dung</label>
            <input class="form-control" name="content" placeholder="Ten danh mục">
        </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@stop()