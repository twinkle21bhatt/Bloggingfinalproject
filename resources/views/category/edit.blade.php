@extends('layouts.dashboard')

@section('page_title')
    Edit Blog Category
@endsection


@section('content_title')
    Edit Category: {{$category->category}}
@endsection

@section('content')
    <a href="{{ route('categories') }}" class="btn btn-primary mb-4">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
        </span>
        All Categories </a>
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
            <form action="{{route('category.update',['category' => $category->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input type="text" id="category" name="category" value="{{$category->category}}" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
