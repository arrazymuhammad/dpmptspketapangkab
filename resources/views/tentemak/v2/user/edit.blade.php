@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-user"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">User</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    UBAH USER
                </div>
                <div class="panel-body">
                    <form action="{{ url('/tentemak/updateuser/'.$view->id.'') }}" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nama User</label>
                                <input type="text" required="" name="name" class="form-control" value="{{ $view->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">E-Mail User</label>
                                <input type="email" required="" name="email" class="form-control" value="{{ $view->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Password User</label>
                                <input type="password"  name="password" class="form-control">
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