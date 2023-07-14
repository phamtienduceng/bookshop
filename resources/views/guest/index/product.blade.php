<!-- New Arrivals -->
<div class="new_arrivals" style="margin-bottom: 100px">
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
                            <div class="product_image ajax-form-2" style="margin-top: 10px">
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
                        <form class="add-to-cart-form ajax-form" method="POST" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <button type="submit" style="width: 215px" class="btn btn-danger btn-sm">Add to Cart</button>
                        </form>
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
        // Gửi yêu cầu bằng Ajax khi submit form
        $('.ajax-form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                data: form.serialize(),
                success: function () {
                swal("Done!", "Add to cart succesfully", "success");
            },
                error: function (xhr) {
                    // Xử lý lỗi (nếu có)
                }
            });
        });
    });
</script>
