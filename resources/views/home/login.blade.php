@extends('layouts.master')
@section('title','Login')
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
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    @error('email') <div>{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password') <div>{{$message}}</div> @enderror
                </div>
                <p>No account? <a href="{{route('home.register')}}">Register Here!</a></p>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<br>
@stop