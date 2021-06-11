@extends('layouts.auth')            
@section('content')
    <div>
        <h1 class="logo-name">
            <a href="{{route('landing')}}">
                <img src="{{asset('img/landing/logo.png')}}" alt="logo" width="300px"/>
            </a>
        </h1>
    </div>
    <h3>Welcome to Tuwa Kawa Cafe</h3>
    <p>Login, and see what happen.</p>
    @if($errors->any())
        <div class="alert alert-danger">
        {{$errors->first()}}
        </div>
    @endif
    <form class="m-t" role="form" action="" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

        <a href="{{route('forgot-password')}}"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">Create an account</a>
    </form>
    <p class="m-t"> <small>Laravel POS &copy; DXH30 2020</small> </p>
@endsection
