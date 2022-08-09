@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-camera"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Galeri</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            DAFTAR Galeri
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('/tentemak/tambahgaleri') }}">
                                <button class="btn btn-primary btn-block">+ Tambah</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="chute chute-center">
                        <div class="mh15 pv15 br-b br-light">
                            <div id="mixitup-container">
                                <div class="row">
                                    @foreach($galeri as $var)
                                        <div class="col-md-4">
                                            <div class="mix label1 folder1">
                                                <div class="panel p6 pbn">
                                                    <div class="of-h">
                                                        <img src="{{url(''.$var->gambar.'')}}" class="img-responsive" title="{{Date::truncate(($var->deskripsi), 2, 100)}}" style="width: 420px; height: 248px;">

                                                        <div class="row table-layout">
                                                            <div class="col-xs-8 va-m pln">
                                                                <h6>{{Date::truncate(($var->deskripsi), 2, 100)}}</h6>
                                                            </div>
                                                            <div class="col-xs-4 text-right va-m prn">
                                                                <a href="{{url('/tentemak/editgaleri/'.$var->id.'')}}"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
                                                                <a href="{{url('/tentemak/deletegaleri/'.$var->id.'')}}"><i class="fa fa-trash-o"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script src="{{ url('/public/v2/assets/js/plugins/mixitup/jquery.mixitup.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/pages/basic-gallery.js') }}"></script>

@endsection

@section('css')
@endsection