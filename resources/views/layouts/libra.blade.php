<!DOCTYPE html>
<!--[if IE 6]><html id="ie6" class="ie" lang="en-US"><![endif]-->
<!--[if IE 7]><html id="ie7" class="ie" lang="en-US"><![endif]-->
<!--[if IE 8]><html id="ie8" class="ie" lang="en-US"><![endif]-->
<!--[if IE 9]><html id="ie9" class="ie" lang="en-US"><![endif]-->
<!--[if gt IE 9]><html class="ie" lang="en-US"><![endif]-->
<!--[if !IE]><html lang="en-US"><![endif]-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

    <title>Vita Guard | Portal Kesehatan Member</title>

    <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('libra/css/reset.css') }}" />
    <!-- BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('libra/css/bootstrap.css') }}" />
    <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('libra/style.css') }}" />

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('libra/favicon.ico') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('libra/favicon.ico') }}" />

    <link rel='stylesheet' id='thickbox-css' href='{{ asset('libra/js/thickbox/thickbox.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='usquare-css-css' href='{{ asset('libra/sliders/usquare/css/frontend/usquare_style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css' href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='{{ asset('libra/css/responsive.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css' href='{{ asset('libra/sliders/polaroid/css/polaroid.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css' href='{{ asset('libra/css/shortcodes.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css' href='{{ asset('libra/css/contact_form.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css' href='{{ asset('libra/css/custom.css') }}' type='text/css' media='all' />

    <style type="text/css">
        body { 
            background-color: #ffffff; 
            background-image: url("{{ asset('libra/images/bg-pattern.png') }}"); 
            background-repeat: repeat; 
            background-position: top left; 
            background-attachment: scroll; 
        }

        /* 1. Pengaturan Full Width */
        #wrapper, #topbar, #header, #footer, #copyright {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box;
        }
        .wrapper-border {
            display: none !important;
        }
        
        #topbar .container {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #header .container, #primary .container, #footer .container, #copyright .container {
            width: 95% !important;
            max-width: 1440px !important;
            margin: 0 auto !important;
        }

        /* 2. Perbaikan Navbar */
        #nav {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            height: 50px;
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #nav ul#menu-menu {
            display: flex !important;
            list-style: none !important;
            margin: 0 !important;
            padding: 0 0 0 20px !important;
        }

        #nav ul#menu-menu li {
            position: relative;
            margin: 0 !important;
            padding: 0 !important;
        }

        #nav ul#menu-menu li a {
            display: block;
            line-height: 50px;
            padding: 0 20px !important;
            color: #ffffff !important;
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        #nav ul#menu-menu li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* 3. Perbaikan Tombol Logout Pojok Kanan */
        #topbar_login {
            margin: 0 !important;
            padding: 0 !important;
            margin-left: auto !important;
        }

        #topbar_login a.topbar_login {
            display: block;
            line-height: 50px;
            padding: 0 25px !important;
            color: #ffffff !important;
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none !important;
            text-transform: uppercase;
            background-color: rgba(0, 0, 0, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.1);
        }

        #topbar_login a.topbar_login:hover {
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* 4. Perbaikan Struktur Layanan Darurat */
        #logo-headersidebar-container {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            flex-wrap: wrap;
        }

        #header-sidebar {
            display: flex !important;
            justify-content: flex-end !important;
            align-items: center !important;
        }

        #header-sidebar .widget-first {
            display: flex !important;
            align-items: center !important;
            gap: 15px;
            background: none !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        #header-sidebar .text-image {
            float: none !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
        }

        #header-sidebar .text-image img {
            display: block !important;
            max-height: 40px;
            width: auto;
        }

        #header-sidebar .text-content {
            float: none !important;
            margin: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
        }

        #header-sidebar .text-content h3 {
            color: #ffffff !important;
            font-family: 'Open Sans Condensed', sans-serif !important;
            font-size: 18px !important;
            font-weight: bold !important;
            margin: 0 0 2px 0 !important;
            letter-spacing: 1px !important;
            line-height: 1.2 !important;
        }

        #header-sidebar .text-content p {
            color: #a3b5c3 !important;
            font-family: 'Open Sans', sans-serif !important;
            font-size: 14px !important;
            margin: 0 !important;
            line-height: 1.2 !important;
        }
        
        #logo #tagline {
            color: #a3b5c3 !important;
            margin-top: 5px !important;
        }

        /* 5. Perbaikan Bagian Copyright Sesuai image_6f01b8.png */
        #copyright .row {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            flex-wrap: wrap;
        }

        #copyright .left {
            display: flex !important;
            align-items: center !important;
            gap: 10px;
        }

        #copyright .left img {
            max-height: 20px;
            width: auto;
            display: inline-block;
        }

        #copyright .right {
            text-align: right;
        }

        #copyright .right a {
            color: #cbd113 !important;
            font-weight: bold;
            text-decoration: none !important;
        }

        #copyright .right a:hover {
            text-decoration: underline !important;
        }
    </style>

    <script type='text/javascript' src='{{ asset('libra/js/jquery/jquery.js') }}'></script>
</head>

<body class="home page no_js responsive stretched">
    <div class="bg-shadow">
        
        <div id="wrapper" class="container-fluid group" style="padding: 0; max-width: 100%; width: 100%;">

            <!-- START TOP BAR (NAVIGASI MENU UTAMA MEMBER) -->
            <div id="topbar">
                <div class="container">
                    <div class="row" style="margin: 0 !important;">
                        <div id="nav" style="display: flex; justify-content: space-between; align-items: center; box-sizing: border-box; width: 100%;">
                            
                            <!-- MENU STRUKTUR JALUR ROUTE KHUSUS MEMBER -->
                            <ul id="menu-menu" class="level-1">
                                <li><a href="{{ url('/member/doctors') }}">DOCTOR</a></li>
                                <li><a href="{{ url('/member/articles') }}">ARTICLE</a></li>
                                <li><a href="{{ url('/member/bookings') }}">BOOKING</a></li>
                                <li><a href="{{ url('/member/consultations') }}">CONSULTATION</a></li>
                                <li><a href="{{ url('/member/history') }}">HISTORY</a></li>
                            </ul>

                            <!-- SISTEM LOGOUT DI POJOK KANAN TOPBAR -->
                            <div id="topbar_login">
                                @auth
                                    <a class="topbar_login" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        LOGOUT ({{ Auth::user()->name }})
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a class="topbar_login" href="{{ route('login') }}">LOGIN</a>
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END TOP BAR -->

            <!-- START HEADER -->
            <div id="header" class="group margin-bottom">
                <div class="group container">
                    <div class="row" id="logo-headersidebar-container">
                        <!-- LOGO BRAND VITA GUARD -->
                        <div id="logo" class="span6 group">
                            <a id="logo-img" href="{{ url('/') }}" title="Libra">
                                <img src="{{ asset('libra/images/libra-logo1.png') }}" title="Libra" alt="Libra" />
                            </a>
                            <p id='tagline'>Portal Kesehatan Vita Guard</p>
                        </div>
                        
                        <!-- HEADER HUBUNGI KAMI / EMERGENCY -->
                        <div id="header-sidebar" class="span6 group">
                            <div class="widget-first widget header-text-image">
                                <div class="text-image">
                                    <img src="{{ asset('libra/images/phone1.png') }}" alt="CUSTOMER SUPPORT" />
                                </div>
                                <div class="text-content">
                                    <h3>LAYANAN DARURAT</h3>
                                    <p>+62 - 21 - 5551234</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END HEADER -->

            <!-- START PRIMARY -->
            <div id="primary" class="sidebar-no">
                <div class="container group">
                    <div class="row">
                        <div id="content-home" class="span12 content group" style="min-height: 450px;">
                            
                            <!-- Slot Content Dinamis Blade Laravel -->
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PRIMARY -->

            <!-- START FOOTER -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <!-- <div class="footer-widgets-area with-sidebar-right">
                            <div class="widget-first widget span4 widget_text">
                                <h3>Tentang Kami</h3>
                                <div class="textwidget">
                                    Vita Guard berkomitmen menyediakan layanan edukasi serta konsultasi kesehatan terbaik langsung dari genggaman Anda.
                                </div>
                            </div> -->

                            <!-- <div class="widget span4 widget_nav_menu">
                                <h3>Navigasi Cepat</h3>
                                <div class="menu-widget-footer-container">
                                    <ul id="menu-widget-footer" class="menu">
                                        <li><a href="{{ url('/member/doctors') }}">Cari Dokter</a></li>
                                        <li><a href="{{ url('/member/articles') }}">Artikel Kesehatan</a></li>
                                        <li><a href="{{ url('/member/bookings') }}">Konsultasi Online</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FOOTER -->

            <!-- START COPYRIGHT -->
            <div id="copyright">
                <div class="container">
                    <div class="row">
                        <!-- SISI KERI: LOGO YITH DAN TEKS COPYRIGHT -->
                        <div class="left span6">
                            <p>
                                <a href="http://yithemes.com/">
                                    <img src="http://yithemes.com/cdn/images/various/footer_yith_grey.png" alt="Your Inspiration Themes" />
                                </a>
                                &nbsp;Copyright {{ date('Y') }} - <strong>Libra theme</strong> by Your Inspiration Themes
                            </p>
                        </div>
                        <!-- SISI KANAN: TAUTAN DOWNLOAD STRUKTUR ASLI -->
                        <div class="right span6">
                            <p>
                                <a href="http://yithemes.com/themes/wordpress/libra-corporate-portfolio-wp-theme/?ap_id=libra-html">
                                    <strong>Download the free version for Wordpress</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END COPYRIGHT -->

        </div>
    </div>

    <!-- JAVASCRIPT BINDING PLUGINS TEMPLATE -->
    <script type='text/javascript' src='{{ asset('libra/js/comment-reply.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/underscore.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery/jquery.masonry.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/sliders/polaroid/js/jquery.polaroid.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.colorbox-min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.easing.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.carouFredSel-6.1.0-packed.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jQuery.BlackAndWhite.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.touchSwipe.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/sliders/polaroid/js/jquery.transform-0.8.0.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/sliders/polaroid/js/jquery.preloader.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/responsive.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/mobilemenu.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.superfish.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.placeholder.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/contact.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.tipsy.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.cycle.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/shortcodes.js') }}'></script>
    <script type='text/javascript' src='{{ asset('libra/js/jquery.custom.js') }}'></script>

</body>
</html>