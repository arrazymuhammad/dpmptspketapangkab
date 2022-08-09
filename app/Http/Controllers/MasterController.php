<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Berita;
use App\Galeri;
use App\Slider;
use App\Halaman;
use App\Download;
use App\Pengaduan;
use App\Perizinan;
use App\Http\Requests;
use App\MasterPerizinan;
use Weboap\Visitor\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MasterController extends Controller
{
    public function index()
    {
        $count = 20;

        $aduan = new Pengaduan;
        $visitor = Visitor::count();
        $aduan = $aduan->whereNull('jawaban')->count();
        $agenda = \App\Agenda::orderBy('id', 'DESC')->take(6)->get();
        $berita = \App\Berita::orderBy('id_berita', 'DESC')->take(3)->get();
        $slider = \App\Slider::all();

        return view('master.index', compact(['agenda', 'berita', 'count', 'visitor', 'aduan', 'slider']));
    }

    public function pendahuluan()
    {
        return view('master.pendahuluan');
    }

    public function profil()
    {
        return view('master.profil');
    }

    public function vismis()
    {
        return view('master.vismis');
    }

    public function struktur()
    {
        return view('master.struktur');
    }
    public function infoizin()
    {
        error_reporting(0);
        return view('master.infoizin');
    }

    public function postinfoizin(Request $request)
    {
        error_reporting(0);
        $nik = Input::get('nik');
        $jenis = Input::get('jenis');
        $web = "mikrotik.idekite.id";
        $key = "WWxkc2NtTnRPVEJoVjNOMVlWZFNiR0V5YkRCYVV6VndXa0U5UFE9PQ==";

        if ($jenis == 1) { // SIUP
            $siupurl = 'http://mikrotik.idekite.id:500/kpt_v2/api/pencarian/siup/' . $web . '/' . $key . '/' . $nik;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $siupurl);
            $result = curl_exec($ch);
            curl_close($ch);

            $datasiup = json_decode($result, true);
        } elseif ($jenis == 2) { // HO
            $hourl = 'http://mikrotik.idekite.id:500/kpt_v2/api/pencarian/gangguan/' . $web . '/' . $key . '/' . $nik;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $hourl);
            $result = curl_exec($ch);
            curl_close($ch);

            $dataho = json_decode($result, true);
        } elseif ($jenis == 3) { // IMB
            $hoimb = 'http://mikrotik.idekite.id:500/kpt_v2/api/pencarian/imb/' . $web . '/' . $key . '/' . $nik;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $hoimb);
            $result = curl_exec($ch);
            curl_close($ch);

            $dataimb = json_decode($result, true);
        }

        return view('master.infoizin', compact('datasiup', 'dataho', 'dataimb'));
    }

    public function imb()
    {
        return view('master.imb');
    }

    public function reklame()
    {
        return view('master.reklame');
    }

    public function izingangguan()
    {
        return view('master.izingangguan');
    }

    public function situsiup()
    {
        return view('master.situsiup');
    }

    public function izinkes()
    {
        return view('master.izinkes');
    }

    public function pengaduan()
    {
        return view('master.pengaduan');
    }

    public function berita()
    {
        // $berita = \App\Berita::orderBy('id_berita','DESC')->take(4)->get();
        $berita = DB::table('berita')->orderBy('id_berita', 'DESC')->paginate(3);

        // $berita = \App\Berita::orderBy('id_berita','DESC')->take(3)->get();

        return view('master.berita', compact(['berita']));
    }

    public function detailberita($id)
    {
        $berita = \App\Berita::orderBy('id_berita', 'DESC')->take(6)->get();
        // $berita = \App\Berita::all()->orderBy('id_berita','DESC');;
        $view = \App\Berita::find($id);
        return view('master.detailberita', compact(['berita', 'view']));
    }

    public function galeri()
    {
        // $galeri = \App\Galeri::orderBy('id','DESC')->take(12)->get();
        $galeri = DB::table('galeri')->orderBy('id', 'DESC')->paginate(12);
        return view('master.galeri', compact(['galeri']));
    }

    public function kontak()
    {
        return view('master.kontak');
    }

    public function inputberita()
    {
        return view('master.inputberita');
    }

    public function postpengaduan()
    {

        $simpan = Request::all();
        \App\Pengaduan::create($simpan);
        return Redirect::back();
    }

    public function ambilagenda($id)
    {
        $users = DB::table('agenda')->get();
        return view('coba', compact(['users']));
    }

    public function coba($id)
    {
        $users = \App\Agenda::find($id);
        return view('coba', compact(['users']));

        //qeuery all
        //$users = DB::table('agenda')->get();
        //return view('coba', compact(['users']));
        // -> view 
        // <!-- @foreach($users as $var)
        //     {{$var->judul}}
        // @endforeach -->

        //qeury select
        // $users = DB::table('agenda')->find($id);
        // return view('coba', compact(['users']));

        //
        // $users = DB::table('agenda')->orderBy('id', 'ASC')->take(4);
        // return view('coba', compact(['users']));
    }

    public function detailhalaman($id)
    {
        $view = \App\Halaman::find($id);
        return view('master.detailhalaman', compact(['view']));
    }

    public function detailizin($id)
    {
        $view = \App\MasterPerizinan::find($id);
        $file = \App\Download::where('master_id', $id)->get();
        return view('master.detailizin', compact(['view', 'file']));
    }
}
