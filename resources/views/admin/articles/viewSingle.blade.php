@extends('admin.layout.layout')

@section('contents')

<form class="row" >
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Product Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label> <span>{{$book->title}}</span>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label> <span>{{$book->price}}</span>
                </div>
                <div>
                    @if($book->image != null)
                        <div>
                            <label for="title">Main image:</label>
                            <img src="{{ asset('/images/'.$book->image)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                <div>
                    @if($book->image1 != null)
                        <div>
                            <label for="title">Sub image 1:</label>
                            <img src="{{ asset('/images/'.$book->image1)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                <div>
                    @if($book->image2 != null)
                        <div>
                            <label for="title">Sub image 2:</label>
                            <img src="{{ asset('/images/'.$book->image2)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description:</label> <span>{{$book->description}}</span>
                </div>
                <div class="form-group">
                    <label for="description">Category:</label> <span>{{$book->category->name}}</span>
                </div>
                <div>
                <a href="{{ Route('product.edit', $book->id)    }}" class="action-item btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                </div>
            </div>
            <!-- /.card-body -->
         </div>
    <!-- /.card -->
    </div>
</form>

@endsection
