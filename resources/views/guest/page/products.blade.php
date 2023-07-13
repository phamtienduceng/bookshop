<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/images/onlyLogo.png') }}" />
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
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('guest/product/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guest/product/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/categories_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/categories_responsive.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
</head>

<body>
    <header id="header" id="home" style="background-color: black; opacity: 0.9">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{ Route('home') }}"><img src="{{ asset('/images/logo.jpg') }}" style="width: 80px"></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{ Route('home') }}">Home</a></li>
                        <li><a href="{{ Route('products') }}">Product</a></li>
                        <li><a href="{{ Route('articles') }}">Articles</a></li>
                        <li><a href="{{ Route('aboutUs') }}">About us</a></li>
                        <li><a href="{{ Route('contactUs') }}">Contact us</a></li>
                        <li><a href="{{ Route('cart.index') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                        <li><a href="{{ Route('wishlist.index') }}"><i class="fa-solid fa-heart"></i></a></li>
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
                            <li><a class="" href="{{ Route('logout') }}">LogOut</a></li> 
                        </ul>
                        </li>
                        @endguest
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <div class="super_container">
        <div class="container product_section_container">
            <div class="row">
                <div class="col product_section clearfix">
                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="{{ Route('home') }}">Home</a></li>
                            <li class="active"><a href="{{ Route('products') }}"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i>Product</a></li>
                        </ul>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <h5>Book Category</h5>
                            </div>
                            <form action="{{ URL::current() }}" method="get" name="filter">
                                @foreach ($category as $cate)
                                    @php
                                        $checked = [];
                                        if (isset($_GET['filter_cate'])) {
                                            $checked = $_GET['filter_cate'];
                                        }
                                    @endphp
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="check2"
                                            name="filter_cate[]" value="{{ $cate->id }}"
                                            @if (in_array($cate->id, $checked)) checked @endif>
                                        {{ $cate->name }}
                                    </div>
                                @endforeach
                                <hr>
                                <div class="sidebar_title">
                                    <h5>Filter by Price</h5>
                                </div>
                                <div id="slider-range"></div>
                                <input type="text" id="amount" readonly
                                    style="border:0; color:#f6931f; font-weight:bold;">
                                <input type="hidden" name="start_price" id="start_price">
                                <input type="hidden" name="end_price" id="end_price">
                                <div class="d-grid">
                                    <input class="btn btn-danger btn-block" type="submit" value="FILTER"
                                        style="margin-top: 10px">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="main_content">
                        <div class="products_iso">
                            <div class="row">
                                <div class="col">
                                    <div class="product_sorting_container product_sorting_container_top">
                                        <ul class="product_sorting">
                                            <form action="">
                                                @csrf
                                                <select name="sort" id="sort" class="">
                                                    <option value="{{Request::url()}}?sort_by=none">All</option>
                                                    <option value="{{Request::url()}}?sort_by=price_desc">Price: High to Low</option>
                                                    <option value="{{Request::url()}}?sort_by=price_asc">Price: Low to High</option>
                                                    <option value="{{Request::url()}}?sort_by=title_asc">Name: A-Z</option>
                                                    <option value="{{Request::url()}}?sort_by=title_desc">Name: Z-A</option>
                                                    <option value="{{Request::url()}}?sort_by=latest">Latest</option>
                                                    <option value="{{Request::url()}}?sort_by=oldest">Oldest</option>
                                                </select>
                                            </form>
                                        </ul>
                                        <div class="pages d-flex flex-row align-items-center">
                                            <form action="{{ Route('search') }}" method="get">
                                                <div class="input-group">
                                                    <input class="form-control border-end-0 border rounded-pill"
                                                        name="keywords" type="text" placeholder="Search..."
                                                        id="example-search-input">
                                                    <span class="input-group-append">
                                                        <button
                                                            class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5"
                                                            type="submit">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-grid">
                                        @foreach($books as $item)
                                        <div class="product-item men" style="margin-bottom: 20px">
                                            <div class="product discount product_filter" style="margin-bottom: -5px; height: 340px">
                                                <div class="product_image" style="margin-top: 10px">
                                                    <img src="{{ asset('/images/'. $item->image) }}" alt="">
                                                </div>
                                                <a href="{{ route('wishlist.store', $item->id) }}" class="favorite favorite_left"></a>
                                                <div class="product_info">
                                                    <h6 class="product_name"><a href="{{ Route('singleProducts', $item->slug) }}" style="margin-top: -20px">{{ $item->title}}</a></h6>
                                                    <div class="product_price">{{ number_format($item->price, 0, ',', '.') }}₫<span>{{ number_format($item->price, 0, ',', '.') }}₫</span></div>
                                                </div>
                                            </div>
                                          <form class="add-to-cart-form" method="POST" action="{{ route('cart.store') }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $item->id }}" />
    <input type="hidden" name="quantity" value="1" />
    <button class="add-to-cart-button" type="button" style="width: 215px" class="btn btn-danger btn-sm">Add to Cart</button>
</form>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $books->onEachSide(1)->links() }}
                                    </div>
                                    <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                        <ul class="product_sorting">
                                            <li>
                                                <span>Show:</span>
                                                <span class="num_sorting_text">12</span>
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="sorting_num">
                                                    <li class="num_sorting_btn"><span>08</span></li>
                                                    <li class="num_sorting_btn"><span>12</span></li>
                                                    <li class="num_sorting_btn"><span>16</span></li>
                                                    <li class="num_sorting_btn"><span>20</span></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. </p>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
                                <div class="d-flex flex-row">
                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>

                                    <div class="info"></div>
                                </div>
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

    <script src="{{ asset('guest/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('guest/js/popper.js') }}"></script>
    <script src="{{ asset('guest/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/js/stellar.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('guest/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('guest/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('guest/js/main.js') }}"></script>
    <script src="{{ asset('guest/product/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('guest/product/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('guest/product/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('guest/product/js/categories_custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500000,
                values: [0, 500000],
                slide: function(event, ui) {
                    $("#amount").val(ui.values[0].toLocaleString() + "₫ - " + ui.values[1].toLocaleString() + "₫");
                    $("#start_price").val(ui.values[0]);
                    $("#end_price").val(ui.values[1]);
                }
            });
            $("#amount").val($("#slider-range").slider("values", 0).toLocaleString() +
                "₫ - " + $("#slider-range").slider("values", 1).toLocaleString() + "₫");
            $("#start_price").val($("#slider-range").slider("values", 0));
            $("#end_price").val($("#slider-range").slider("values", 1));
        });
    </script>
   <script>
    $(document).ready(function() {
        $('.add-to-cart-button').click(function() {
            var form = $(this).closest('form');
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    // Hiển thị thông báo add thành công
                    alert('Added to Cart successfully!');
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi khi add to cart không thành công
                    alert('Error adding to Cart.');
                }
            });
        });
    });
</script>
</body>

</html>
