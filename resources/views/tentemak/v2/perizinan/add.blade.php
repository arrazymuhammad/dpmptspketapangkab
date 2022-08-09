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
                    TAMBAH PERIZINAN
                </div>
                <div class="panel-body">
                    <form action="{{ url('/tentemak/inputperizinan') }}" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nomor Perizinan</label>
                                <input type="text" required="" name="nomer" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" required="" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">NIK</label>
                                <input type="text" required="" name="nik" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section mb10">
                                    <label for="" class="control-label">Isi Perizinan</label>
                                    <textarea class="gui-textarea" name="tentang"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Tanggal Perizinan</label>
                                <input type="text" required="" name="tgl_surat" placeholder="Tanggal/bulan/tahun" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Keterangan Perizinan</label>
                                <select name="keterangan" class="form-control">
                                    <option value="SIUP"> SIUP</option>
                                    <option value="SITU"> SITU</option>
                                    <option value="Gangguan"> Gangguan</option>
                                    <option value="IMB"> IMB</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" required name="status_kelengkapan" value="0">
                        <input type="hidden" required name="status_verifikasi" value="0">
                        <input type="hidden" required name="status_pembayaran" value="0">
                        <input type="hidden" required name="pengirim" value="AdminData">
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