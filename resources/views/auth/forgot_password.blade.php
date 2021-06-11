@extends('layouts.auth')
@section('content')
    <h2 class="font-bold">Forgot password</h2>

    <p>
    Enter your email address and your password will be reset and emailed to you.
    </p>

    <div class="row">

        <div class="col-lg-12">
            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email address" required="">
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

            </form>
        </div>
    </div>
@endsection
