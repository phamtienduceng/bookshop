@extends('admin.layout.layout')
@section('contents')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Users Management</h1>
        <div class="card shadow mb-4">
            <div class="card-body">          
                <div class="table-responsive" >
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('users.show', $user->id) }}">Show</a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
