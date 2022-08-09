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

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/skin/default_skin/css/theme.css') }}">

    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/allcp/forms/css/forms.css') }}">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="{{ url('/public/favicon.png') }}">

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="utility-page sb-l-c sb-r-c">

<!-- -------------- Body Wrap  -------------- -->
<div id="main" class="animated fadeIn">

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- -------------- Content -------------- -->
        <section id="content">

            <!-- -------------- Login Form -------------- -->
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="text-center mb20"><img src="{{ url('/public/v2/assets/img/logo_login_form.png') }}" class="img-responsive" alt="Logo"/></div>
                <div class="panel mw320">

                    <form method="post" action="{{ url('/login') }}" id="form-login">
                        {{ csrf_field() }}
                        <div class="panel-body pn mv10">

                            <div class="section">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="email" id="username" class="gui-input"
                                           placeholder="E-Mail">
                                    <label for="username" class="field-icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input"
                                           placeholder="Password">
                                    <label for="password" class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </label>
                                </label>
                            </div>
                            <!-- -------------- /section -------------- -->

                            <div class="section">
                                <button type="submit" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>
                            <!-- -------------- /section -------------- -->

                        </div>
                        <!-- -------------- /Form -------------- -->
                    </form>
                </div>
                <!-- -------------- /Panel -------------- -->
            </div>
            <!-- -------------- /Spec Form -------------- -->

        </section>
        <!-- -------------- /Content -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="{{ url('/public/v2/assets/js/jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!-- -------------- CanvasBG JS -------------- -->
<script src="{{ url('/public/v2/assets/js/plugins/canvasbg/canvasbg.js') }}"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="{{ url('/public/v2/assets/js/utility/utility.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/demo/demo.js') }}"></script>
<script src="{{ url('/public/v2/assets/js/main.js') }}"></script>

<!-- -------------- /Scripts -------------- -->

</body>

</html>
