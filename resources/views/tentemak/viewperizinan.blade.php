@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Lihat Perizinan
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">

                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Details Perizinan</h4>
                                <table  style="width: 100%;" role="grid">
                                <hr>
                                    <tbody>
                                        <tr>
                                            <th style="width: 200px;">Nomor Perizinan :</th>
                                            <td>{{$view->nomer}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama :</th>
                                            <td>{{$view->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>NIK :</th>
                                            <td>{{$view->nik}}</td>
                                        </tr>
                                        <tr>
                                            <th>Isi Perizinan :</th>
                                            <td>{{$view->tentang}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Perizinan :</th>
                                            <td>{{Date::indonesian_date($view->tgl_surat,'j F Y')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <td>{{$view->keterangan}}</td>
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