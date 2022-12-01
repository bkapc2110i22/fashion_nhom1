@extends('layouts.admin')
@section('title','Quản lý sản phẩm')
@section('main')
<h2>Sản phẩm</h2>
<hr>


<!-- FORM TÌM KIẾM  -->
<form action="" method="get" class="form-inline">

    <div class="form-group">
        <input class="form-control" name="keyword" placeholder="Input keyword">
    </div>

    <div class="form-group">
        <select name="orderByName" class="form-control">
            <option value="">Mắc định theo tên</option>
            <option value="ASC">Tăng dần theo tên</option>
            <option value="DESC">Giảm dần theo tên</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('product.create') }}" class="btn btn-success">Thêm mới</a>
</form>
<hr>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Nút bấm</th>
        </tr>
    </thead>
    <tbody>

        @foreach($product as $products)
        <tr>
            <td>{{$products->id}}</td>
            <td>{{$products->name}}</td>
            <td>{{$products->cat->name ?? 'Ẩn'}}</td>
            <!-- <td>{{$products->cat?->name}}</td> -->
            <td>{{$products->status == 0 ? 'Ẩn' : 'Hiển thị'}}</td>
            <td>
                <img src="{{url('uploads')}}/{{$products->image}}" alt="" width="60">
            </td>
            <td>
                <a href="{{ route('product.edit', $products->id) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i> Sửa</a>
                <a href="{{ route('product.destroy', $products->id) }}" class="btn btn-sm btn-primary">X</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
{{$product->appends(request()->all())->links()}}
@stop()