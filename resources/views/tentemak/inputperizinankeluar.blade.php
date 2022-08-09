@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Input Perizinan
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">
                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Input Perizinan</h4>
                                <hr>
                                <form data-abide action="{{action('TentemakController@postperizinankeluar')}}" method="POST">
                                {!!csrf_field()!!}
                                    <div class="name-field">
                                        <label>Array Izin
                                            <textarea name="izinnya" class="form-control" id="" cols="" rows="20"></textarea>
                                        </label>
                                        <small class="error">Isikan Nomor Perizinan.</small>
                                    </div>
                                    <div class="name-field">
                                        <label>Keterangan Perizinan
                                            <select name="keterangan">
                                                <option value="SIUP"> SIUP</option>
                                                <option value="SITU"> SITU</option>
                                                <option value="Gangguan"> Gangguan</option>
                                                <option value="IMB"> IMB</option>
                                            </select>
                                        </label>
                                        <small class="error">Isikan Tanggal Perizinan.</small>
                                    </div>
                                    <input type="hidden" required name="status_kelengkapan" value="0">
                                    <input type="hidden" required name="status_verifikasi" value="0">
                                    <input type="hidden" required name="status_pembayaran" value="0">
                                    <input type="hidden" required name="pengirim" value="AdminData">
                                    <input type="submit" class="tiny button bg-aqua" value="Submit">
                                </form>    
                                <br>
                                <hr>
                                <h4>Daftar Perizinan</h4>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Izin</th>
                                            <!-- <th>Tanggal</th> -->
                                            <th data-hide="phone">
                                                Edit
                                            </th>
                                            <th data-hide="phone">
                                               View 
                                            </th>
                                            <th data-hide="phone">
                                               Delete 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($izin as $var)
                                        <tr>
                                            <td><?php echo $i; $i=$i+1;?></td>
                                            <td>{{($var->nama)}}</td>
                                            <td>{{Date::truncate(($var->tentang), 10, 100)}}</td>
                                            <!-- <td>{{Date::indonesian_date($var->tgl_surat,'j F Y')}}</td> -->
                                            <td style="width: 15px;"><a href="{{url('/tentemak/editperizinan/'.$var->id_izin.'')}}" class="tiny radius button bg-aqua fontello-edit"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/viewperizinan/'.$var->id_izin.'')}}" class="tiny radius button bg-green fontello-eye"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/deleteperizinan/'.$var->id_izin.'')}}" class="tiny radius button bg-red fontello-trash"></a></td>
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