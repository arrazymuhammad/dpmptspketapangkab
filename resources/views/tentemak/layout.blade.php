<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>

    <link rel="stylesheet" href="{{url('public/assetss/css/foundation.css')}}"/>

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="{{url('public/assetss/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/css/dripicon.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/css/typicons.css')}}" />
    <link rel="stylesheet" href="{{url('public/assetss/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{url('public/assetss/sass/css/theme.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/css/portfolio.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/js/text-editor/dist/ui/trumbowyg.css')}}">
    <link rel="stylesheet" href="{{url('public/assetss/js/gallery/swipebox.css')}}" />

    <!-- pace loader -->
    <script src="{{url('public/assetss/js/pace/pace.js')}}"></script>
    <link href="{{url('public/assetss/js/pace/themes/orange/pace-theme-flash.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('public/assetss/js/slicknav/slicknav.css')}}" />
    <link href="http://cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


    <script src="{{url('public/assetss/js/vendor/modernizr.js')}}"></script>

</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- End of preloader -->

    <div class="off-canvas-wrap" data-offcanvas>
        <!-- right sidebar wrapper -->
        <div class="inner-wrap">


            <!-- Right sidemenu -->
            <div id="skin-select">
                <!--      Toggle sidemenu icon button -->
                <a id="toggle">
                    <span class="fa icon-menu"></span>
                </a>
                <!--      End of Toggle sidemenu icon button -->

                <div class="skin-part">
                    <div id="tree-wrap">
                        <!-- Profile -->
                        <div class="profile">
                            <img alt="" class="" src="{{url('public/assetss/img/logo.png')}}">
                            <h3>Administrator </h3>

                        </div>
                        <!-- End of Profile -->

                        <!-- Menu sidebar begin-->
                        <div class="side-bar">
                            <ul id="menu-showhide" class="topnav slicknav">
                                <li>
                                    <a id="tentemak" class="tooltip-tip" href="{{ url('tentemak') }}" title="Dashboard">
                                        <i class="icon-monitor"></i>
                                        <span>Dashboard</span>

                                    </a>

                                </li>

                                <li>
                                    <a id="inputberita" class="tooltip-tip" href="{{ url('tentemak/inputberita') }}" title="Icons">
                                        <i class="fontello-news"></i>
                                        <span>Input Berita</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputgaleri" class="tooltip-tip" href="{{ url('tentemak/inputgaleri') }}" title="Icons">
                                        <i class="fontello-photo"></i>
                                        <span>Input Galeri</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputagenda" class="tooltip-tip" href="{{ url('tentemak/inputagenda') }}" title="Icons">
                                        <i class="fontello-calendar-1"></i>
                                        <span>Input Agenda</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputperizinan" class="tooltip-tip" href="{{ url('tentemak/inputperizinan') }}" title="Icons">
                                        <i class="fontello-doc-text"></i>
                                        <span>Input Perizinan</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputperizinankeluar" class="tooltip-tip" href="{{ url('tentemak/inputperizinankeluar') }}" title="Icons">
                                        <i class="fontello-doc-text"></i>
                                        <span>Input Perizinan Keluar</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputaduan" class="tooltip-tip" href="{{ url('tentemak/inputaduan') }}" title="Icons">
                                        <i class="fontello-comment"></i>
                                        <span>Input Aduan</span>

                                    </a>
                                </li>
                                <li>
                                    <a id="inputuser" class="tooltip-tip" href="{{ url('tentemak/inputuser') }}" title="Icons">
                                        <i class="fontello-user"></i>
                                        <span>Input User</span>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of Rightsidemenu -->



            <div class="wrap-fluid" id="paper-bg">
                <!-- top nav -->
                <div class="top-bar-nest">
                    <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
                        <ul class="title-area left">


                            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a>
                            </li>
                        </ul>

                        <section class="top-bar-section ">
                            <!-- Right Nav Section -->
                            <ul class="left">
                                <li class="has-dropdown bg-white">
                                    <a class="bg-white" href="#"><i class="text-green fa fa-envelope"></i>&nbsp;</a>
                                </li>
                                <li class="has-dropdown bg-white">
                                    <a class="bg-white" href="#"><i class="text-blue fa fa-bell" ></i> </a>
                                </li>
                            </ul>
                            <!-- Left Nav Section -->
                            <ul class="left">

                                <!-- Search | has-form wrapper -->
                                <li class="has-form bg-white">
                                    <div class="row collapse">

                                        <div class="large-12 columns">
                                            <div class="dark"> </div>
                                            <input class="input-top" type="text" placeholder="search">
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="right">
                                <li class="bg-white">
                                    <a class="bg-white" href="{{ url('tentemak/keluar') }}"><span class="admin-pic-text text-gray icon-upload"> Logout </span>
                                    </a>
                                </li>
                            </ul>
                        </section>
                    </nav>
                </div>
                <!-- end of top nav -->

                @yield('content')


                <footer>
                    <div id="footer">Copyright &copy; 2016 - Kantor Pelayanan Terpadu Kabupaten Ketapang </div>

                </footer>
            </div>

            <!-- End of Container Begin -->

        </div>
        <!-- end paper bg -->

    </div>
    <!-- end of off-canvas-wrap -->

    <!-- end of inner-wrap -->



    <!-- main javascript library -->
    <script type='text/javascript' src="{{url('public/assetss/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/waypoints.min.js')}}"></script>
    <script type='text/javascript' src="{{url('public/assetss/js/preloader-script.js')}}"></script>
    <!-- foundation javascript -->
    <script type='text/javascript' src="{{url('public/assetss/js/foundation.min.js')}}"></script>
    <!-- main edumix javascript -->
    <script type='text/javascript' src="{{url('public/assetss/js/slimscroll/jquery.slimscroll.js')}}"></script>
    <script type='text/javascript' src="{{url('public/assetss/js/slicknav/jquery.slicknav.js')}}"></script>
    <script type='text/javascript' src="{{url('public/assetss/js/sliding-menu.js')}}"></script>
    <script type='text/javascript' src="{{url('public/assetss/js/scriptbreaker-multiple-accordion-1.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/number/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/circle-progress/jquery.circliful.js')}}"></script>
    <script type='text/javascript' src="{{url('public/assetss/js/app.js')}}"></script>
    <!-- additional javascript -->
    <!-- <script type="text/javascript" src="{{url('public/assetss/js/skycons/skycons.js')}}"></script> -->
    <script src="{{url('public/assetss/js/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="{{url('public/assetss/js/gallery/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/gallery/jquery.mixitup.min.js') }}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/gallery/jquery.swipebox.js') }}"></script>
    <script src="{{url('public/assetss/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/inputMask/jquery.maskedinput.js') }}"></script>

    <script src="{{url('public/assetss/js/text-editor/dist/trumbowyg.js') }}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{url('public/assetss/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready( function() {
          $( '#example' ).dataTable( {
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
             // Bold the grade for all 'A' grade browsers
             if ( aData[4] == "A" )
             {
               $('td:eq(4)', nRow).html( '<b>A</b>' );
             }
           }
         } );
         } );
    </script>
    <script>
    /** Default editor configuration **/
    $('#wiwiq-editor').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
    </script>


    <script>
    (function($) {
        "use strict";
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        $('#wiwiq-editor').trumbowyg();
        CKEDITOR.config.autoParagraph = false;
        config.shiftEnterMode = CKEDITOR.ENTER_BR;
        config.shiftEnterMode = CKEDITOR.ENTER_DIV;
        config.allowedContent = false; // don't filter my data

        $('#wiwiq-editor').ckeditor({
                toolbar: 'Full',
                enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });    

    })(jQuery);
    </script>

 <script type="text/javascript">
    $(function() {
        //lightbox 
        $('.swipebox').swipebox();
        //filtered portfolio
        var filterList = {
            init: function() {
                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function() {

                // Simple parallax effect
                $('#portfoliolist .portfolio').hover(
                    function() {
                        $(this).find('.label').stop().animate({
                            bottom: 0
                        }, 200, 'easeOutQuad');
                        $(this).find('img').stop().animate({
                            top: -30
                        }, 500, 'easeOutQuad');
                    },
                    function() {
                        $(this).find('.label').stop().animate({
                            bottom: -40
                        }, 200, 'easeInQuad');
                        $(this).find('img').stop().animate({
                            top: 0
                        }, 300, 'easeOutQuad');
                    }
                );

            }

        };

        // Run the show!
        filterList.init();


    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        @if(Request::is('tentemak'))
            $("#tentemak").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputberita'))
            $("#inputberita").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputgaleri'))
            $("#inputgaleri").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputagenda'))
            $("#inputagenda").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputperizinan'))
            $("#inputperizinan").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputperizinankeluar'))
            $("#inputperizinankeluar").attr( 'id', 'menu-select');
        @endif
        @if(Request::is('tentemak/inputaduan'))
            $("#inputaduan").attr( 'id', 'menu-select');
        @endif
       
    });
    
    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }
    </script>


    <script>
    $(document).foundation();
    </script>

    <script type="text/javascript">
     $(document).ready(function() {
        (function($) {
            "use strict";
            $("#date").mask("99/99/9999", {
            });
        })(jQuery);

    });
    </script>

</body>

</html>
