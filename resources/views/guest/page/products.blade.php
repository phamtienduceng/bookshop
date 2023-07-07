@extends('guest.layout.layout')

@section('contents')
<div class="new_arrivals bg-light py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Our Products</h2>
                </div>
            </div>
        </div>




        <div class="row">
            @foreach($books as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="{{ Route('singleProducts', $item->slug) }}">
                        <img class="card-img-top" src="{{ asset('/images/'. $item->image) }}" alt="{{ $item->title }}" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ Route('singleProducts', $item->slug) }}">{{ $item->title }}</a>
                        </h5>
                        <h5>{{ $item->price }}.000 đ</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <!-- Add to Wishlist link -->
                        <a href="{{ route('wishlist.store', $item->id) }}" class="btn btn-outline-primary btn-sm">Add to Wishlist</a>

                        <!-- Add to Cart form -->
                        <form class="add-to-cart-form" method="POST" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <button id="add-to-cart-button" type="submit" class="btn btn-danger btn-sm">Add to Cart</button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush
