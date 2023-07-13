@extends('admin.layout.layout')

@section('contents')

<form action="{{ Route('product.update', $product->id)}}" class="row" 
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Product Information</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input  id="title" class="form-control" name="title" value=""
                    />
                </div>
                @error('title')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" value="{{$product->price}}" class="form-control" name="price"/>
                </div>
                @error('price')
                        <span style="color: red">{{$message}}</span>
                    @enderror

                <div>
                    @if($product->image != null)
                        <div>
                            <img src="{{ asset('/images/'.$product->image)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="photo1">Image: </label>
                    <input type="file" id="photo" class="form-control" name="photo" value="{{ asset('/images/'.$product->image) }}"/>
                </div>


                <div>
                    @if($product->image1 != null)
                        <div>
                            <img src="{{ asset('/images/'.$product->image1)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                @error('title')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                <div class="form-group">
                    <label for="photo1">Image 1: </label>
                    <input type="file" id="photo1" class="form-control" name="photo1"/>
                </div>


                <div>
                    @if($product->image2 != null)
                        <div>
                            <img src="{{ asset('/images/'.$product->image2)}}" alt="" style="width: 200px; height: auto">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="photo2">Image 2: </label>
                    <input type="file" id="photo2" class="form-control" name="photo2"/>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" class="form-control custom-select" name="category_id">
                        <option selected disabled>Select one</option>
                            @foreach($cates as $item)
                                <option value="{{$item->id}}" @if($product->category_id==$item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                    </select>
                </div>
                @error('category_id')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                <div class="form-group">
                    <label for="description">Description</label>
                    <input  id="description" value="{{$product->description}}" class="form-control" name="description"/>
                </div>
                @error('description')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                <div>
                    <button type="submit" name="btn_submit">
                        Update
                    </button>
                </div>
            </div>
            <!-- /.card-body -->
         </div>
    <!-- /.card -->
    </div>
</form>

@endsection