@extends('tentemak.layout')

@section('content')
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Dashboard
                    </li>
                </ul>
                <div class="row">
                    <div class="large-6 columns">
                        <div class="your-account">
                            <div class="row">
                                <div class="medium-3 columns">
                                    <!-- <div class="circle-progress"></div> -->
                                    <div class="circlestat" data-dimension="90" data-text="<?php echo $visitor; ?>" data-width="8" data-fontsize="16" data-percent="55" data-fgcolor="#222" data-border="5" data-bgcolor="#D5DAE6" data-fill="#FFF"></div>
                                </div>
                                <div class="medium-9 columns ">
                                    <div style="margin:0 10px;padding:0 0 0 20px" class="summary-border-left">
                                        <h4>Jumlah Pengunjung!</h4>
                                        <h6>Setiap <strong>Website</strong> KPT-Ketapang.</h6>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="large-2 columns">
                        <div class="bg-complete-profile">
                            <span class="bg-green fontello-calendar-1"></span>
                            <!--   <img src="public/assetss/img/bag.png"> -->
                            <h6 class="bg-black text-white"><strong><a href="tentemak/inputagenda" style="color: #FFFFFF;">Kelola Agenda</a></strong></h6>
                        </div>

                    </div>
                    <div class="large-2 columns">
                        <div class="bg-complete-profile">
                            <span class="bg-green  fontello-doc-1"></span>
                            <!-- <img src="public/assetss/img/box.png"> -->
                            <h6 class="bg-black text-white"><a href="tentemak/inputberita" style="color: #FFFFFF;">Kelola Berita</a></h6>
                        </div>

                    </div>
                    <div class="large-2 columns">
                        <div class="bg-complete-profile">
                            <span class="bg-green  fontello-photo"></span>
                            <!--  <i class="img/count.png"></i> -->
                            <h6 class="bg-black text-white"><a href="tentemak/inputgaleri" style="color: #FFFFFF;">Kelola Galeri</a></h6>
                        </div>

                    </div>

                </div>


                <!-- Widget  -->
                <div class="row">

                    <div class="large-4 columns">

                        <div class="box">
                            <div class="box-header bg-transparent">
                                <!-- tools box -->
                                <div class="pull-right box-tools">

                                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span>
                                    <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span>
                                </div>
                                <h3 class="box-title"><i class="icon-graph-pie"></i>
                                    <span>Jumlah Data</span>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body " style="display: block;">


                                <div style="margin:0" class="row summary-border-top">
                                    <div class="large-6 columns">
                                        <div class="summary-nest">
                                            <h2 class="text-black"><span class="counter-up"><?php echo $berita; ?></span></h2>
                                            <p>Berita</p>
                                        </div>

                                    </div>
                                    <div class="large-6 columns summary-border-left">
                                        <div class="summary-nest">
                                            <h2 class="text-black"><span class="counter-up"><?php echo $galeri; ?></span></h2>
                                            <p>Galeri</p>
                                        </div>
                                    </div>
                                </div>

                                <div style="margin:0" class="row summary-border-bottom">
                                    <div class="large-6 columns">
                                        <div class="summary-nest summary-pad-nest">
                                            <h2 class="text-black "><span class="counter-up"><?php echo $izin ?></span><small></small></h2>
                                            <p>Perizinan</p>

                                        </div>

                                    </div>
                                    <div class="large-6 columns summary-border-left">
                                        <div class="summary-nest summary-pad-nest">
                                            <h2 class="text-black"><span class="counter-up"><?php echo $aduan; ?></span><small></small></h2>
                                            <p>Pengaduan</p>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin:0" class="row summary-border-bottom">
                                    <div class="large-6 columns">
                                        <div class="summary-nest summary-pad-nest">
                                            <h2 class="text-black "><span class="counter-up"><?php echo $genda ?></span><small></small></h2>
                                            <p>Agenda</p>

                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- end .timeline -->


                        </div>
                        <!-- /.box-body -->
                    </div>


                    <div class="large-4 columns">
                        <!-- timeline item -->
                        <div class="box">
                            <div class="box-header bg-transparent">
                                <!-- tools box -->
                                <div class="pull-right box-tools">

                                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                                    </span>
                                    <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                                    </span>
                                </div>
                                <h3 class="box-title"><i class="icon-view-list"></i>
                                    <span>Agenda</span>
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: block;">
                                <div class="events-nest">
                                    <ul>
                                        @foreach($agenda as $var)
                                        <li>
                                            <h4>{{Date::indonesian_date($var->tanggal,'j F Y')}}</h4>
                                            <p>{{$var->agenda}} <i class="icon-download"></i><i class="  icon-document-new"></i></i>
                                            </p>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                    <div class="large-4 columns">
                        
                    </div>
                    <!-- /.box -->
                </div>
                <!-- End of Widget  -->

@endsection