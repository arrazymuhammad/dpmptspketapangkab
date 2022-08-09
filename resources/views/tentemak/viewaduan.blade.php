@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Lihat Pengaduan
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">

                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Details Pengaduan</h4>
                                <table  style="width: 100%;" role="grid">
                                <hr>
                                    <tbody>
                                        <tr>
                                            <th style="width: 200px;">Nama Pengadu :</th>
                                            <td>{{$view->aduan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pengadu :</th>
                                            <td>{{$view->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor HP Pengadu :</th>
                                            <td>{{$view->no_hp}}</td>
                                        </tr>
                                        <tr>
                                            <th>E-mail Pengadu :</th>
                                            <td>{{$view->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Isi Aduan :</th>
                                            <td>{{$view->isi_aduan}}</td>
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