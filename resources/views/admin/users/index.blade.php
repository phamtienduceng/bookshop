@extends('admin.layout.layout')
@section('contents')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Users Management</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                </div>
                
                <div class="table-responsive">
                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <br>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Roles</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($data as $key => $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td></td>
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
                                                    <a class="btn btn-primary"
                                                        href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                    {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!} --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
