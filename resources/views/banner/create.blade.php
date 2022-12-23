@extends('layouts.admin')
@section('title','Tạo Banner')
@section('main')
<h2>Banner</h2>

<form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label  for="">Tiêu đề Banner</label>
        <input class="form-control" name="title" placeholder="...">
        @error('title') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Tên Banner</label>
        <input class="form-control" name="name" placeholder="...">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br>
@stop()