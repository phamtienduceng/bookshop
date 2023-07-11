<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Cart</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/layout.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}" />
    <link href="{{ asset('guest/product/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/main_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/responsive.css') }}" />
</head>
<body>
<header id="header" id="home" style="background-color: black; opacity: 0.9" >
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
					<a href="{{ Route('home')}}"><img src="{{ asset('/images/logo.jpg')}}" style="width: 80px"></a>
					</div>
					<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="{{ Route('home')}}">Home</a></li>
						<li><a href="{{ Route('products')}}">Product</a></li>
						<li><a href="{{ Route('articles')}}">Articles</a></li>
						<li><a href="{{ Route('aboutUs')}}">About us</a></li>
						<li><a href="{{ Route('contactUs')}}">Contact us</a></li>
						<li><a href="{{ Route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
						<li><a href="{{ Route('wishlist.index')}}"><i class="fa-solid fa-heart"></i></a></li>
						@guest
						<li class="menu-has-children"><a href=""><i class="fa-solid fa-user"></i></a>
						<ul>
							<li><a class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ Route('login') }}">Login</a></li>
							<li><a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ Route('register') }}">Sign up</a></li>
						</ul>
						</li> 
							@else 
						<li class="menu-has-children"><a href="">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</a>
						<ul> 
							<li><a class="" href="{{ Route('profile') }}">Profile</a></li>
							<li><a class="" href="{{ Route('logout') }}">LogOut</a></li> 
						</ul>
						</li>
						@endguest
					</ul>
					</nav><!-- #nav-menu-container -->		    		
				</div>

			</div>
	</header><!-- #header -->

    <div class="container mt-5">
        <h1>My Cart</h1>
        <!--<h2><a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a></h2>-->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col">
                @if(count($cartItems) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr id="product-row-{{ $item['product']['id'] }}">
                            <td>{{ $item['product']['title'] }}</td>
                            <td>
                                <img src="{{ asset('images/' . $item['product']['image']) }}" alt="{{ $item['product']['title'] }}" style="width: 100px;" />
                            </td>
                            <td>{{ number_format($item['product']['price'], 0, ',', '.') }}₫</td>
                            <td>
                                <button class="btn btn-secondary decrease-quantity" data-product-id="{{ $item['product']['id'] }}">-</button>
                                <span id="quantity-{{ $item['product']['id'] }}" data-price="{{ $item['product']['price'] }}">{{ $item['quantity'] }}</span>
                                <button class="btn btn-secondary increase-quantity" data-product-id="{{ $item['product']['id'] }}">+</button>
                            </td>
                            <td id="total-{{ $item['product']['id'] }}">{{ number_format($item['product']['price'] * $item['quantity'], 0, ',', '.') }}₫</td>
                            <td>
                                <button class="btn btn-danger remove-item" data-product-id="{{ $item['product']['id'] }}">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="total-price">
                    <h3 id="grandTotal">Total Price: {{ number_format($totalPrice, 0, ',', '.') }}₫</h3>
                </div>

                <div class="checkout-button">
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">Checkout</a>
                </div>
                @else
                <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Add these lines before your cart.js script -->
    <script>
        var updateQuantityUrl = "{{ url('/cart/update-quantity') }}";
        var removeItemUrl = "{{ url('/cart/remove-item') }}";
    </script>
    <!-- Now include your cart.js script -->
    <script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>
