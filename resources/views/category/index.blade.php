@extends('layouts.admin')
@section('title','Quản lý danh mục')
@section('main')

<h2>Danh mục (Kid, Men, Accessories,Cosmetic,Women)</h2>
<form action="{{ route('category.store') }}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label class="sr-only" for="">Tên danh mục</label>
        <input class="form-control" name="name" placeholder="Input field">
        @error('name') <div>{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <label class="sr-only" for="">Trạng thái danh mục</label>

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
</form>
<hr>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Total Product</th>
            <th>Input button</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{ucfirst($cat->name)}}</td>
            <td>{{$cat->status == 0 ? 'Ẩn' : 'Hiển thị'}}</td>
            <td>{{$cat->products->count()}}</td>
            <td>
                @if($cat->products->count() < 1)
                <form action="{{route('category.destroy', $cat->id)}}" method="POST">
                    @csrf @method("DELETE")
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('bạn có muốn xóa không?')">Xóa</button>
                    <a class="btn btn-sm btn-success" href="{{route('category.edit', $cat->id)}}">Sửa</a>
                </form>
                @else
                <p>Quantity product is more than one or more</p>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
{{$cats->appends(request()->all())->links()}}
@stop()