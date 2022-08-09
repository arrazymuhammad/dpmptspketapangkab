@extends('layouts.v2')

@section('konten')
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="#">
                        <span class="fa fa-gear"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="{{ url('/tentemak') }}">Pengaturan</a>
                </li>
            </ol>
        </div>
    </header>
    <section id="content" class="table-layout animated fadeIn">
        <div class="allcp-form theme-primary" >
            <div class="panel">
                <div class="panel-heading">
                    UBAH PENGATURAN
                </div>
                <div class="panel-body">
                    <form action="#" enctype="multipart/form-data"  method="POST">
                        {!!csrf_field()!!}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Nama Aplikasi</label>
                                <input type="text" required="" name="nama_apps" class="form-control" value="{{ $view->nama_apps }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Versi Aplikasi</label>
                                <input type="text" required="" name="versi" class="form-control" value="{{ $view->versi }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section mb10">
                                    <div class="fileupload-preview thumbnail mb20">
                                        <label for="" class="control-label">Logo Apps</label>
                                        <img src="{{ $view->logo_apps }}" alt="" style="width: auto; height: 100px; margin-bottom: 10px">
                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Choose File</span>
                                            <input type="file" class="gui-file" name="logo_apps" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                            <input type="text" class="gui-input" id="uploader1" placeholder="Select File">
                                            <label class="field-icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section mb10">
                                    <div class="fileupload-preview thumbnail mb20">
                                        <label for="" class="control-label">Favicon Apps</label>
                                        <img src="{{ $view->favicon }}" alt="" style="width: auto; height: 100px; margin-bottom: 10px">
                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Choose File</span>
                                            <input type="file" class="gui-file" name="favicon" id="file2" onchange="document.getElementById('uploader2').value = this.value;">
                                            <input type="text" class="gui-input" id="uploader2" placeholder="Select File">
                                            <label class="field-icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Alamat Kantor</label>
                                <input type="text" required="" name="alamat" class="form-control" value="{{ $view->alamat }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Telpon Kantor</label>
                                <input type="text" required="" name="telp" class="form-control" value="{{ $view->telp }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label">E-Mail Kantor</label>
                                <input type="text" required="" name="email" class="form-control" value="{{ $view->email }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Google Map Link</label>
                                <input type="text" required="" name="gmap" class="form-control" value="{{ $view->gmap }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="control-label">Simulasi</label>
                                <label class="block mt15 switch switch-primary">
                                    @if($view->simulasi == '0')
                                        <input type="checkbox" name="simulasi" id="t4" value="1" >
                                    @else
                                        <input type="checkbox" name="simulasi" id="t4" value="1" checked="">
                                    @endif
                                    <label for="t4" data-on="YES" data-off="NO"></label>
                                    <span>Aktifkan Simulasi</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                Sosial Media
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="control-label">Facebook</label>
                                                        <input type="text" required="" name="link_fb" class="form-control" value="{{ $view->link_fb }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="control-label">Twitter</label>
                                                        <input type="text" required="" name="link_twitter" class="form-control" value="{{ $view->link_twitter }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="control-label">Linkedin</label>
                                                        <input type="text" required="" name="link_linkedin" class="form-control" value="{{ $view->link_linkedin }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- * simulasi => on/off --}}
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