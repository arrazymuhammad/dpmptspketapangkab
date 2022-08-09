@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-book"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Berita</a>
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
                            DAFTAR BERITA
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('/tentemak/tambahberita') }}">
                                <button class="btn btn-primary btn-block">+ Tambah</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive tables-datatables" data-spy="scroll" data-target="#nav-spy" data-offset="300">
                        <table class="table table-striped table-hover" id="table_id" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="va-m">Judul</th>
                                    <th class="va-m">Isi</th>
                                    <th class="va-m">Tanggal</th>
                                    <th class="hidden-xs va-m" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($berita as $var)
                                <tr>
                                    <td>{{$var->judul}}</td>
                                    <td>{!!Date::truncate(($var->deskripsi), 10, 100)!!}</td>
                                    <td>{{Date::indonesian_date($var->tanggal,'j F Y')}}</td>
                                    <td>
                                        <a href="{{url('/detailberita/'.$var->id_berita.'')}}" target="_blank"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                                        <a href="{{url('/tentemak/editberita/'.$var->id_berita.'')}}"><i class="fa fa-edit"></i></a> &nbsp; &nbsp;
                                        <a href="{{url('/tentemak/deleteberita/'.$var->id_berita.'')}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- -------------- Datatables JS -------------- -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ url('/public/v2/assets/js/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({order:[[3,"desc"]]});
        } );
    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ url('/public/v2/assets/js/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
@endsection