@extends('admin.layout.layout')

@section('contents')
<!-- Page Wrapper -->

<div class="container-fluid">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Account Role</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title" class="label">Name:</label> <span>{{ $role->name }}</span>
                </div>
                <div class="form-group">
                    <label for="price" class="label">Permissions:</label> <span>
                        <ul>

                            @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <li>{{ $v->name }},</li>
                            @endforeach
                        @endif
                        </ul>
                    </span>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection