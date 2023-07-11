<!-- New Arrivals -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <!-- Section Title -->
                <div class="section_title new_arrivals_title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Product Grid -->
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @foreach($books as $item)
                    <div class="product-item men">
                        <div class="product discount product_filter" style="margin-bottom: -5px; height: 340px">
                            <!-- Product Image -->
                            <div class="product_image" style="margin-top: 10px">
                                <img src="{{ asset('/images/'. $item->image) }}" alt="" />
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div class="product_info">
                                <!-- Product Name -->
                                <h6 class="product_name">
                                    <a href="{{ Route('singleProducts', $item->slug) }}" style="margin-top: -20px">{{ $item->title}}</a>
                                </h6>
                                <!-- Product Price -->
                                <div class="product_price">
                                    {{ number_format($item->price, 0, ',', '.') }}₫<span>{{ number_format($item->price, 0, ',', '.') }}₫</span>
                                </div>
                            </div>
                        </div>
                        <!-- Add to Cart Button -->
                        <form class="add-to-cart-form" method="POST" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <button id="add-to-cart-button" type="submit" style="width: 215px" class="btn btn-danger btn-sm">Add to Cart</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
