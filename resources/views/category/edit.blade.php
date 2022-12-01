@extends('layouts.admin')
@section('title','Chỉnh sửa danh mục')
@section('main')
<h2>Danh mục</h2>


<form action="{{ route('category.update', $category->id) }}" method="POST"  role="form">
    @csrf @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group">
        <label class="sr-only" for="">Tên danh mục</label>
        <input class="form-control" name="name" value="{{$category->name}}">
        @error('name') <div>{{$message}}</div> @enderror
    </div>

    <div class="form-group">
        <label class="sr-only" for="">Trạng thái danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked':''}} >
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{$category->status == 0 ? 'checked':''}}>
                Ẩn
            </label>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()