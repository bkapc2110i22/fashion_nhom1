@extends('layouts.master')
@section('title','About Page')
@section('main')

<div class="container">
    @if ($cart->totalQuantity > 0)
    <div class="row">
        <div class="col-md-4">

            <form action="" method="POST" role="form">
                @csrf
                <legend>Form register</legend>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{$auth->name}}" name="name"
                        placeholder="Input name">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="{{$auth->email}}" name="email"
                        placeholder="Input Email">
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" value="{{$auth->phone}}" name="phone"
                        placeholder="Input phone">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" value="{{$auth->address}}" name="address"
                        placeholder="Input address">
                </div>

                <p>
                    Nếu bạn chưa có tài khoản, <a href="{{ route('home.register') }}">Click vào đấy để </a> đăng ký
                </p>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h2>Giỏ hàng của bạn</h2>
                </div>
                <div class="col-md-6">
                    <h2>Tổng tiền: {{ $cart->totalAmount}}</h2>
                </div>
            </div>
            <hr>


            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>
                            <img class="card-img-top" src="{{url('uploads')}}/{{$item->image}}" style="width: 60px">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->quantity * $item->price}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else 

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Giỏi hàng rỗng, vui lòng!</strong> <a href="{{ route('home.index') }}" >Tiếp tục mua hàng</a>
</div>

@endif
</div>

@stop()