@extends('admin.layout.layout')

@section('contents')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product List</h1>
    <h2><a href="{{ Route('product.create') }}">Create new product</a></h2>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div>
            <p>Search <input type="text"></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        <a href="{{ Route('product.edit', $item->id)}}"><input type="button" value="update"></a>
                                        <a>
                                            <form action="{{ Route('product.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    Delete
                                                </button>
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