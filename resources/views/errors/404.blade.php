@extends('layouts.app')

@section("page_title")
    Page Not Found
@endsection

@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Montserrat:700");
        .not-found {
            height: 100vh;
            font-family: "Montserrat", "sans-serif";
            font-weight: bolder;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .not-found a {
            color: black;
        }
    </style>
    <div class="not-found">
        <h1>Page Not Found!!</h1>
        <h1> <span class="ascii">(╯°□°）╯︵ ┻━┻</span></h1>
        <a href="{{route('homepage')}}">Go back</a>
    </div>
@endsection