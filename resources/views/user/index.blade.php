@extends('layouts.dashboard')

@section('page_title')
    Users
@endsection


@section('content_title')
    Users
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($counter = 1)
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $counter }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_no }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
