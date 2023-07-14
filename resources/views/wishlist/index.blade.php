<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Wishlist</title>
    <!-- Bootstrap CSS -->
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}">					
    <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/layout.css') }}">
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
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
						  <li><a href="{{ Route('cart.store') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
						  <li><a href=""><i class="fa-solid fa-heart"></i></a></li>
                          @guest
                        <li class="menu-has-children"><a href=""><i class="fa-solid fa-user"></i></a>
                        <ul>
                            <li><a class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ Route('login') }}">Login</a></li>
                            <li><a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ Route('register') }}">Sign up</a></li>
                        </ul>
                        </li> 
                            @else 
                        <li class="menu-has-children"><a href="">{{auth()->user()->name}}</a>
                        <ul> 
                            <li><a class="" href="{{ Route('profile') }}">Profile</a></li>
                            <li><a class="" href="{{ Route('password') }}">Change Password</a></li>
                            <li><a class="" href="{{ Route('logout') }}">LogOut</a></li> 
                        </ul>
                        </li>
                        @endguest
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
</header><!-- #header -->

    <div class="container mt-5" style="min-height: 500px">
        <h1 style="margin-top: 80px">Your Wishlist</h1>

        <div class="row">
            <div class="col">
                @if(count($wishlist) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50%">Title</th>
                            <th width="14%">Image</th>
                            <th width="12%">Price</th>
                            <th width="12%">Shop</th>
                            <th width="12%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wishlist as $book)
                        <tr>
                            <td><a style="text-decoration: none; color: black" href="{{ Route('singleProducts', $book->slug) }}">{{$book->title}}</a></td>
                            <td>
                            <a style="text-decoration: none; color: black" href="{{ Route('singleProducts', $book->slug) }}">
                                <img src="{{ asset('/images/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}" style="width: 100px; margin-left: -20px"/>
                            </a>   
                            </td>
                            <td>{{ number_format($book->price, 0, ',', '.') }}₫</td>
                            <td>
                                <form class="add-to-cart-form" method="POST" action="{{ route('cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $book->id }}" />
                                    <input type="hidden" name="quantity" value="1" />
                                    <button type="submit" class="btn btn-success add-to-cart-btn">Add to Cart</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{ route('wishlist.destroy', $book->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger wishlist-remove-btn">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>

        			<!-- start footer Area -->		
                    <footer class="footer-area section-gap" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                    <h6 class="header-footer">About us</h6>
                        <ul class="ul-footer">
                            <li>Location: District 3, Nam Ky Khoi Nghia street, Ho Chi Minh city</li>
                            <li>Number: 012345678</li>
                            <li>Contact: <a href="#" style="text-decoration: none">triducstore@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="header-footer">Shopping</h6>
                        <ul class="ul-footer">
                            <li><a href="{{ Route('products') }}">Products</a></li>
                            <li><a href="{{ Route('articles') }}">Articles</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="header-footer">Information</h6>
                        <ul class="ul-footer">
                            <li><a href="{{ Route('contactUs') }}">About us</a></li>
                            <li><a href="{{ Route('aboutUs') }}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                    <img src="{{ asset('/images/logo.jpg')}}" alt="" class="logo-footer">
                        <div class="footer-social d-flex align-items-center social">
                            <a href="https://facebook.com">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://google.com">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="https://instagram.com">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr-footer">
            <div class="row footer-end">
                <div class="col-lg-12">
                    Copyright 2023 Duc Tri Co. Ltd. All Right Reserved.
                </div>
            </div>
        </div>
    </footer>
			<!-- End footer Area -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<script src="{{ asset('guest/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('guest/js/vendor/bootstrap.min.js') }}"></script>			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('guest/js/easing.min.js') }}"></script>			
<script src="{{ asset('guest/js/hoverIntent.js') }}"></script>
<script src="{{ asset('guest/js/superfish.min.js') }}"></script>	
<script src="{{ asset('guest/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('guest/js/jquery.magnific-popup.min.js') }}"></script>	
<script src="{{ asset('guest/js/owl.carousel.min.js') }}"></script>			
<script src="{{ asset('guest/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('guest/js/jquery.nice-select.min.js') }}"></script>			
<script src="{{ asset('guest/js/parallax.min.js') }}"></script>	
<script src="{{ asset('guest/js/waypoints.min.js') }}"></script>
<script src="{{ asset('guest/js/jquery.counterup.min.js') }}"></script>			
<script src="{{ asset('guest/js/mail-script.js') }}"></script>	
<script src="{{ asset('guest/js/main.js') }}"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
