@extends('guest.layout.layout')

@section('contents')

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Our Products</h2>
				</div>
			</div>
		</div>
		<div class="row">

				
			<div class="col">

				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
				@foreach($books as $item)
					<div class="product-item men">
						<div class="product discount product_filter" style="margin-bottom: -5px; height: 340px">
							<div class="product_image" style="margin-top: 10px">
								<img src="{{ asset('/images/'. $item->image) }}" alt="">
							</div>
							<div class="favorite favorite_left"></div>
							<div class="product_info">
								<h6 class="product_name"><a href="{{ Route('singleProducts', $item->slug) }}" style="margin-top: -20px">{{ $item->title}}</a></h6>
								<div class="product_price">{{$item->price}}.000 đ<span>{{$item->price}}.000 đ</span></div>
							</div>
						</div>
						<div class="red_button add_to_cart_button" style="width: 100%; margin-left: unset; margin-top: -25px">
							<a href="#">add to cart</a>
						</div>
					</div>
					@endforeach
				</div>
				
			</div>

		</div>
	</div>
</div>

@endsection