<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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

    <div class="container mt-5" >
        <!-- Checkout header -->
        <h1 style="margin-top: 80px">
            Check out
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Checkout Form -->

            </div>
        </div>
    </div>
    <div class="container mt-5">
    <form action="{{ route('checkout.processPayment') }}" method="POST">
            @csrf
        <div class="row">

            <div class="col-md-4">
                
                    <!-- Customer Name -->
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name"  value="{{ auth()->user()->name }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}"  required disabled>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ auth()->user()->phone }}" required>
                    </div>

                    <!-- Country -->
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="USA">USA</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Australia">Australia</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Germany">Germany</option>
                            <option value="France">France</option>
                            <option value="Italy">Italy</option>
                            <option value="Spain">Spain</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Russia">Russia</option>
                            <option value="China">China</option>
                            <option value="India">India</option>
                            <option value="Japan">Japan</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Argentina">Argentina</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Egypt">Egypt</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="Canada">Canada</option>
                            <!-- Thêm các quốc gia khác -->
                        </select>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input class="form-control" id="address" name="address" placeholder="Address" required  value="{{ auth()->user()->address }}"></input>
                    </div>

                    <!-- Note -->
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea class="form-control" id="note" name="note" placeholder="Note">{{ old('note') }}</textarea>
                    </div>

                </div>

                <div class="col-md-4">

                    Làm ở đây nha
                </div>

                <div class="col-md-4">
                                        <!-- Order Total -->
                                        <div class="form-group">
                        <label for="order_total">Order Total:</label>
                        <input type="text" class="form-control" id="order_total" name="order_total" value="{{ $totalPrice }}" readonly>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="">Select Payment Method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>

                    <!-- Shipping Units -->
                    <div class="form-group">
                        <label for="shipping_units">Shipping Units:</label>
                        <select class="form-control" id="shipping_units" name="shipping_units" required>
                            <option value="">Select Shipping Units</option>
                            <option value="unit1">Grab Giao Hàng</option>
                            <option value="unit2">LalaMove</option>
                            <option value="fedex">FedEx</option>
                            <option value="ups">UPS</option>
                            <option value="dhl">DHL Express</option>
                            <option value="usps">USPS</option>
                            <option value="ems">EMS</option>
                            <option value="tnt">TNT Express</option>
                        </select>
                    </div>


                    <!-- Payment Amount -->
                    <div class="form-group">
                        <label for="payment_amount">Payment Amount:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Việt Nam Đồng</span>
                            </div>
                            <input type="text" class="form-control" id="payment_amount" name="payment_amount" value="{{ $totalPrice }}" readonly>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Process Payment</button>
                    </div>
                </div>
            </div>
        </form>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <!-- Including jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to add commas as thousand separators
            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            // Apply the formatting to 'payment_amount'
            var payment_amount = $('#payment_amount').val();
            $('#payment_amount').val(numberWithCommas(payment_amount));

            // Apply the formatting to 'order_total'
            var order_total = $('#order_total').val();
            $('#order_total').val(numberWithCommas(order_total));

            // Function to remove commas
            function removeCommas(x) {
                return x.replace(/,/g, '');
            }

            // When form is submitted
            $('form').on('submit', function(e) {
                // Remove commas from 'payment_amount' and 'order_total'
                var payment_amount_no_commas = removeCommas($('#payment_amount').val());
                var order_total_no_commas = removeCommas($('#order_total').val());

                // Set the values of 'payment_amount' and 'order_total' to the values without commas
                $('#payment_amount').val(payment_amount_no_commas);
                $('#order_total').val(order_total_no_commas);
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
