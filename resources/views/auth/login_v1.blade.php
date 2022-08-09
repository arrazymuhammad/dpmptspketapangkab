@extends('tentemak.loginlayout')

@section('content')

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- End of preloader -->
    <!-- right sidebar wrapper -->

    <div class="inner-wrap">
        <div class="wrap-fluid">
            <br>
            <br>
            <!-- Container Begin -->
            <div class="large-offset-4 large-4 columns">
                <div class="box bg-white">
                    <!-- Profile -->
                    <div class="profile">
                        <img alt="" class="" src="{{url('public/assetss/img/logo.png') }}">
                        <h3>Administrator</h3>
                    </div>
                    <!-- End of Profile -->

                    <!-- /.box-header -->
                    <div class="box-body " style="display: block;">
                        <div class="row">

                            <div class="large-12 columns">
                                <div class="row">
                                    <div class="edumix-signup-panel">
                                        <p class="welcome"> Welcome to this awesome app!</p>
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                        {{ csrf_field() }}
                                            <div class="row collapse">
                                                <div class="small-2  columns">
                                                    <span class="prefix bg-green"><i class="text-white icon-user"></i></span>
                                                </div>
                                                <div class="small-10  columns">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="row collapse">
                                                <div class="small-2 columns ">
                                                    <span class="prefix bg-green"><i class="text-white icon-lock"></i></span>
                                                </div>
                                                <div class="small-10 columns ">
                                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                                </div>
                                            </div>
                                        
                                        <p>Already have an account? <a href="#"><a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                        </p>
                                        <button type="submit" class="bg-green" style=" width: 100%">
                                            <span>Sign in</span>
                                        </button>
                                        </form>
                                        <br>
                                    </div>
                                </div>

                            </div>



                        </div>


                    </div>
                    <!-- end .timeline -->
                </div>
                <!-- box -->
            </div>
        </div>
        <!-- End of Container Begin -->
    </div>

@endsection