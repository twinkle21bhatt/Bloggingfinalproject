@extends('layouts.app')

@section("page_title")
    Login
@endsection

@section("content")
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card login-content shadow-lg border-0">
                <div class="card-body">
                    <div class="text-center">
                        <img class="logo" src="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/account-256.png">
                    </div>
                    <h3 class="text-logo">Sign In</h3>
                    <br>
                    <form class="text-center" method="post" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <input class="form-control border-0" type="email" name="email" placeholder="Type Your Email" required>
                        <br>
                        <input class="form-control border-0" type="password" name="password" placeholder="Type Your Password" required>
                        <br>
                        <button class="btn btn-primary btn-sm border-0" type="submit" name="submit">Sign In</button>
                        <p class="forgot"><a href="">Forgot Password?</a></p>
                    </form>
                </div>
                <div class="auth-footer">
                    <p class="text-center">Not a member? <a href="{{ route('register.view') }}">Create an Account</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection