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
                                <h4>Daftar Pengaduan</h4>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                No
                                            </th>
                                            <th>
                                                Nama Pengadu
                                            </th>
                                            <th>
                                                Aduan
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Tanggal
                                            </th>
                                            <th data-hide="phone">
                                                Jawab
                                            </th>
                                            <th data-hide="phone">
                                                view
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($aduan as $var)
                                        <tr>
                                            <td><?php echo $i; $i = $i+1?></td>
                                            <td>{{$var->aduan}}</td>
                                            <td>{{$var->isi_aduan}}</td>
                                            <td>{{Date::indonesian_date($var->tanggal,'j F Y')}}</td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/editaduan/'.$var->id_adu.'')}}" class="tiny radius button bg-blue fontello-forward"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/viewaduan/'.$var->id_adu.'')}}" class="tiny radius button bg-green fontello-eye"></a></td>
                                        </tr>
                                        @endforeach
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