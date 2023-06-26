@extends('admin.layout.layout')

@section('contents')

    <div class="container-fluid">


        <h1 class="h3 mb-2 text-gray-800">Product List</h1>

        <div class="card shadow mb-4">

            <div class="newdiv">
                <form
                    class=" new-div-item d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="new-div-item dropdown mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Default sorting
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Name (A-Z)</a>
                        <a class="dropdown-item" href="#">Name (Z-A)</a>
                        <a class="dropdown-item" href="#">Price (Low to High)</a>
                        <a class="dropdown-item" href="#">Price (High to Low)</a>
                        <a class="dropdown-item" href="#">Newest</a>
                        <a class="dropdown-item" href="#">Oldest</a>
                    </div>
                </div>
                <div class="new-div-item dropdown mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Name (A-Z)</a>
                        <a class="dropdown-item" href="#">Name (Z-A)</a>
                        <a class="dropdown-item" href="#">Price (Low to High)</a>
                        <a class="dropdown-item" href="#">Price (High to Low)</a>
                        <a class="dropdown-item" href="#">Newest</a>
                        <a class="dropdown-item" href="#">Oldest</a>
                        <a class="dropdown-item" href="#">Oldest</a>
                    </div>
                </div>
                <div class="new-div-item new-div-add">
                    <a href="{{ Route('product.create') }}" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add new product</span>
                    </a>
                </div>
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
                            @if ($books != null && count($books) > 0)
                                @foreach ($books as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->category != null ? $item->category->name : '' }}</td>
                                        <td>
                                            @if ($item->image != null)
                                                <img src="{{ asset('/images/' . $item->image) }}" alt=""
                                                    style="width:200px; height:auto;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="action-item btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-info-circle"></i>
                                                </span>
                                                <span class="text">View</span>
                                            </a>
                                            <a href="{{ Route('product.edit', $item->id) }}"
                                                class="action-item btn btn-success btn-icon-split">
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
                                                    <span class="text">Delete</span>
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

@endsection
