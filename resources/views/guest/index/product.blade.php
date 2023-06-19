<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="section_title new_arrivals_title">New Arrivals</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @foreach($books as $item)
                    <div class="product-item men">
                        <div class="product discount product_filter" style="margin-bottom: -5px; height: 340px">
                            <div class="product_image" style="margin-top: 10px">
                                <img src="{{ asset('/images/'. $item->image) }}" alt="" class="img-fluid" />
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div class="product_info">
                                <h6 class="product_name" style="margin-top: -20px">
                                    <a href="{{ Route('singleProducts', $item->slug) }}">{{ $item->title }}</a>
                                </h6>
                                <div class="product_price">
                                    {{$item->price}}.000 đ<span>{{$item->price}}.000 đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button">
                            <a href="{{ route('wishlist.store', $item->id) }}">Add to Wishlist</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
