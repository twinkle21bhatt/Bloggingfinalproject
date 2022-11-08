@extends('layouts.dashboard')

@section('page_title')
    Blogs
@endsection


@section('content_title')
    Blogs
@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endsection

@section('content')
    <a href="{{ route('blog.create') }}" class="btn btn-primary mb-4">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>       
        </span>
        Add Blog</a>
    <div class="card shadow-lg border-0 d-block">
        <table id="categories" class="table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($counter = 1)
                @foreach ($blogs as $blog)
                    <tr>
                        <td> {{ $counter }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ strip_tags($blog->content) }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-info me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                    Edit
                                </a>
                                <form action="{{ route('blog.destroy', ['blog' => $blog]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        Delete
                                    </button>
                                </form>
                                <a href="{{route('blog.comments', $blog->id)}}" class="btn btn-warning ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                    View Comments
                                </a>
                            </div>
                        </td>
                    </tr>
                    @php($counter++)
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('custom_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#categories').DataTable();
        } );
    </script>
@endsection
