@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Input Galeri
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">

                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Input Galeri</h4>
                                <hr>
                                <form data-abide enctype="multipart/form-data" method="POST" action="{{action('TentemakController@postgaleri')}}">
                                {!!csrf_field()!!}
                                    <div class="name-field">
                                        <label>Judul Gambar
                                            <input type="text" required pattern="[a-zA-Z]+" name="deskripsi">
                                        </label>
                                        <small class="error">Isikan Judul Galeri.</small>
                                    </div>
                                    
                                    <div class="name-field">
                                        <label>Gambar
                                            <input type="file" name="gambar" placeholder="Gambar">
                                        </label>
                                        <small class="error">Isikan File Galeri.</small>
                                    </div>
                                    <button type="submit" class="tiny">Submit</button>
                                </form>    
                                <br>
                                <hr>
                                <h4>Daftar Galeri</h4>
                                
                                @foreach($galeri as $var)
                                <td>
                                    <div class="portfolio man" data-cat="card" style="display: inline-block;margin-left: 2.5em;margin-top: 2em;">
                                    <img class="grayscale" src="{{url(''.$var->gambar.'')}}" alt="" / style="width: 180px;height: 150px;">
                                    <div class="label-social" style="width: 150px;">
                                        <h6>{{Date::truncate(($var->deskripsi), 2, 100)}}</h6>
                                        <center><a href="{{url('/tentemak/editgaleri/'.$var->id.'')}}"><i class="fontello-edit"></i></a>
                                        <a href="{{url('/tentemak/deletegaleri/'.$var->id.'')}}"><i class="fontello-trash"></i></a>
                                        </center>
                                    </div>
                                </div>
                                </td>
                                @endforeach
                            </div>
                            <!-- end .timeline -->
                        </div>
                        <!-- box -->
                    </div>
                </div>

@endsection