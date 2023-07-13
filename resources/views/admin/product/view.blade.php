@extends('admin.layout.layout')

@section('contents')

<!-- Begin Page Content -->
<div wire:ignore class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product List</h1>

    <div class="card shadow mb-4">

        <div class="newdiv">
            <div class="new-div-item ">
            <form action="">
                @csrf
                <select class="form-select" aria-label="Default select example" name="filter_cate" id="filter_cate">
                    <option value="{{Request::url()}}?cate=0">Category</option>
                    <option value="{{Request::url()}}?cate=8">All</option>
                    <option value="{{Request::url()}}?cate=1">Literature</option>
                    <option value="{{Request::url()}}?cate=2">Politics - Legal</option>
                    <option value="{{Request::url()}}?cate=3">Science - Technology</option>
                    <option value="{{Request::url()}}?cate=4">Culture - Sociery - Hisory</option>
                    <option value="{{Request::url()}}?cate=5">Novel</option>
                    <option value="{{Request::url()}}?cate=6">Psychology</option>
                    <option value="{{Request::url()}}?cate=7">Children</option>
                </select>            
            </form>

            </div>
            <div class="new-div-item new-div-add">
                <a href="{{ Route('product.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add new product</span>
                </a>
            </div>
        </div>
        
        <div class="card-body" wire:ignore>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" wire:ignore>
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">Title</th>
                            <th width="10%">Price</th>
                            <th width="15%">Category</th>
                            <th width="25%">Image</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($books != null && count($books) > 0)
                            @foreach($books as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->category != null ? $item->category->name : ''}}</td>
                                    <td>
                                        @if($item->image != null)
                                            <img src="{{ asset('/images/'.$item->image)}}" alt="" style="width:200px; height:auto;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Route('viewSingle', $item->slug)}}" class="action-item btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">View</span>
                                        </a>
                                        <a href="{{ Route('product.edit', $item->id)}}" class="action-item btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Update</span>
                                        </a>
                                        <a class="action-item btn btn-danger btn-icon-split">
                                            <form action="{{ Route('product.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <button type="submit">Delete</button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="5">No data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
