<!-- New Arrivals -->
<div class="new_arrivals" style="margin-bottom: 50px">
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
                    <div class="product-item men" style="margin-bottom: 30px">
                        <div class="product discount product_filter" style="margin-bottom: -5px; height: 340px">
                            <!-- Product Image -->
                            <div class="product_image" style="margin-top: 10px">
                                <img src="{{ asset('/images/'. $item->image) }}" alt="" />
                            </div>
                            <a href="{{ route('wishlist.store', $item->id) }}" class="favorite favorite_left"></a>
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
                        <button type="button" style="width: 215px" class="btn btn-danger btn-sm add-to-cart-btn" data-product-id="{{ $item->id }}">Add to Cart</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('.add-to-cart-btn').on('click', function () {
      var productId = $(this).data('product-id');

      $.ajax({
        type: 'POST',
        url: '{{ route('cart.store') }}',
        data: {
          _token: '{{ csrf_token() }}',
          product_id: productId,
          quantity: 1
        },
          success: function () {
              swal("Done!", "Add to cart succesfully", "success");
            },
        error: function (xhr) {

        }
      });
    });
  });
</script>
