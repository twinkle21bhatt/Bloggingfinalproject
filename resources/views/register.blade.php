@extends('layouts.app')

@section('page_title')
    Create an account
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card login-content shadow-lg border-0">
                <div class="card-body">
                    <div class="text-center">
                        <img class="logo" src="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/account-256.png">
                    </div>
                    <h3 class="text-logo">Create an Account!</h3>
                    <br>
                    @if (count($errors) > 0)
                        <ul class="list-group my-3 mx-2">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form class="text-center" method="post" action="{{ route('register') }}">
                        {{csrf_field()}}
                        <input class="form-control border-0" type="text" name="first_name" placeholder="Type Your First Name" required>
                        <br>
                        <input class="form-control border-0" type="text" name="last_name" placeholder="Type Your Last Name" required>
                        <br>
                        <input class="form-control border-0" type="email" name="email" placeholder="Type Your Email" required>
                        <br>
                        <input class="form-control border-0" type="password" name="password" placeholder="Type Your Password" required>
                        <br>
                        <input class="form-control border-0" type="password" name="confirm_password" placeholder="Re-Type Your Password" required>
                        <br>
                        <button class="btn btn-primary btn-sm border-0" type="submit" name="submit">Sign In</button>
                    </form>
                </div>
                <div class="auth-footer">
                    <p class="text-center">Already have an account? <a href="{{ route('login.view') }}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
