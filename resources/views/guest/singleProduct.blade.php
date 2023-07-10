<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ ('guest/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="codepixer">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Book</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}">					
    <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/responsive.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('guest/product/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/product/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_responsive.css') }}">
</head>
<body>


<header id="header" id="home" style="background-color: black; opacity: 0.9" >
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="{{ Route('home')}}"><img src="{{ asset('guest/img/logo.png') }}" alt="" title="" /></a>
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

        <!-- contents -->
    <div class="super_container">
        <div class="container single_product_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="{{ Route('products')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Products</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                                <div class="single_product_thumbnails">
                                    <ul>
                                        <li><img src="{{ asset('/images/'.$book->image1) }}" alt="" data-image="{{ asset('/images/'.$book->image1) }}"></li>
                                        <li class="active"><img src="{{ asset('/images/'.$book->image) }}" alt="" data-image="{{ asset('/images/'.$book->image) }}"></li>
                                        <li><img src="{{ asset('/images/'.$book->image2) }}" alt="" data-image="{{ asset('/images/'.$book->image2) }}"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                    
                            <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url({{ asset('/images/'.$book->image) }})"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{ $book->title}}</h2>
                            <p>{{ $book->description}}</p>
                        </div>
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>free delivery</span>
                        </div>
                        <div class="original_price">{{ $book->price}}.000 đ</div>
                        <div class="product_price">{{ $book->price}}.000 đ</div>
                        <ul class="star_rating">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <span>Quantity:</span>
                            <div class="quantity_selector">
                                <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                <span id="quantity_value">1</span>
                                <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            <form method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $book->id }}" />
                                <input type="hidden" name="quantity" id="quantity_input" value="1" />
                                <button type="submit" class="btn btn-primary add_to_cart mt-0">Add to Cart</button>
                            </form>
                            <a href="{{ route('wishlist.store', $book->id) }}" class="btn btn-outline-primary add_to_cart mt-0">Wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Related Product</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
					@foreach($related as $item)
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
        <!-- Benefit -->

        <div class="benefit">
            <div class="container">
                <div class="row benefit_row">
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>free shipping</h6>
                                <p>Suffered Alteration in Some Form</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>cach on delivery</h6>
                                <p>The Internet Tend To Repeat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>45 days return</h6>
                                <p>Making it Look Like Readable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>opening all week</h6>
                                <p>8AM - 09PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="post">
                            <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                                <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contents -->
        

    <!-- start footer Area -->		
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                        </p>
                        <p class="footer-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>								
                    </div>
                </div>
                <div class="col-lg-5  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>						
                <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>							
            </div>
        </div>
    </footer>	
    <!-- End footer Area -->	

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

    <script src="{{ asset('guest/product/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('guest/product/js/single_custom.js') }}"></script> 
</body>
</html>



