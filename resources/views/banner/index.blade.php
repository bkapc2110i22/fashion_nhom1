@extends('layouts.admin')
@section('title','Banner')
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
                <form action="{{route('banner.destroy', $b->id)}}" method="POST">
                    @csrf @method("DELETE")
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('bạn có muốn xóa không?')">Xóa</button>
                    <a class="btn btn-sm btn-success" href="{{route('banner.edit', $b->id)}}">Sửa</a>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<br>
@stop()