@extends('admin.layout.layout')

@section('contents')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Role Management</h1>

        <div class="card shadow mb-4">

            <div class="newdiv">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="new-div-item new-div-add">
                            @can('role-create')
                                <a href="{{ Route('roles.create') }}" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Create New Role</span>
                                </a>
                            @endcan
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
                                <th width="350px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>

                                    <td>
                                        <a href="{{ route('roles.show', $role->id) }}"
                                            class="action-item btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <span class="text">Show</span>
                                        </a>
                                        @can('role-edit')
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="action-item btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                        @endcan

                                        @can('role-delete')
                                        <a class="action-item btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'text']) !!}
                                            {!! Form::close() !!}
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
