@extends('layouts.master')
@section('title','Register')
@section('main')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="" method="POST" role="form">
                    <legend>Login</legend>
                    @csrf
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="" name="email" placeholder="Email">
                        @error('email') <div>{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" id="" name="phone" placeholder="phone number">
                        @error('phone') <div>{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Your name">
                        @error('name') <div>{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" name="address" placeholder="Place">
                        @error('address') <div>{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="" name="password" placeholder="Password">
                        @error('password') <div>{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="" name="confirm_password" placeholder="Confirm Password">
                        @error('confirm_password') <div>{{$message}}</div> @enderror
                    </div>
                    <p>Already have an account? <a href="{{route('home.login')}}">Sign Here!</a></p>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<br>
@stop