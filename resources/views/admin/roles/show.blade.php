@extends('admin.layout.layout')

@section('contents')

    <div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Show Role</h1>

        <div class="card shadow mb-4">

            <div class="newdiv">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <a href="{{ route('roles.index') }}" class="action-item btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-arrow-left"></i>
                            </span>
                            <span class="text">Back</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <a href="{{ route('roles.edit', $role->id) }}" class="action-item btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <a class="action-item btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'text']) !!}
                            {!! Form::close() !!}
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if (!empty($rolePermissions))
                                @foreach ($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>







        </div>

    </div>

@endsection
