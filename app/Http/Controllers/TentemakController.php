<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeri;
use App\Berita;
use App\Agenda;
use App\Perizinan;
use App\Pengaduan;
use App\User;
use Visitor;
use Auth;
use Request;
use Redirect;
// use App\file;
use File;

class TentemakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $izin = 120;

        $aduan = new Pengaduan;
        $berita = new Berita;
        $galeri = new Galeri;
        $genda = new Agenda;

        $aduan = $aduan->whereNull('jawaban')->count();
        $berita = $berita->count();
        $galeri = $galeri->count();
        $genda = $genda->count();
        $visitor = Visitor::count();
        $agenda = \App\Agenda::orderBy('id', 'DESC')->take(5)->get();
        return view('tentemak.v2.index', compact(['agenda', 'visitor', 'izin', 'aduan', 'berita', 'galeri', 'genda']));
    }

    public function login()
    {
        return view('tentemak.login');
    }

    public function keluar()
    {
        Auth::logout();
        return Redirect::to('login');
    }

    //perizinan

    public function inputperizinan()
    {
        $izin = \App\Perizinan::orderBy('id_izin', 'DESC')->get();
        return view('tentemak.v2.perizinan.index', compact(['izin']));
    }

    public function tambahperizinan()
    {
        return view('tentemak.v2.perizinan.add');
    }

    public function tambahperizinanbulk()
    {
        return view('tentemak.v2.perizinan.bulk');
    }

    public function inputperizinankeluar()
    {
        $izin = \App\Perizinan::orderBy('id_izin', 'DESC')->get();
        return view('tentemak.v2.perizinan.index', compact(['izin']));
    }

    public function postperizinan(Request $request)
    {
        $save = Request::all();
        \App\Perizinan::create($save);
        return redirect('/tentemak/inputperizinan');
    }

    public function postperizinankeluar(Request $request)
    {
        $perizinan = \App\Perizinan::find($id);
        $izinnya->izinnya = Input::get('izinnya');
        $keterangan->keterangan = Input::get('keterangan');
        $izinnya = json_decode($izinnya, true);


        if ($keterangan == "SIUP") {

            $perizinan =  \App\Perizinan::where('keterangan', $keterangan)->delete();

            foreach ($izinnya as $key => $var) {
                $nomer              = $var['nomor_sk'];
                $tgl_surat          = $var['tgl_sk'];
                $tentang            = $var['jenis_usaha'];
                $nama               = $var['nama_pemohon'];
                $nik                = $var['no_ident'];
                $status_kelengkapan = $var['status_kelengkapan'];
                $status_verifikasi  = $var['status_verifikasi'];
                $keterangan         = "SIUP";
                $pengirim           = "AdminData";

                $perizinan = new Perizinan;

                $perizinan->nomer = $nomer;
                $perizinan->tgl_surat = $tgl_surat;
                $perizinan->tentang = $tentang;
                $perizinan->nama = $nama;
                $perizinan->nik = $nik;
                $perizinan->status_kelengkapan = $status_kelengkapan;
                $perizinan->status_verifikasi = $status_verifikasi;
                $perizinan->keterangan = $keterangan;
                $perizinan->pengirim = $pengirim;
            }
        } else if ($keterangan == "SITU") {
            \App\Perizinan::find($keterangan)->delete();

            $perizinan =  \App\Perizinan::where('keterangan', $keterangan)->delete();

            foreach ($izinnya as $key => $var) {
                $nomer              = $var['nomor_sk'];
                $tgl_surat          = $var['tgl_sk'];
                $tentang            = $var['jenis_usaha'];
                $nama               = $var['nama_pemohon'];
                $nik                = $var['no_ident'];
                $status_kelengkapan = $var['status_kelengkapan'];
                $status_verifikasi  = $var['status_verifikasi'];
                $keterangan         = "SITU";
                $pengirim           = "AdminData";

                $perizinan = new Perizinan;

                $perizinan->nomer = $nomer;
                $perizinan->tgl_surat = $tgl_surat;
                $perizinan->tentang = $tentang;
                $perizinan->nama = $nama;
                $perizinan->nik = $nik;
                $perizinan->status_kelengkapan = $status_kelengkapan;
                $perizinan->status_verifikasi = $status_verifikasi;
                $perizinan->keterangan = $keterangan;
                $perizinan->pengirim = $pengirim;
            }
        } else if ($keterangan == "Gangguan") {
            \App\Perizinan::find($keterangan)->delete();

            $perizinan =  \App\Perizinan::where('keterangan', $keterangan)->delete();

            foreach ($izinnya as $key => $var) {
                $nomer              = $var['nomor_sk'];
                $tgl_surat          = $var['tgl_sk'];
                $tentang            = $var['jenis_usaha'];
                $nama               = $var['nama_pemohon'];
                $nik                = $var['no_ident'];
                $status_kelengkapan = $var['status_kelengkapan'];
                $status_verifikasi  = $var['status_verifikasi'];
                $keterangan         = "Gangguan";
                $pengirim           = "AdminData";

                $perizinan = new Perizinan;

                $perizinan->nomer = $nomer;
                $perizinan->tgl_surat = $tgl_surat;
                $perizinan->tentang = $tentang;
                $perizinan->nama = $nama;
                $perizinan->nik = $nik;
                $perizinan->status_kelengkapan = $status_kelengkapan;
                $perizinan->status_verifikasi = $status_verifikasi;
                $perizinan->keterangan = $keterangan;
                $perizinan->pengirim = $pengirim;
            }
        } else if ($keterangan == "IMB") {
            \App\Perizinan::find($keterangan)->delete();

            $perizinan =  \App\Perizinan::where('keterangan', $keterangan)->delete();

            foreach ($izinnya as $key => $var) {
                $nomer              = $var['nomor_sk'];
                $tgl_surat          = $var['tgl_sk'];
                $tentang            = $var['jenis_usaha'];
                $nama               = $var['nama_pemohon'];
                $nik                = $var['no_ident'];
                $status_kelengkapan = $var['status_kelengkapan'];
                $status_verifikasi  = $var['status_verifikasi'];
                $keterangan         = "IMB";
                $pengirim           = "AdminData";

                $perizinan = new Perizinan;

                $perizinan->nomer = $nomer;
                $perizinan->tgl_surat = $tgl_surat;
                $perizinan->tentang = $tentang;
                $perizinan->nama = $nama;
                $perizinan->nik = $nik;
                $perizinan->status_kelengkapan = $status_kelengkapan;
                $perizinan->status_verifikasi = $status_verifikasi;
                $perizinan->keterangan = $keterangan;
                $perizinan->pengirim = $pengirim;
            }
        }


        return Redirect::back();
    }
    public function deleteperizinan(Request $request, $id)
    {
        \App\Perizinan::find($id)->delete();
        return redirect('/tentemak/inputperizinan');
    }

    public function editperizinan(Request $request, $id)
    {
        $izin = \App\Perizinan::orderBy('id_izin', 'DESC')->get();
        $view = \App\Perizinan::find($id);
        return view('tentemak.v2.perizinan.edit', compact(['izin', 'view']));
    }

    public function updateperizinan(Request $request, $id)
    {
        $update = Request::all();
        $view = \App\Perizinan::find($id);
        $view->update($update);

        return redirect('/tentemak/inputperizinan');
    }
    public function viewperizinan(Request $request, $id)
    {
        $view = \App\Perizinan::orderBy('id_izin', 'DESC')->get();
        return view('tentemak.viewperizinan', compact(['view']));
    }

    //berita
    public function inputberita()
    {
        $berita = \App\Berita::orderBy('id_berita', 'DESC')->get();
        return view('tentemak.v2.berita.index', compact(['berita']));
    }

    public function tambahberita()
    {
        return view('tentemak.v2.berita.add');
    }

    public function editberita(Request $request, $id)
    {
        $berita = \App\Berita::orderBy('id_berita', 'DESC')->get();
        $view = \App\Berita::find($id);
        return view('tentemak.v2.berita.edit', compact(['berita', 'view']));
    }

    public function viewberita(Request $request, $id)
    {
        $berita = \App\Berita::orderBy('id_berita', 'DESC')->get();
        $view = \App\Berita::find($id);
        return view('tentemak.viewberita', compact(['berita', 'view']));
    }

    public function postberita(Request $request)
    {
        $berita = new Berita;

        $berita->judul = Input::get('judul');
        $berita->deskripsi = Input::get('deskripsi');
        $berita->tags = Input::get('tags');
        if (Input::hasFile('gambar')) {

            $file = Request::file('gambar');
            $path = "assets/berita/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . ".jpg";
            $file = $file->move($path, $fileName);

            $berita->gambar = $file;
        }

        $berita->save();

        return redirect('/tentemak/inputberita');
    }

    public function updateberita(Request $request, $id)
    {

        $berita = \App\Berita::find($id);
        $berita->judul = Input::get('judul');
        $berita->deskripsi = Input::get('deskripsi');
        $berita->tags = Input::get('tags');

        if (Input::hasFile('gambar')) {
            $filename = $berita->gambar;

            if (file_exists($filename)) {
                unlink($filename);
            }

            $file = Input::file('gambar');

            $path = "assets/berita/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));

            $fileName = $today . $random . ".jpg";
            $file = $file->move($path, $fileName);
            $berita->gambar = $file;
        }
        $berita->save();

        return redirect('/tentemak/inputberita');
    }

    public function deleteberita(Request $request, $id)
    {

        $berita = \App\Berita::where('id_berita', $id)->get();
        $filename =  \App\Berita::where('id_berita', $id)->value('gambar');
        if (file_exists($filename)) {
            unlink($filename);
        }
        \App\Berita::find($id)->delete();
        return redirect('/tentemak/inputberita');
    }

    //Aduan
    public function inputaduan()
    {
        $aduan = \App\Pengaduan::orderBy('id_adu', 'DESC')->get();
        return view('tentemak.v2.aduan.index', compact(['aduan']));
    }

    public function viewaduan(Request $request, $id)
    {
        $aduan = \App\Pengaduan::orderBy('id_adu', 'DESC')->get();
        $view = \App\Pengaduan::find($id);
        return view('tentemak.viewaduan', compact(['aduan', 'view']));
    }
    public function editaduan(Request $request, $id)
    {
        $aduan = \App\Pengaduan::orderBy('id_adu', 'DESC')->get();
        $view = \App\Pengaduan::find($id);
        return view('tentemak.v2.aduan.edit', compact(['aduan', 'view']));
    }

    public function updateaduan(Request $request, $id)
    {
        $update = Request::all();
        $view = \App\Pengaduan::find($id);
        $view->update($update);

        return redirect('/tentemak/inputaduan');
    }

    //agenda
    public function inputagenda()
    {
        $agenda = \App\Agenda::orderBy('id', 'DESC')->get();
        return view('tentemak.v2.agenda.index', compact(['agenda']));
    }

    public function tambahagenda()
    {
        return view('tentemak.v2.agenda.add');
    }

    public function postagenda(Request $request)
    {

        $save = Request::all();
        \App\Agenda::create($save);
        return redirect('/tentemak/inputagenda');
    }

    public function viewagenda(Request $request, $id)
    {
        $agenda = \App\Agenda::orderBy('id', 'DESC')->get();
        $view = \App\Agenda::find($id);
        return view('tentemak.viewagenda', compact(['agenda', 'view']));
    }

    public function deleteagenda(Request $request, $id)
    {
        \App\Agenda::find($id)->delete();
        return redirect('/tentemak/inputagenda');
    }

    public function editagenda(Request $request, $id)
    {
        $agenda = \App\Agenda::orderBy('id', 'DESC')->get();
        $view = \App\Agenda::find($id);
        return view('tentemak.v2.agenda.edit', compact(['agenda', 'view']));
    }

    public function updateagenda(Request $request, $id)
    {
        $agenda = \App\Agenda::find($id);
        $agenda->agenda = Input::get('agenda');
        $agenda->tanggal = Input::get('tanggal');
        $agenda->update();

        return redirect('/tentemak/inputagenda');
    }

    //galeri
    public function inputgaleri()
    {
        $galeri = \App\Galeri::orderBy('id', 'DESC')->take(8)->get();
        return view('tentemak.v2.galeri.index', compact(['galeri']));
    }

    public function tambahgaleri()
    {
        return view('tentemak.v2.galeri.add');
    }

    public function editgaleri(Request $request, $id)
    {
        $galeri = \App\Galeri::orderBy('id', 'DESC')->take(8)->get();
        $view = \App\Galeri::find($id);
        return view('tentemak.v2.galeri.edit', compact(['galeri', 'view']));
    }

    public function updategaleri(Request $request, $id)
    {

        $galeri = \App\Galeri::find($id);
        $galeri->deskripsi = Input::get('deskripsi');

        if (Input::hasFile('gambar')) {
            $filename = $galeri->gambar;

            if (file_exists($filename)) {
                unlink($filename);
            }

            $file = Input::file('gambar');

            $path = "assets/galeri/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));

            $fileName = $today . $random . ".jpg";
            $file = $file->move($path, $fileName);
            $galeri->gambar = $file;
        }
        $galeri->save();

        return redirect('/tentemak/inputgaleri');
    }

    public function deletegaleri(Request $request, $id)
    {

        $galeri = \App\Galeri::where('id', $id)->get();
        $filename =  \App\Galeri::where('id', $id)->value('gambar');
        if (file_exists($filename)) {
            unlink($filename);
        }
        \App\Galeri::find($id)->delete();
        return redirect('/tentemak/inputgaleri');
    }

    public function postgaleri(Request $request)
    {
        $galeri = new Galeri;

        $galeri->deskripsi = Input::get('deskripsi');

        if (Input::hasFile('gambar')) {

            $file = Request::file('gambar');
            $path = "assets/galeri/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . ".jpg";
            $file = $file->move($path, $fileName);

            $galeri->gambar = $file;
        }

        $galeri->save();

        return redirect('/tentemak/inputgaleri');
    }

    //user
    public function inputuser()
    {
        $user = \App\User::all();
        return view('tentemak.v2.user.index', compact(['user']));
    }

    public function tambahuser()
    {
        return view('tentemak.v2.user.add');
    }

    public function postuser(Request $request)
    {
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();
        return redirect('/tentemak/user');
    }

    public function viewuser(Request $request, $id)
    {
        $user = \App\User::all();
        $view = \App\User::find($id);
        return view('tentemak.viewuser', compact(['user', 'view']));
    }

    public function deleteuser(Request $request, $id)
    {
        \App\User::find($id)->delete();
        return redirect('/tentemak/inputuser');
    }

    public function edituser(Request $request, $id)
    {
        $user = \App\User::all();
        $view = \App\User::find($id);
        return view('tentemak.v2.user.edit', compact(['user', 'view']));
    }

    public function updateuser(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        return redirect('/tentemak/inputuser');
    }

    // pengaturan applikasi
    public function pengaturan()
    {
        $view = \App\Pengaturan::find(1);
        return view('tentemak.v2.pengaturan', compact('view'));
    }

    public function savePengaturan(Request $request)
    {
        $update = \App\Pengaturan::find(1);
        $data = Request::all();
        if (Input::hasFile('logo_apps')) {
            $file = Request::file('logo_apps');
            $path = "assets/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . ".png";
            $file = $file->move($path, $fileName);

            $data['logo_apps'] = '/' . $path . $fileName;
        }
        if (Input::hasFile('favicon')) {
            $file = Request::file('favicon');
            $path = "assets/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . ".png";
            $file = $file->move($path, $fileName);

            $data['favicon'] = '/' . $path . $fileName;
        }
        if (Input::get('simulasi') == '1') {
            $data['simulasi'] = '1';
        } else {
            $data['simulasi'] = '0';
        }

        $update->update($data);
        return redirect()->back();
    }

    public function halaman()
    {
        $page = \App\Halaman::get();
        return view('tentemak.v2.halaman.index', compact(['page']));
    }

    public function addHalaman()
    {
        return view('tentemak.v2.halaman.add');
    }

    public function saveHalaman(Request $request)
    {
        $data           = Request::all();
        \App\Halaman::create($data);
        return redirect('/tentemak/halaman');
    }

    public function editHalaman(Request $request, $id)
    {
        $view = \App\Halaman::find($id);
        return view('tentemak.v2.halaman.edit', compact('view'));
    }

    public function ubahHalaman(Request $request, $id)
    {
        $view = \App\Halaman::find($id);
        $data           = Request::all();
        $view->update($data);
        return redirect('/tentemak/halaman');
    }

    public function delHalaman(Request $request, $id)
    {
        $view = \App\Halaman::find($id);
        $view->delete();
        return redirect('/tentemak/halaman');
    }

    public function masterPerizinan()
    {
        $view = \App\MasterPerizinan::all();
        return view('tentemak.v2.masterperizinan.index', compact('view'));
    }

    public function addMasterPerizinan()
    {
        return view('tentemak.v2.masterperizinan.add');
    }

    public function saveMasterPerizinan(Request $request)
    {
        $data           = Request::all();
        \App\MasterPerizinan::create($data);
        return redirect('/tentemak/master-perizinan');
    }

    public function editMasterPerizinan(Request $request, $id)
    {
        $view = \App\MasterPerizinan::find($id);
        return view('tentemak.v2.masterperizinan.edit', compact('view'));
    }

    public function ubahMasterPerizinan(Request $request, $id)
    {
        $view = \App\MasterPerizinan::find($id);
        $data           = Request::all();
        $view->update($data);
        return redirect('/tentemak/master-perizinan');
    }

    public function addLinkMasterPerizinan(Request $request, $id)
    {
        $view = \App\MasterPerizinan::find($id);
        $file = \App\Download::where('master_id', $id)->get();
        return view('tentemak.v2.masterperizinan.add-link', compact(['view', 'file']));
    }

    public function LinkMasterPerizinan(Request $request, $id)
    {
        $view = \App\MasterPerizinan::find($id);
        return view('tentemak.v2.masterperizinan.link', compact('view'));
    }

    public function saveLinkMasterPerizinan(Request $request, $id)
    {
        $data               = Request::all();
        $data['master_id']  = $id;
        if (Input::hasFile('filenya')) {
            $file = Request::file('filenya');
            $path = "assets/file/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . '.' . $file->getClientOriginalExtension();
            $file = $file->move($path, $fileName);

            $data['filenya'] = '/' . $path . $fileName;
        }
        \App\Download::create($data);
        return redirect('/tentemak/master-perizinan/add/' . $id . '');
    }

    public function DelLinkMasterPerizinan(Request $request, $izin_id, $file_id)
    {
        $data = \App\Download::where('master_id', $izin_id)
            ->where('id', $file_id)
            ->first();

        if ($data != NULL) {
            $data->delete();
            return redirect()->back();
        } else {

            return redirect()->back();
        }
    }

    public function delMasterPerizinan(Request $request, $id)
    {
        \App\Download::where('master_id', $id)->delete();
        \App\MasterPerizinan::find($id)->delete();

        return redirect()->back();
    }

    public function link()
    {
        $link = \App\Link::all();
        return view('tentemak.v2.link.index', compact(['link']));
    }

    public function addLink()
    {
        return view('tentemak.v2.link.add');
    }

    public function saveLink(Request $request)
    {
        $data           = Request::all();
        \App\Link::create($data);
        return redirect('/tentemak/link');
    }

    public function editLink($id)
    {
        $view = \App\Link::find($id);
        return view('tentemak.v2.link.edit', compact('view'));
    }

    public function ubahLink(Request $request, $id)
    {
        $view = \App\Link::find($id);
        $data           = Request::all();
        $view->update($data);
        return redirect('/tentemak/link');
    }

    public function delLink(Request $request, $id)
    {
        $view = \App\Link::find($id)->delete();
        return redirect()->back();
    }

    public function slider()
    {
        $slider = \App\Slider::all();
        return view('tentemak.v2.slider.index', compact(['slider']));
    }

    public function addSlider()
    {
        return view('tentemak.v2.slider.add');
    }

    public function saveSlider(Request $request)
    {
        if (Input::hasFile('slide')) {
            $file = Request::file('slide');
            $path = "assets/slide/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . '.jpg';
            $file = $file->move($path, $fileName);

            $data['slide'] = '/' . $path . $fileName;

            \App\Slider::create($data);
        }

        return redirect('/tentemak/slider');
    }

    public function editSlider($id)
    {
        $view = \App\Slider::find($id);
        return view('tentemak.v2.slider.edit', compact('view'));
    }

    public function ubahSlider(Request $request, $id)
    {
        $view = \App\Slider::find($id);
        if (Input::hasFile('slide')) {
            $file = Request::file('slide');
            $path = "assets/slide/";
            $today = md5(date('d/m/Y'));
            $random = md5(rand(0, 99999));
            $fileName = $today . $random . '.jpg';
            $file = $file->move($path, $fileName);

            $data['slide'] = '/' . $path . $fileName;

            $view->update($data);
        }

        return redirect('/tentemak/slider');
    }

    public function delSlider(Request $request, $id)
    {
        $view = \App\Slider::find($id)->delete();
        return redirect()->back();
    }
}
