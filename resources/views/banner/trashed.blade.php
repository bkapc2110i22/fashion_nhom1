@extends('layouts.admin')
@section('title','Thùng rác Banner')
@section('main')
<h2>Banner</h2>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tieu de</th>
            <th>Name</th>
            <th>Input button</th>
        </tr>
    </thead>
    <tbody>
    @foreach($banner as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->title}}</td>
            <td>{{$b->name}}</td>
            <td>
               <a href="{{route('banner.restore',$b->id)}}" class="btn btn-success">Khôi phục</a>
               <a href="{{route('banner.forceDelete',$b->id)}}" class="btn btn-danger" onclick="return confirm('Ban muon xoa ko')">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<br>
@stop()