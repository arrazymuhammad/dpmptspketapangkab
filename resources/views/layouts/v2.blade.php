<!DOCTYPE html>
<html>
<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>{{ AppHelper::pengaturan('nama_apps') }}</title>
    <meta name="keywords" content="{{ AppHelper::pengaturan('nama_apps') }}"/>
    <meta name="description" content="{{ AppHelper::pengaturan('nama_apps') }}">
    <meta name="author" content="Feri Harjulianto">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>

    <!-- -------------- Icomoon -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/fonts/icomoon/icomoon.css') }}">

    @yield('css')    

    <!-- -------------- Plugins -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/c3charts/c3.min.css') }}">

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/skin/default_skin/css/theme.css') }}">

    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/allcp/forms/css/forms.css') }}">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="{{ url('/public/favicon.png') }}">
    <style>
        i.fa.fa-eye {
            font-size: 31px;
        }
        i.fa.fa-link {
            font-size: 31px;
        }
        i.fa.fa-edit {
            font-size: 31px;
        }
        i.fa.fa-trash-o {
            font-size: 31px;
        }
    </style>
    
    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="dashboard-page">

<!-- -------------- Body Wrap  -------------- -->
<div id="main">

    <!-- -------------- Header  -------------- -->
    <header class="navbar navbar-fixed-top bg-dark">
        <div class="navbar-logo-wrapper">
            <a class="navbar-logo-text" href="{{ url('/tentemak') }}">
                <b>Admin DPMPTSP</b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li class="hidden-xs">
                <a class="navbar-fullscreen toggle-active" href="#">
                    <span class="glyphicon glyphicon-fullscreen"></span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name>Halo , {{ Auth::user()->name }}</name> </span>
                    <span class="fa fa-caret-down hidden-xs mr15"></span>
                    <img src="{{ url('/public/logo.png') }}" alt="avatar" class="mw55">
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    <li class="dropdown-footer text-center">
                        <a href="{{ url('/tentemak/keluar') }}" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> Logout </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header">

                <!-- -------------- Sidebar - Author -------------- -->
                <div class="sidebar-widget author-widget">
                    <div class="media">
                        <a class="media-left" href="#">
                            <img src="{{ url('/public/logo.png') }}" class="img-responsive">
                        </a>

                        <div class="media-body">
                            <div class="media-links">
                                <a>Selamat Datang,</a>
                            </div>
                            <div class="media-author"><div class="media-author">{{ Auth::user()->name }}</div></div>
                        </div>
                    </div>
                </div>

            <!-- -------------- Sidebar Menu  -------------- -->
            @include('tentemak.v2.partials.sidebar')
            <!-- -------------- /Sidebar Menu  -------------- -->

            <!-- -------------- Sidebar Hide Button -------------- -->
            <div class="sidebar-toggler">
                <a href="#">
                    <span class="fa fa-arrow-circle-o-left"></span>
                </a>
            </div>
            <!-- -------------- /Sidebar Hide Button -------------- -->

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>
    <!-- -------------- /Sidebar -------------- -->

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">
        @yield('konten')
        <!-- -------------- Page Footer -------------- -->
        <footer id="content-footer" class="affix">
            <div class="row">
                <div class="col-md-6">
                    <span class="footer-legal">© {{ date('Y') }} {{ AppHelper::pengaturan('nama_apps') }}</span>
                </div>
                <div class="col-md-6 text-right">
                    {{ AppHelper::pengaturan('versi') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="footer-meta"></span>
                    <a href="#content" class="footer-return-top">
                        <span class="fa fa-angle-up"></span>
                    </a>
                </div>
            </div>
        </footer>
        <!-- -------------- /Page Footer -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="{{ url('/public/v2/assets/js/jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

@yield('js')

<!-- -------------- Theme Scripts -------------- -->
<script src="{{ url('/public/v2/assets/js/utility/utility.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/demo/demo.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/main.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/demo/widgets_sidebar.js') }}"></script>



</body>

</html>
