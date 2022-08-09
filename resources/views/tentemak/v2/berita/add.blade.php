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
                    TAMBAH BERITA
                </div>
                <div class="panel-body">
                    <form action="{{ url('/tentemak/inputberita') }}" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="section mb10">
                                    <label for="" class="control-label">Judul Berita</label>
                                    <input type="text" name="judul" class="form-control" required autocomplete="off">
                                </div>
                                <div class="section mb10">
                                    <label for="" class="control-label">Isi Berita</label>
                                    <textarea name="deskripsi" id="ckeditor1" rows="12" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section mb10">
                                    <div class="fileupload-preview thumbnail mb20">
                                        <label for="" class="control-label">Gambar</label>
                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Choose File</span>
                                            <input type="file" class="gui-file" name="gambar" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                            <input type="text" class="gui-input" id="uploader1" placeholder="Select File">
                                            <label class="field-icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </label>
                                        </label>
                                        {{-- <input type="file" name="gambar" class="form-control" required autocomplete="off"> --}}
                                    </div>
                                </div>
                                <div class="section mb10">
                                    <label for="" class="control-label">Tags Berita</label>
                                    <input type="text" name="tags" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        &nbsp;
                        <div class="col-md-12">
                            <button class="btn btn-block btn-primary">Simpan</button>
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