<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Sparic– Creative Admin Multipurpose Responsive Bootstrap5 Dashboard HTML Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
        content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template">

    <!-- Favicon -->
    <link rel="icon" href="{{ url('/assets') }}/images/brand/icon1.png" type="image/x-icon">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets') }}/images/brand/icon1.png">

    <!-- Title -->
    <title>{{ config('app.name') }} | @yield('title')</title>

    @include('template.component.style_css')
    @yield('css')

</head>

<body class="app sidebar-mini ltr">

    <!--Global-Loader-->
    <div id="global-loader">
        <img src="{{ url('/assets') }}/images/icon1.svg" style="width: 150px; height: auto;" alt="loader">
    </div>

    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('template.header')
            <!-- app-Header -->

            <!--App-Sidebar-->
            @include('template.sidebar')
            <!--/App-Sidebar-->

            <!-- app-content-->
            <div class="main-content app-content">
                <div class="side-app">

                    <!-- container -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                    <!-- container end -->

                </div>
            </div>
            <!-- End app-content-->
        </div>

        <!--footer-->
        @include('template.footer')
        <!-- End Footer-->

    </div>
    <!-- End Page -->

    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    @include('template.component.style_js')
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#logoutBtn').click(function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Logout',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/logout') }}";
                    }
                });
            });
        });
    </script>
    @yield('script')

</body>

</html>
