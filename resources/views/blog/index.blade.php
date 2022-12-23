@extends('layouts.admin')
@section('title','Blog')
@section('main')
<h2>Blog</h2>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Content</th>
            <th>Input button</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blog as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->desc}}</td>
            <td>{{$b->content}}</td>
            <td>
                <form action="{{route('blog.destroy', $b->id)}}" method="POST">
                    @csrf @method("DELETE")
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('bạn có muốn xóa không?')">Xóa</button>
                    <a class="btn btn-sm btn-success" href="{{route('blog.edit', $b->id)}}">Sửa</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
@stop()