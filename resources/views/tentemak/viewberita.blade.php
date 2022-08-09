@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Input Berita
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">

                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Details Berita</h4>
                                <hr>
                                <table style="width: 100%;" role="grid">
                                <hr>
                                    <tbody>
                                        <tr>
                                            <th style="width: 200px;">Gambar Berita :</th>
                                            <td><img src="{{url(''.$view->gambar.'')}}" alt="" / style="width: 180px;height: 150px;"></td>
                                        </tr>
                                        <tr>
                                            <th>Judul Berita :</th>
                                            <td>{{$view->judul}}</td>
                                        </tr>
                                        <tr>
                                            <th>Isi Berita :</th>
                                            <td>{{$view->deskripsi}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Aduan</th>
                                            <td>{{Date::indonesian_date($view->tanggal,'j F Y')}}</td>
                                        </tr>    
                                    </tbody>
                                </table>
                                <!-- end of Date picker -->
                            </div>
                            <!-- end .timeline -->
                        </div>
                        <!-- box -->
                    </div>
                </div>

@endsection