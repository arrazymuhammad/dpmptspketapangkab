<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="{{url('public/anjungan/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style type="text/css">
    table{
      margin-top: 80px;
      margin-left: -70px;
      background: rgba(255,255,255,0.3);
      z-index: 100;
      position:absolute;
      border: 1;
    }
    hr {
      color: black;
    }

    td {
      padding: 15px;
    }

    .container {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
      -webkit-box-align: center;
          -ms-flex-align: center;
              align-items: center;
      height: 22vh;
    }

    .radio-tile-group {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
          flex-wrap: wrap;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
    }
    .radio-tile-group .input-container {
      position: relative;
      height: 7rem;
      width: 7rem;
      margin: 0.5rem;
    }
    .radio-tile-group .input-container .radio-button {
      opacity: 0;
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      margin: 0;
      cursor: pointer;
    }
    .radio-tile-group .input-container .radio-tile {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      -webkit-box-align: center;
          -ms-flex-align: center;
              align-items: center;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
      width: 100%;
      height: 100%;
      border: 2px solid #079ad9;
      border-radius: 5px;
      padding: 1rem;
      -webkit-transition: -webkit-transform 300ms ease;
      transition: -webkit-transform 300ms ease;
      transition: transform 300ms ease;
      transition: transform 300ms ease, -webkit-transform 300ms ease;
    }
    .radio-tile-group .input-container .icon svg {
      fill: #079ad9;
      width: 3rem;
      height: 3rem;
    }
    .radio-tile-group .input-container .radio-tile-label {
      text-align: center;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #079ad9;
    }
    .radio-tile-group .input-container .radio-button:checked + .radio-tile {
      background-color: #079ad9;
      border: 2px solid #079ad9;
      color: white;
      -webkit-transform: scale(1.1, 1.1);
              transform: scale(1.1, 1.1);
    }
    .radio-tile-group .input-container .radio-button:checked + .radio-tile .icon svg {
      fill: white;
      background-color: #079ad9;
    }
    .radio-tile-group .input-container .radio-button:checked + .radio-tile .radio-tile-label {
      color: white;
      background-color: #079ad9;
    }

    a {
      text-decoration: none;
    }

    .foo {
      width: 980px;
      height: 512px;
      overflow-y: hidden;
    }
  </style>
</head>

<body>
  <div class="wrap">
    
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <table width="100%">
          <tr>
            <td width="45%"></td>
            <td width="10%">
              <div class="container">
                  <div class="radio-tile-group">
                  
                    <a href="{{url('/simulasi')}}">
                      <div class="input-container">
                        <input id="fly" class="radio-button" type="radio" name="radio" checked="checked" />
                        <div class="radio-tile">
                          <div class="icon fly-icon">
                            <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.18 9"/>
                              <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                              <path d="M0 0h24v24H0z" fill="none"/>
                            </svg>
                          </div>
                          <label for="fly" class="radio-tile-label">Simulasi</label>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>
            </td>
            <td width="45%"></td>
          </tr>
          {{-- <tr>
            <td colspan="3">
                <div class="text-center">
                    <h4>Simulasi Izin Gangguan</h4>
                </div>
                <form action="#" method="GET">
                  {!!csrf_field()!!}
                  <input type="hidden" name="jenis" value="1">
                  <div class="row"> 
                      <div class="col-md-3">
                          <label class="control-label">Tarif Lingkungan</label>
                          <select class="form-control" name="tl">
                              @foreach($tl as $tl)
                                  <option value="{{$tl->id_trf_kawasan}}">{{AppHelper::nama_kawasan($tl->kawasan)}} -> {{$tl->jns_kawasan}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label class="control-label">Indeks Lokasi</label>
                          <select class="form-control" name="il">
                              @foreach($il as $il)
                                  <option value="{{$il->id_index_lokasi}}">{{$il->nm_lokasi}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label class="control-label">Indeks Gangguan</label>
                          <select class="form-control" name="ig">
                              @foreach ($ig as $ig)
                                  <option value="{{$ig->id_indek_gangguan}}">{{$ig->nm_gangguan}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label class="control-label">NFLRTU</label>
                          <select class="form-control" name="nflrtu">
                              @foreach($nf as $nf)
                                  <option value="{{$nf->id_nflrtu_tarif}}">
                                      {{AppHelper::nflrtu($nf->luas)}} - {{$nf->n_faktor}} Lantai
                                  </option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                        <input type="submit" name="ho" class="btn btn-primary btn-block" value="Hitung">
                      </div>
                      
                  </div>
                </form>
                <br>
                <div class="row">
                  <div class="col-md-12 text-center">
                      <b>
                          <h3>{{AppHelper::rupiah($hitung)}}</h3>
                      </b>
                  </div>
                </div>
            </td>
          </tr> --}}
          <tr>
            <td colspan="3">
                <div class="text-center">
                    <h4>Simulasi IMB</h4>
                </div>
                <form action="#" method="GET">
                  {!!csrf_field()!!}
                  <input type="hidden" name="jenis" value="2">
                  <div class="row"> 
                      <div class="col-md-6">
                          <label class="control-label">Luas Bangunan</label>
                          <input type="text" class="form-control" name="luas">
                      </div>
                      <div class="col-md-3">
                          <label class="control-label">Jumlah Lantai</label>
                          <select class="form-control" name="lantai">
                              <option value="1">1 Lantai</option>
                              <option value="2">2 Lantai</option>
                              <option value="3">3 Lantai</option>
                              <option value="4">4 Lantai</option>
                              <option value="5">5 Lantai</option>
                              <option value="6">6 Lantai</option>
                              <option value="7">7 Lantai</option>
                          </select>
                      </div>
                      <div class="col-md-3">
                          <label class="control-label">Basement</label>
                          <select class="form-control" name="basement">
                              <option value="0">Tidak</option>
                              <option value="1">Ya</option>
                          </select>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                        <label class="control-label">Jenis Bangunan</label>
                        <select class="form-control" name="jenis_bangunan">
                          @foreach($td as $td)
                            <option value="{{$td->id_tarifdasar}}">{{$td->bangunan}}</option>
                          @endforeach
                        </select>
                        
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Koefisien Guna Bangunan</label>
                        <select class="form-control" name="guna">
                            @foreach($kg as $kg)
                                <option value="{{$kg->id_koefisien_guna}}">{{$kg->guna_bangunan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Koefisien Letak Bangunan</label>
                        <select class="form-control" name="letak">
                            @foreach($lb as $lb)
                                <option value="{{$lb->id_koefisien_letak}}">{{$lb->letak_bangunan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Koefisien Kondisi Bangunan</label>
                        <select class="form-control" name="kondisi">
                            @foreach($kk as $kk)
                                <option value="{{$kk->id_koefisien_kondisi}}">{{$kk->kondisi_bangunan}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                          <label class="control-label">Jenis IMB</label>
                          <select class="form-control" name="jenis_imb">
                              <option value="1">Baru</option>
                              <option value="2">Perubahan Luas</option>
                              <option value="3">Perubahan Fungsi</option>
                              <option value="4">Balik Nama</option>
                              <option value="5">Pemecahan</option>
                              <option value="6">Pemecahan + Balik Nama</option>
                          </select>
                      </div>
                      
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                          <input type="submit" name="imb" class="btn btn-primary btn-block" value="Hitung">
                      </div>
                      
                  </div>
                </form>  
                <br>
                <div class="row">
                  <div class="col-md-12 text-center">
                      <b>
                          <h3>{{AppHelper::rupiah($hitung_imb2)}}</h3>
                      </b>
                     
                  </div>
                </div>
            </td>
          </tr>
          <tr>
            <td>
              <hr>
            </td>
          </tr>
          
        </table>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="bg_area">
      <div class="bg01 clearfix"></div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src="{{url('public/anjungan/js/index.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
