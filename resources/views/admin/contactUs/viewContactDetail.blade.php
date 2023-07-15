@extends('admin.layout.layout')

@section('contents')

<!-- Begin Page Content -->
<div class="container-fluid">

<form class="row" >
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Contact Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Name:</label> <span>{{$contact->name}}</span>
                </div>
                <div class="form-group">
                    <label for="price">Email:</label> <span>{{$contact->email}}</span>
                </div>

                <div class="form-group">
                    <label for="description">Subject:</label> <span>{{$contact->subject}}</span>
                </div>
                <div class="form-group">
                    <label for="description">Message:</label> <span>{{$contact->message}}</span>
                </div>
                <div>
                </div>
            </div>
            <!-- /.card-body -->
         </div>
    <!-- /.card -->
    </div>
</form>
</div>
<!-- /.container-fluid -->
    
@endsection