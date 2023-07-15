@extends('admin.layout.layout')

@section('contents')

<div class="container-fluid" >
<div class="card shadow mb-4 ">
    <div class="card-header">
        <h3 class="card-title">Product Information</h3>
    </div>
    <div class="row div-view">
        <div class="col-md-5">
            <div class="form-group">
                <label for="title" class="label">Title:</label> <span>{{$book->title}}</span>
            </div>
            <div class="form-group">
                <label for="price" class="label">Price:</label> <span>{{$book->price}}</span>
            </div>
            <div class="form-group">
                <label for="description" class="label">Description:</label> <span>{{$book->description}}</span>
            </div>
            <div class="form-group">
                <label for="category" class="label">Category:</label> <span>{{$book->category->name}}</span>
            </div>
            <div class="form-group">
                <a href="{{ Route('product.edit', $book->id) }}" class="action-item btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Update</span>
                </a>
            </div>
        </div>

        <div class="col-md-7">
            <table border="1">
                <thead>
                    <tr>
                        <th>Main Image</th>
                        <th>Sub image 1</th>
                        <th>Sub image 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                        <div>
                    @if($book->image != null)
                        <div>
                            <img src="{{ asset('/images/'.$book->image)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                        </th>
                        <th>
                        <div>
                        @if($book->image1 != null)
                            <div>
                                <img src="{{ asset('/images/'.$book->image1)}}" alt="" style="width: 200px; height: auto">
                            </div>
                        @endif
                    </div>
                        </th>
                        <th>
                        <div>
                        @if($book->image2 != null)
                            <div>
                                <img src="{{ asset('/images/'.$book->image2)}}" alt="" style="width: 200px; height: auto">
                            </div>
                        @endif
                    </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection