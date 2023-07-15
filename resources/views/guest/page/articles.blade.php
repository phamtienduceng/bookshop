@extends('guest.layout.layout')

@section('contents')

<!DOCTYPE html>
<html>
	<head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> --}}
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('/images/onlyLogo.png') }}">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Articles</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
        <!--
        =======================CSS======================
                                                        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('guest/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/contact.css') }}">
        <link rel="stylesheet" href="{{ asset('guest/css/layout.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('guest/cart.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('guest/css/article.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/bootstrap4/bootstrap-grid.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/OwlCarousel2-2.2.1/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/main_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/responsive.css') }}">

        <link rel="stylesheet" href="{{ asset('guest/product/plugins/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('guest/product/styles/single_responsive.css') }}">

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>


		<div class="page-wrap">
			<!-- Content-->
			<div class="md-content">

				<!-- page-title -->
				<div class="page-title">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 offset-0 offset-sm-0 offset-md-0 offset-lg-2 ">
								<h2 class="page-title__title">Articles Hub</h2>

								<!--  -->
								<nav><a class="breadcrumb__item" href="{{ Route('home')}}">Home</a><span class="breadcrumb__item active">Articles</span>
								</nav><!-- End /  -->

							</div>
						</div>
					</div>
				</div><!-- End / page-title -->


				<!-- Section -->
				<section class="md-section">
					<div class="container">

						<!-- layout-blog sidebar-left -->
						<div class="layout-blog sidebar-left">
							<div class="layout-blog__content">

								<!--  -->
								<div class="post-01__style-02 md-text-center">
									<div class="post-01__media"><a href="blog-detail.html"><img src="{{ asset('/guest/img/blogs/2.jpg')}}" alt=""/></a>
									</div>
									<div>
										<ul class="post-01__categories"><li>Facts & More</li></ul>
                                                                {{--        <a href="blog-detail.html"></a>    --}}
										<h2 class="post-01__title">Our Story</h2>
										<div class="post-01__time">July 08, 2023</div>
										<div class="post-01__note">by Phat Tai</div>
									</div>
								</div><!-- End /  -->


								<!--  -->
								<div class="post-01__style-02 md-text-center">
									<div class="post-01__media">

											<!-- video -->
											<div class="video" data-init="video">
												<iframe src="https://www.youtube.com/embed/xtlSdQwOGWE" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
												<div class="video-content">
													<div class="video-background" style="background-image: url({{ asset('/guest/img/blogs/5.jpg')}});"></div>
													<div class="video-inner">
														<div class="video-button"><i class="fa fa-play"></i></div>
													</div>
												</div>
											</div><!-- End / video -->

									</div>
									<div>
										<ul class="post-01__categories">
											<li>Blog</li>
										</ul>
										<h2 class="post-01__title">Vlog - Iconic book shop tour 📚</h2>
										<div class="post-01__time">May 06, 2023</div>
										<div class="post-01__note">by Neska</div>
									</div>
								</div><!-- End /  -->


								<!--  -->
								<div class="post-01__style-02 md-text-center">
									<div class="post-01__media">
										<div><iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1564770373&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/user-806038088" title="Ryan Mack" target="_blank" style="color: #cccccc; text-decoration: none;">Ryan Mack</a> · <a href="https://soundcloud.com/user-806038088/on-my-way" title="On My Way" target="_blank" style="color: #cccccc; text-decoration: none;">On My Way</a></div></div>
									</div>
									<div>
										<ul class="post-01__categories">
											<li>Your Articles</li>
										</ul>
										<h2 class="post-01__title">Music - On My Way</h2>
										<div class="post-01__time">Feb 22, 2023</div>
										<div class="post-01__note">by Ryan Mack</div>
									</div>
								</div><!-- End /  -->


								<!--  -->
								<div class="post-01__style-02 md-text-center">
									<div class="post-01__media">

										<!-- carousel__element owl-carousel -->
										<div class="carousel__element owl-carousel" data-options="{items: 1, loop: true, nav: true, dots: false}">
											<div><img src="{{ asset('/guest/img/blogs/best1.jpg')}}" alt=""/></div>
											<div><img src="{{ asset('/guest/img/blogs/best2.jpg')}}" alt=""/></div>
                                            <div><img src="{{ asset('/guest/img/blogs/best3.jpg')}}" alt=""/></div>
										</div><!-- End / carousel__element owl-carousel -->

									</div>
									<div>
										<ul class="post-01__categories">
											<li>Blog</li>
										</ul>
										<h2 class="post-01__title">Top 3 Books of 2023 So Far</h2>
										<div class="post-01__time">July 12, 2023</div>
										<div class="post-01__note">by Duc Tri Bookshop</div>
									</div>
								</div><!-- End /  -->

								<!-- pagination -->
								<ul class="pagination"><a class="pagination__item" href="#">1</a><a class="pagination__item" href="#">2</a><a
                                    class="pagination__item" href="#">3</a><span class="pagination__item active">4</span></ul><!-- End / pagination -->
							</div>

							<aside class="layout-blog__sidebar">

									<!--  -->
									<div>

										<!-- widget-text__widget -->
										<section class="widget-text__widget widget-text__style-02 widget">
											<h3 class="widget-title">Search</h3>
											<div class="widget-text__content">

												<!-- form-search -->
												<div class="form-search">
													<form>
														<input class="form-control" type="text" placeholder="Type and Hit Enter..."/>
													</form>
												</div><!-- End / form-search -->

											</div>
										</section><!-- End / widget-text__widget -->


										<!-- widget-text__widget -->
										<section class="widget-text__widget widget-text__style-02 widget">
											<h3 class="widget-title">categories</h3>
											<div class="widget-text__content">
												<ul>
													<li><a href="#">Accounting</a></li>
													<li><a href="#">Budgets</a></li>
													<li><a href="#">Business</a></li>
													<li><a href="#">Business Plans</a></li>
													<li><a href="#">Commodities</a></li>
													<li><a href="#">Insurance</a></li>
												</ul>
											</div>
										</section><!-- End / widget-text__widget -->


										<!-- widget-text__widget -->
										<section class="widget-text__widget widget-text__style-04 widget">
											<h3 class="widget-title">recent post</h3>
											<div class="widget-text__content">

												<!--  -->
												<div class="post-01__style-03">
													<div>
														<h2 class="post-01__title"><a href="#">Design a Perfect Homepage</a></h2>
														<div class="post-01__time">Oct 26, 2017</div>
														<div class="post-01__note">by Alice Brooks</div>
													</div>
												</div><!-- End /  -->


												<!--  -->
												<div class="post-01__style-03">
													<div>
														<h2 class="post-01__title"><a href="#">How to Master Microcopy</a></h2>
														<div class="post-01__time">Oct 28, 2017</div>
														<div class="post-01__note">by Ann Fowler</div>
													</div>
												</div><!-- End /  -->


												<!--  -->
												<div class="post-01__style-03">
													<div>
														<h2 class="post-01__title"><a href="#">How to Master Microcopy</a></h2>
														<div class="post-01__time">Oct 10, 2017</div>
														<div class="post-01__note">by Brandon Hanson</div>
													</div>
												</div><!-- End /  -->


												<!--  -->
												<div class="post-01__style-03">
													<div>
														<h2 class="post-01__title"><a href="#">Design a Perfect Homepage</a></h2>
														<div class="post-01__time">Oct 19, 2017</div>
														<div class="post-01__note">by Brandon Hanson</div>
													</div>
												</div><!-- End /  -->

											</div>
										</section><!-- End / widget-text__widget -->


										<!-- widget-text__widget -->
										<section class="widget-text__widget widget">
											<h3 class="widget-title">popular tags</h3>
											<div class="widget-text__content">

												<!-- tagclould -->
												<div class="tagclould"><a href="#">Accounting</a><a href="#">Budgets</a><a href="#">Business</a><a href="#">Business</a><a href="#">Plans</a><a href="#">Commodities</a><a href="#">Insurance</a><a href="#">Consulting</a>
												</div><!-- End /  tagclould -->

											</div>
										</section><!-- End / widget-text__widget -->


										<!-- widget-text__widget -->
										<section class="widget-text__widget widget-text__style-03 widget">
											<h3 class="widget-title">Archieves</h3>
											<div class="widget-text__content">
												<ul>
													<li><a href="#">June  2017</a></li>
													<li><a href="#">November  2017</a></li>
													<li><a href="#">March  2017</a></li>
													<li><a href="#">July 2017</a></li>
												</ul>
											</div>
										</section><!-- End / widget-text__widget -->

									</div><!-- End /  -->

							</aside>
						</div><!-- End / layout-blog sidebar-left -->

					</div>
				</section>
				<!-- End / Section -->

			</div>
			<!-- End / Content-->

		</div>

	</body>

		<!-- Vendors-->
		<script src="{{ asset('guest/js/vendors/jquery/jquery.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/imagesloaded/imagesloaded.pkgd.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/isotope-layout/isotope.pkgd.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.countdown/jquery.countdown.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.countTo/jquery.countTo.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.countUp/jquery.countup.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.matchHeight/jquery.matchHeight.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.mb.ytplayer/jquery.mb.YTPlayer.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/masonry-layout/masonry.pkgd.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/owl.carousel/owl.carousel.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/jquery.waypoints/jquery.waypoints.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/menu/menu.min.js')}}"></script>
		<script src="{{ asset('guest/js/vendors/smoothscroll/SmoothScroll.min.js')}}"></script>

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
        <script type="text/javascript" src="{{ asset('guest/js/articles.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</html>
