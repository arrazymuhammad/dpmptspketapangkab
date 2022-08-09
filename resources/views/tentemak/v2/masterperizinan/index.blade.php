@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-briefcase"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Master Perizinan</a>
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
                            DAFTAR MASTER PERIZINAN
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('/tentemak/master-perizinan/tambah') }}">
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
                                    <th class="va-m">Nama Perizinan</th>
                                    <th class="hidden-xs va-m" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($view as $var)
                                <tr>
                                    <td>{{$var->perizinan}}</td>
                                    <td>
                                        <a href="{{url('/detailizin/'.$var->id.'')}}" target="_blank"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                                        <a href="{{url('/tentemak/master-perizinan/add/'.$var->id.'')}}"><i class="fa fa-link"></i></a> &nbsp; &nbsp;
                                        <a href="{{url('/tentemak/master-perizinan/edit/'.$var->id.'')}}"><i class="fa fa-edit"></i></a> &nbsp; &nbsp;
                                        <a href="{{url('/tentemak/master-perizinan/delete/'.$var->id.'')}}"><i class="fa fa-trash-o"></i></a>
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
            $('#table_id').DataTable({order:[[1,"asc"]]});
        } );
    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/v2/assets/js/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ url('/public/v2/assets/js/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
@endsection