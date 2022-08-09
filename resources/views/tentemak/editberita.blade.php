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
                                <h4>Input Berita</h4>
                                <hr>
                                <!-- Masked Input -->
                                <form data-abide enctype="multipart/form-data" method="POST" action="{{url('/tentemak/updateberita/'.$view->id_berita.'')}}">
                                {!!csrf_field()!!}
                                    <div class="name-field">
                                        <label>Judul Berita
                                            <input type="text" required pattern="[a-zA-Z]+" name="judul" value="{{$view->judul}}">
                                        </label>
                                        <small class="error">Isikan Judul Berita.</small>
                                    </div>
                                    <div class="name-field">
                                        <label>Isi Berita
                                            <textarea id="wiwiq-editor" name="deskripsi" onfocus="this.value='';">{{$view->deskripsi}}</textarea>
                                        </label>
                                        <small class="error">Isikan Isi Berita.</small>
                                    </div>
                                    <div class="name-field">
                                        <label>Tags Berita
                                            <input type="text" required pattern="[a-zA-Z]+" name="tags" value="{{$view->tags}}">
                                        </label>
                                        <small class="error">Isikan Judul Berita.</small>
                                    </div>
                                    <img src="{{url(''.$view->gambar.'')}}" alt="" / style="width: 180px;height: 150px;">
                                    <div class="name-field">
                                        <label>Gambar
                                            <input type="file" name="gambar" placeholder="Gambar">
                                        </label>
                                        <small class="error">Isikan File Berita.</small>
                                    </div>
                                    <button type="submit" class="tiny">Submit</button>
                                </form>    
                                <br>
                                <hr>
                                <h4>Daftar Berita</h4>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="large-4 columns">
                                        <input class="form-control" id="filter" placeholder="Cari..." type="text" />
                                    </div>
                                </div>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                No
                                            </th>
                                            <th>
                                                Judul
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Isi
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Tanggal
                                            </th>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;  ?>
                                        @foreach($berita as $var)
                                        <tr>
                                            <td><?php echo $i; $i=$i+1; ?></td>
                                            <td>{{$var->judul}}</td>
                                            <td>{!!Date::truncate(($var->deskripsi), 10, 100)!!}</td>
                                            <td>{{Date::indonesian_date($var->tanggal,'j F Y')}}</td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/editberita/'.$var->id_berita.'')}}" class="tiny radius button bg-aqua fontello-edit"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/viewberita/'.$var->id_berita.'')}}" class="tiny radius button bg-green fontello-eye"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/deleteberita/'.$var->id_berita.'')}}" class="tiny radius button bg-red fontello-trash"></a></td>
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