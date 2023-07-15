@extends('admin.layout.layout')
@section('contents')
    <!-- Page Wrapper -->
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">User Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title" class="label">Name:</label> <span>{{$user->name}}</span>
                </div>
                <div class="form-group">
                    <label for="price" class="label">Email:</label> <span>{{$user->email}}</span>
                </div>

                <div class="form-group">
                    <label for="description" class="label">Registration date:</label> <span>{{$user->created_at}}</span>
                </div>
                <div class="form-group">
                    <label for="description" class="label">Role:</label> <span>
                    @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                    </span>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
