<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->

    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('admin/css/css-manage.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/styles/bootstrap4/bootstrap.min.css') }}" />
    <link href="{{ asset('product/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/plugins/OwlCarousel2-2.2.1/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/styles/main_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('product/styles/responsive.css') }}" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- sidebar -->
        @include('admin.layout.partials.sidebar')
        <!-- end of sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- header -->
                @include('admin.layout.partials.header')
                <!-- endofheader -->

                <!-- dashboard -->
                @yield('contents')
                <!-- end of dashboard -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.layout.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ Route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>


    <script src="{{ asset('product/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('product/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('product/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('product/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('product/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('product/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('product/js/custom.js') }}"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>

    <script type="text/javascript">
		$(document).ready(function(){
			$('#filter_cate').on('change', function(){
				var url = $(this).val();
				if(url){
					window.location = url;
				}
				return false;
			});
		});
	</script>
    @yield('sorting')
</body>


</html>
