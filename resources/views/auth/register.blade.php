@extends('layouts.auth')
@section('content')
    <div>
        <div>
            <h1 class="logo-name">
                <a href="{{route('landing')}}">
                    TK
                </a>
            </h1>
        </div>
        <h3>Register to Tuwa Kawa</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="POST" action="">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Password Confirm" required="">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label> <input type="checkbox" required><i></i> Agree the terms and policy </label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Login</a>
        </form>
        <p class="m-t"> <small>Laravel POS &copy; DXH30 2020</small> </p>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/pages/password_confirm.js')}}"></script>
@endsection
