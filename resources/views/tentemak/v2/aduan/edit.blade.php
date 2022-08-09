@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-stack-exchange"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Aduan</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    BALAS ADUAN
                </div>
                <div class="panel-body">
                    <form action="{{ url('/tentemak/updateaduan/'.$view->id_adu.'') }}" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <b>Aduan :</b> {{ $view->isi_aduan }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section mb10">
                                    <label for="" class="control-label">Isi Jawaban</label>
                                    <textarea class="gui-textarea" name="jawaban"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$view->nama_pengadu}}" name="nama_pengadu">
                        <input type="hidden" value="{{$view->email}}" name="email">
                        <input type="hidden" value="{{$view->alamat}}" name="alamat">
                        <input type="hidden" value="{{$view->no_hp}}" name="no_hp">
                        <input type="hidden" value="{{$view->aduan}}" name="aduan">
                        <input type="hidden" value="{{$view->isi_aduan}}" name="isi_aduan">
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