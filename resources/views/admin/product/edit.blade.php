@extends('admin.layout.layout')

@section('contents')


<div class="container-fluid" >
    <div class="card-header">
        <h3 class="card-title">Product Information</h3>
    </div>
    <div class="card shadow mb-4 div-view">
        <form action="{{ Route('product.update', $product->id)}}" class="row" 
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="label">Title</label>
                    <input  id="title" class="form-control" name="title" value="{{$product->title}}"
                    />
                </div>
                @error('title')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                <div class="form-group">
                    <label for="price" class="label">Price</label>
                    <input id="price" value="{{$product->price}}" class="form-control" name="price"/>
                </div>
                @error('price')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category" class="label">Category</label>
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
                    <label for="description" class="label">Description</label>
                    <input  id="description" value="{{$product->description}}" class="form-control" name="description"/>
                </div>
                @error('description')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="photo1" class="label">Image: </label>
                        @if($product->image != null)
                            <div>
                                <img src="{{ asset('/images/'.$product->image)}}" alt="" style="width: 200px; height: auto">
                            </div>
                        @endif
                        <input type="file" id="photo" class="form-control" style="width: 300px; margin-top: 10px;" name="photo" value="{{ asset('/images/'.$product->image) }}"/>
                    </div>
                <div class="form-group col-md-4">
                    <label for="photo1" class="label">Image 1: </label>
                        @if($product->image1 != null)
                            <div>
                                <img src="{{ asset('/images/'.$product->image1)}}" alt="" style="width: 200px; height: auto">
                            </div>
                        @endif
                    <input type="file" id="photo1" style="width: 300px; margin-top: 10px;" class="form-control" name="photo1"/>
                </div>
                <div class="form-group col-md-4">
                    <label for="photo2" class="label">Image 2: </label>
                        @if($product->image2 != null)
                            <div>
                                <img src="{{ asset('/images/'.$product->image2)}}" alt="" style="width: 200px; height: auto">
                            </div>
                        @endif
                    <input type="file" id="photo2" style="width: 300px; margin-top: 10px;" class="form-control" name="photo2"/>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success" style="margin: 10px 0px; " name="btn_submit">
                    Update
                </button>
            </div>
        </form>
    </div>
<div>
    <a href="{{ Route('admin')}}">
        <button class="btn btn-danger">
            Cancel
        </button>
    </a>
</div>
</div>
@endsection