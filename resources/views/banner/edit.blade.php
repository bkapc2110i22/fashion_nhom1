@extends('layouts.admin')
@section('title','Sửa banner')
@section('main')
<h2>Banner</h2>
<form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
        <label  for="">Tiêu đề Banner</label>
        <input class="form-control" name="title" placeholder="..." value="{{$banner->title}}">
        @error('title') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Tên Banner</label>
        <input class="form-control" name="name" placeholder="..." value="{{$banner->name}}">
        @error('name') <div>{{$message}}</div> @enderror
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()
