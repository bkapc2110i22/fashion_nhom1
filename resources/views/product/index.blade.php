@extends('layouts.master')
@section('main')
<h2>Danh sách danh mục</h2>
        <!-- @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
        </div>
        @endif -->
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>IMAGE</th>
                <th>price</th>
                <th>sale_price</th>
                <th>content</th>
                <th>xoa sua etc</th>
                </tr>
            </thead>
            <tbody>
        @foreach($prod as $p)
                <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td><img src="{{url('uploads')}}/{{$p->image}}"width="100" style="border-radius:75%"></td>
                <td>{{$p->price}}</td>
                <td>{{$p->sale_price}}</td>
                <td>{{$p->content}}</td>
                <td>
                <form action="{{route('product.delete',$p->id)}}" method="POST">
                    @method('DELETE') @csrf
                    <button class="btn btn-xs btn-danger">Xóa</button>
                    <a href="{{route('product.edit',$p->id)}}" class="btn btn-xs btn-primary">Sửa</a>
                </form>
        </td>
        @endforeach
    </tr>
            </tbody>
        </table>
@stop