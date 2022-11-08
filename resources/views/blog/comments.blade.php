@extends('layouts.dashboard')

@section('page_title')
    Comments
@endsection


@section('content_title')
    Comments
@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>

@endsection

@section('content')
    <div class="card shadow-lg border-0 d-block">
        <table id="categories" class="table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Comment</th>
                    <th>Blog Title</th>
                    <th>Commented by</th>
                    <th>Commented At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($counter = 1)
                @foreach ($comments as $comment)
                    <tr>
                        <td> {{ $counter }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->blog->title }}</td>
                        <td>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('comment.delete', $comment->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        Delete
                                    </button>
                                </form>
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
