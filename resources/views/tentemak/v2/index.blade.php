@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Dashboard</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="chute chute-center">
            <div class="row">
            	<div class="col-md-4">
            		<div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                	<img src="{{ url('/public/v2/assets/img/pages/visitor.png') }}" class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h6 class="text-muted">JUMLAH PENGUNJUNG</h6>
                                    <h2 class="fs50 mt5 mbn"><?php echo $visitor; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>

            	<div class="col-md-4">
            		<div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                	<img src="{{ url('/public/v2/assets/img/pages/berita.png') }}" class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h6 class="text-muted">JUMLAH  BERITA</h6>
                                    <h2 class="fs50 mt5 mbn"><?php echo $berita; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>

            	<div class="col-md-4">
            		<div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                	<img src="{{ url('/public/v2/assets/img/pages/galeri.png') }}" class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h6 class="text-muted">JUMLAH GALERI</h6>
                                    <h2 class="fs50 mt5 mbn"><?php echo $galeri; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>
            </div>

            <div class="row">
            	<div class="col-md-8">
                    <div class="panel" id="spy6">
                        <div class="panel-heading">
                            <span class="panel-title">AGENDA</span>
                        </div>
                        <div class="panel-body pn">
                            <div class="bs-component">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="bg-primary br6">
                                        <tr class="br6">
                                            <th class="br-t-l-r6 br-b-n lh25 pl30" colspan="2">JADWAL AGENDA</th>
                                        </tr>
                                        </thead>
                                        <thead class="bg-dark">
	                                        <tr>
	                                            <th class="br-t-n pl30 text-center" width="15%">Tanggal</th>
	                                            <th class="br-t-n hidden-xs text-center">Agenda</th>
	                                        </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($agenda as $var)
	                                        	<tr>
		                                            <td class="pl30">{{Date::indonesian_date($var->tanggal,'j F Y')}}</td>
		                                            <td class="hidden-xs">{{$var->agenda}}</td>
		                                        </tr>
	                                        @endforeach
	                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>

            	<div class="col-md-4">
            		<div class="row">
            			<div class="col-md-12">
            				<div class="panel panel-tile">
		                        <div class="panel-body">
		                            <div class="row pv10">
		                                <div class="col-xs-5 ph10">
		                                	<img src="{{ url('/public/v2/assets/img/pages/aduan.png') }}" class="img-responsive mauto" alt=""/></div>
		                                <div class="col-xs-7 pl5">
		                                    <h6 class="text-muted">JUMLAH ADUAN</h6>
		                                    <h2 class="fs50 mt5 mbn"><?php echo $aduan; ?></h2>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
            			</div>

            			<div class="col-md-12">
            				<div class="panel panel-tile">
		                        <div class="panel-body">
		                            <div class="row pv10">
		                                <div class="col-xs-5 ph10">
		                                	<img src="{{ url('/public/v2/assets/img/pages/agenda.png') }}" class="img-responsive mauto" alt=""/></div>
		                                <div class="col-xs-7 pl5">
		                                    <h6 class="text-muted">JUMLAH AGENDA</h6>
		                                    <h2 class="fs50 mt5 mbn"><?php echo $genda; ?></h2>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- -------------- HighCharts Plugin -------------- -->
    <script src="{{ url('/public/v2/assets/js/plugins/highcharts/highcharts.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/c3charts/d3.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/c3charts/c3.min.js') }}"></script>

    <!-- -------------- Simple Circles Plugin -------------- -->
    <script src="{{ url('/public/v2/assets/js/plugins/circles/circles.js') }}"></script>

    <!-- -------------- Maps JSs -------------- -->
    <script src="{{ url('/public/v2/assets/js/plugins/jvectormap/jquery.jvectormap.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js') }}"></script>

    <!-- -------------- FullCalendar Plugin -------------- -->
    <script src="{{ url('/public/v2/assets/js/plugins/fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <!-- -------------- Date/Month - Pickers -------------- -->
    <script src="{{ url('/public/v2/assets/allcp/forms/js/jquery-ui-monthpicker.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/allcp/forms/js/jquery-ui-datepicker.min.js') }}"></script>

    <!-- -------------- Magnific Popup Plugin -------------- -->
    <script src="{{ url('/public/v2/assets/js/plugins/magnific/jquery.magnific-popup.js') }}"></script>
    
    <script src="{{ url('/public/v2/assets/js/demo/widgets.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/pages/dashboard1.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/magnific/magnific-popup.css') }}">
@endsection