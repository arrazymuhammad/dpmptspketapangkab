@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-picture-o"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Slider</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    TAMBAH SLIDER
                </div>
                <div class="panel-body">
                    <form action="#" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section mb10">
                                    <div class="fileupload-preview thumbnail mb20">
                                        <label for="" class="control-label">Slide</label>
                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Choose File</span>
                                            <input type="file" class="gui-file" name="slide" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                            <input type="text" class="gui-input" id="uploader1" placeholder="Select File">
                                            <label class="field-icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </label>
                                        </label>
                                    </div>
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
   
@endsection

@section('css')

@endsection