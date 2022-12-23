@extends('layouts.admin')
@section('title','Thùng rác Blog')
@section('main')
<h2>Banner</h2>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tieu de</th>
            <th>Tên</th>
            <th>Input button</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blog as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->content}}</td>
            <td>
               <a href="{{route('blog.restore',$b->id)}}" class="btn btn-success">Khôi phục</a>
               <a href="{{route('blog.forceDelete',$b->id)}}" class="btn btn-danger" onclick="return confirm('Ban muon xoa ko')">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<br>
@stop()