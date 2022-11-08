@extends('layouts.dashboard')

@section('page_title')
    Create Role
@endsection


@section('content_title')
    Create Role
@endsection

@section('content')
    <a href="{{ route('role.index') }}" class="btn btn-primary mb-4">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
        </span>
        All Roles </a>
    <div class="card shadow-lg border-0 d-block">
        <div class="card-body d-block">
            @if (count($errors) > 0)
                <ul class="list-group my-3 mx-2">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" id="role" name="role" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
