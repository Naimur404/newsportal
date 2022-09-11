


        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('font_asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/font_awesome_5_free.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font_asset/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/css/iziToast.min.css')}}">

        <!-- All Javascripts -->
        <script src="{{ asset('font_asset/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('font_asset/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/wow.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/select2.full.js') }}"></script>
        <script src="{{ asset('font_asset/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('font_asset/js/acmeticker.js') }}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>
        <script src="{{ asset('admin_asset/js/iziToast.min.js')}}"></script>

        <!-- Google Analytics -->
        @if($global_setting->analytic_id_status ==1)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{$global_setting->analytic_id}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', $global_setting->analytic_id);
        </script>
        @endif
