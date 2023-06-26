@extends('admin.layout.layout')

@section('contents')

    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Users Management</h1>

        <div class="card shadow mb-4">

            <div class="newdiv">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="new-div-item new-div-add">
                            <a href="{{ Route('users.create') }}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add new product</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="350px">Action</th>
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
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="action-item btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <span class="text">Show</span>
                                        </a>

                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="action-item btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <a class="action-item btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'text']) !!}
                                            {!! Form::close() !!}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
