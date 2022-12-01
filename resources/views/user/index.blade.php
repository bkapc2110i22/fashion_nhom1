@extends('layouts.admin')
@section('title','Quản lý danh mục')
@section('main')

<h2>Danh mục</h2>
<form action="{{ route('user.store') }}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label  for="">Họ tên</label>
        <input class="form-control" name="name" placeholder="Input field">
        @error('name') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Email</label>
        <input class="form-control" name="email" placeholder="Input field">
        @error('email') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Input field">
        @error('password') <div>{{$message}}</div> @enderror
    </div>
    <div class="form-group">
        <label  for="">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Input field">
        @error('confirm_password') <div>{{$message}}</div> @enderror
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<hr>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            
            <td>
              

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
{{$users->appends(request()->all())->links()}}
@stop()