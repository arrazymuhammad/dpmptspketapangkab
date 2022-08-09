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
                    <h2>
                        {{ $view->perizinan }}
                    </h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            {!! $view->isi !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2">
                                            Tambah File Download {{ $view->perizinan }}
                                        </td>
                                        <td width="10%">
                                            <a href="{{ url('/tentemak/master-perizinan/add/'.$view->id.'/file') }}">
                                                <button class="btn btn-block btn-primary">Tambah</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="5%" class="text-center"><b>NO</b></td>
                                        <td class="text-center"><b>NAMA FILE</b></td>
                                        <td class="text-center"><b>AKSI</b></td>
                                    </tr>
                                    @foreach($file as $key=>$var)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $var->nama_file }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/') }}{{ $var->filenya }}" target="_blank"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                                                <a href="{{url('/tentemak/master-perizinan/delete/'.$view->id.'/file/'.$var->id.'')}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ url('/public/v2/assets/js/pages/management-tools-modals.js') }}"></script>
@endsection

@section('css')
@endsection