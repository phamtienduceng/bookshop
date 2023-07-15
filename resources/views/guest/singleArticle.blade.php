<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ ('guest/img/fav.png') }}" />
    <!-- Author Meta -->
    <meta name="author" content="codepixer" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Book</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/css/layout.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/main_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}" />
    <link href="{{ asset('guest/product/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('guest/product/plugins/themify-icons/themify-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_responsive.css') }}" />

</head>
<body>
    <header id="header" id="home" style="background-color: black; opacity: 0.9">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{ Route('home')}}">
                        <img src="{{ asset('guest/img/logo.png') }}" alt="" title="" />
                    </a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active">
                            <a href="{{ Route('home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{ Route('products')}}">Product</a>
                        </li>
                        <li>
                            <a href="{{ Route('articles')}}">Articles</a>
                        </li>
                        <li>
                            <a href="{{ Route('aboutUs')}}">About us</a>
                        </li>
                        <li>
                            <a href="{{ Route('contactUs')}}">Contact us</a>
                        </li>
                        <li>
                            <a href="{{ Route('cart.store') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </li>

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

    <header id="header" id="home" style="background-color: black; opacity: 0.9">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{ Route('home')}}">
                        <img src="{{ asset('guest/img/logo.png') }}" alt="" title="" />
                    </a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active">
                            <a href="{{ Route('home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{ Route('products')}}">Product</a>
                        </li>
                        <li>
                            <a href="{{ Route('articles')}}">Articles</a>
                        </li>
                        <li>
                            <a href="{{ Route('aboutUs')}}">About us</a>
                        </li>
                        <li>
                            <a href="{{ Route('contactUs')}}">Contact us</a>
                        </li>
                        <li>
                            <a href="{{ Route('cart.store') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </li>
                        @guest
                        <li class="menu-has-children">
                            <a href="">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ (request()->is('login')) ? 'active' : '' }}" href="{{ Route('login') }}">Login</a>
                                </li>
                                <li>
                                    <a class="{{ (request()->is('register')) ? 'active' : '' }}" href="{{ Route('register') }}">Sign up</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="menu-has-children">
                            <a href="">{{auth()->user()->name}} </a>
                            <ul>
                                <li>
                                    <a class="" href="{{ Route('profile') }}">Profile</a>
                                </li>
                                <li><a class="" href="{{ Route('password') }}">UpdatePassword</a></li>
                                <li>
                                    <a class="" href="{{ Route('logout') }}">LogOut</a>
                                </li>
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
                            <li>
                                <a href="{{Route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{ Route('articles')}}">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>Articles
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </li>
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
                                        <li>
                                            <img src="{{ asset('/images/'.$article->image1) }}" alt="" data-image="{{ asset('/images/'.$article->image1) }}" />
                                        </li>
                                        <li class="active">
                                            <img src="{{ asset('/images/'.$article->image) }}" alt="" data-image="{{ asset('/images/'.$article->image) }}" />
                                        </li>
                                        <li>
                                            <img src="{{ asset('/images/'.$article->image2) }}" alt="" data-image="{{ asset('/images/'.$article->image2) }}" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="single_product_image">
                                    <div class="single_product_image_background" style="background-image:url({{ asset('/images/'.$article->image) }})"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="product_details_title">
                            <h2>{{ $article->title}}</h2>
                            <p>{{ $article->content}}</p>
                        </div>
                        <ul class="star_rating">
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </li>
                        </ul>
                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <a href="{{ route('bookmark', $article->id) }}" class="btn btn-outline-primary mt-0">Bookmark</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="new_arrivals">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="section_title new_arrivals_title">
                                <h2>Related Articles</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                                @foreach($related as $item)
                                <div class="product-item men">
                                    <div class="article product_filter" style="margin-bottom: -5px; height: 340px">
                                        <div class="product_image" style="margin-top: 10px">
                                            <img src="{{ asset('/images/'. $item->image) }}" alt="" />
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="article_title">
                                                <a href="{{ Route('singleArticles', $item->slug) }}" style="margin-top: -20px">{{ $item->title}}</a>
                                            </h6>
                                        </div>
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
                                <div class="benefit_icon">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </div>
                                <div class="benefit_content">
                                    <h6>free shipping</h6>
                                    <p>Suffered Alteration in Some Form</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                                <div class="benefit_content">
                                    <h6>cach on delivery</h6>
                                    <p>The Internet Tend To Repeat</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                </div>
                                <div class="benefit_content">
                                    <h6>45 days return</h6>
                                    <p>Making it Look Like Readable</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 benefit_col">
                            <div class="benefit_item d-flex flex-row align-items-center">
                                <div class="benefit_icon">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <div class="benefit_content">
                                    <h6>opening all week</h6>
                                    <p>8AM - 9PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contents -->


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.plus').click(function () {
                    var quantity = parseInt($('#quantity_value').text());
                    quantity += 1;
                    $('#quantity_value').text(quantity);
                    $('#quantity_input').val(quantity);
                });

                $('.minus').click(function () {
                    var quantity = parseInt($('#quantity_value').text());
                    if (quantity > 1) { // prevent going below 1
                        quantity -= 1;
                        $('#quantity_value').text(quantity);
                        $('#quantity_input').val(quantity);
                    }
                });
            });
        </script>

</body>
</html>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
