@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-barcode"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Perizinan</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    UBAH PERIZINAN
                </div>
                <div class="panel-body">
                    <form action="{{ url('/tentemak/updateperizinan/'.$view->id_izin.'') }}" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nomor Perizinan</label>
                                <input type="text" required="" name="nomer" class="form-control" value="{{ $view->nomer }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" required="" name="nama" class="form-control" value="{{ $view->nama }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">NIK</label>
                                <input type="text" required="" name="nik" class="form-control" value="{{ $view->nik }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section mb10">
                                    <label for="" class="control-label">Isi Perizinan</label>
                                    <textarea class="gui-textarea" name="tentang">{{ $view->tentang }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Tanggal Perizinan</label>
                                <input type="text" required="" name="tgl_surat" placeholder="Tanggal/bulan/tahun" class="form-control" value="{{ $view->tgl_surat }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Keterangan Perizinan</label>
                                <input type="text" required="" class="form-control" value="{{ $view->keterangan }}" disabled>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-block btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ url('/public/v2/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.replace('ckeditor1', {
            height: 210,
            on: {
                instanceReady: function (evt) {
                    $('.cke').addClass('allcp-skin cke-hide-bottom');
                }
            }
        });
    </script>
    
@endsection

@section('css')
    <style>
        /* demo styles -summernote */
        .btn-toolbar > .btn-group.note-fontname {
            display: none;
        }

        /* demo styles - hides several ckeditor toolbar buttons */
        #cke_52,
        #cke_53 {
            display: none !important;
        }
    </style>
@endsection