@extends('admin.layout.layout')

@section('contents')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">Order information</h3>
        </div>
        <form action="{{ Route('product.store')}}" class="row div-view" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input  id="title" class="form-control" name="title" value="{{old('title')}}"/>

                </div>
                @error('title')
                    <span style="color: red">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" class="form-control" name="price" value="{{old('price')}}"/>
                </div>
                @error('price')
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" class="form-control" name="description" value="{{old('description')}}"/>
                </div>
                @error('description')
                <span style="color: red">{{$message}}</span>
                        @enderror
                    <div class="form-group">
                        <label for="category">Category</label>
                            <select id="category" class="form-control custom-select" name="category_id" value="{old('category_id')}}">
                                <option selected disabled>Select one</option>
                                    @foreach($cates as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <span style="color: red">{{$message}}</span>
                        @enderror
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="photo">Main image</label>
                <input type="file" id="photo" class="form-control" name="photo" value="{{old('photo')}}"/>
              </div>
              @error('photo')
              <span style="color: red">{{$message}}</span>
                    @enderror
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="photo1">Image 2</label>
                <input type="file" id="photo1" class="form-control" name="photo1"/>
              </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="photo2">Image 3</label>
                <input type="file" id="photo2" class="form-control" name="photo2"/>
              </div> 
            </div>
            <div class="col-md-12">
        <a href="{{ Route('admin')}}" class="btn btn-danger">Cancel</a>
        <input type="submit" value="Create" class="btn btn-success float-right">
    </div>
        </div>
    </form>
</div>


@endsection