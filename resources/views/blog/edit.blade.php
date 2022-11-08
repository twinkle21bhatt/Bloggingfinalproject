@extends('layouts.dashboard')

@section('page_title')
    Edit Blog
@endsection


@section('content_title')
    Edit Blog : {{$blog->title}}
@endsection

@section('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <a href="{{ route('blog.index') }}" class="btn btn-primary mb-4">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H6M12 5l-7 7 7 7"/></svg>
        </span>
        All Blogs </a>
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
            <form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{$blog->title}}">
                </div>
                <div class="form-group">
                    <label for=''>Category</label>
                    <select class="form-select" aria-label="Category" name="category_id">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" @if($cat->id == $blog->category_id) selected @endif>{{ $cat->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea id="summernote" name="content">{{$blog->content}}</textarea>
                </div>
                
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400
            });
        });
    </script>
@endsection
