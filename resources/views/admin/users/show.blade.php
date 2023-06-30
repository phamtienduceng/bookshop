@extends('admin.layout.layout')

@section('contents')

    <div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Show User</h1>

        <div class="card shadow mb-4">

            <div class="newdiv">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <a href="{{ route('users.index') }}" class="action-item btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-arrow-left"></i>
                            </span>
                            <span class="text">Back</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <a href="{{ route('users.edit', $user->id) }}" class="action-item btn btn-success btn-icon-split">
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
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
