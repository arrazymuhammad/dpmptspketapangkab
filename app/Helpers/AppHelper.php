<?php
class AppHelper {
    // revisi dashboard teknisi imb
    public static function getsum_kelengkapan()
    {
        //refisi
        $data = \App\IMB::where('status_kelengkapan', 3)->count();
        //--------
        return $data;
    }
//------------------------------
    public static function getsum_imb($bln, $thn)
    {
        $thn = date('Y');
        $data = \App\IMB::where('thn_pengajuan',$thn)
            ->where('bln_pengajuan', $bln)
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }

    public static function ubah_meter($var)
    {
        $data = str_replace("M2", "m<sup>2</sup>", $var);
        return $data;
    }
    public static function situ_bln($bln, $thn)
    {
        $thn = date('Y');
        $data1 = \App\SITU::where('tgl_sk','LIKE','%'.$thn.'%')
            ->where('terhapus',0)
            ->where('status_situ','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $count1 = 0;
        foreach ($data1 as $value1) {
            $aDate = explode("/", $value1->tgl_sk);
            $bulan = $aDate[0];
            if($bulan == $bln){
                $count1+=1;
            }
        }
        $data2 = \App\SIUP::where('tgl_sk','LIKE','%'.$thn.'%')
            ->where('terhapus',0)
            ->where('status_siup','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $count2 = 0;
        foreach ($data2 as $value2) {
            $aDate = explode("/", $value2->tgl_sk);
            $bulan = $aDate[1];
            if($bulan == $bln){
                $count2+=1;
            }
        }
        $hasil = $count1 + $count2;
        return $hasil;
    }

    public static function imb_bln($bln, $thn)
    {
        // $bln ='06';
        $thn = date('Y');
        $data = \App\IMB::where('tgl_sk','LIKE','%'.$thn.'%')
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->get();
        $count = 0;
        foreach ($data as $value) {
            $aDate = explode("/", $value->tgl_sk);
            $bulan = $aDate[0];
            if($bulan == $bln){
                $count+=1;
            }
        }
        return $count;
    }

    public static function sts_imb($id)
    {
        $var = \App\SKRDIMB::where('nomor_sts',$id)->sum('nominal_total');
        return $var;
    }
    public static function hitung_gangguan_kadis_merah()
    {
        $thn = date('Y');
        $data = \App\Gangguan::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih > 8) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_gangguan_kadis_kuning()
    {
        $thn = date('Y');
        $data = \App\Gangguan::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih == 8) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_gangguan_kadis_hijau()
    {
        $thn = date('Y');
        $data = \App\Gangguan::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih < 8) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_imb_kadis_merah()
    {
        $thn = date('Y');
        $data = \App\IMB::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih > 14) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_imb_kadis_kuning()
    {
        $thn = date('Y');
        $data = \App\IMB::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih == 14) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_imb_kadis_hijau()
    {
        $thn = date('Y');
        $data = \App\IMB::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih < 14) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_siup_kadis_merah()
    {
        $thn = date('Y');
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_siup','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih > 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_siup_kadis_kuning()
    {
        $thn = date('Y');
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_siup','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih == 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_siup_kadis_hijau()
    {
        $thn = date('Y');
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_siup','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih < 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_situ_kadis_merah()
    {
        $thn = date('Y');
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_situ','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih > 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_situ_kadis_kuning()
    {
        $thn = date('Y');
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_situ','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih == 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    public static function hitung_situ_kadis_hijau()
    {
        $thn = date('Y');
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_situ','<>',5)
            ->where('sertifikat','<>','')
            ->get();
        $hitung = 0;
        foreach ($data as $key => $var) {
            $mulai = $var->tgl_mulai_timer;
            $selesai = $var->tgl_selesai_timer;
            $selisih =  Hitung::waktukerja($mulai, $selesai);
            if ($selisih < 3) {
                $hitung = $hitung + 1;
            }
        }
        return $hitung;
    }
    
    public static function hitung_gangguan()
    {
        $thn = date('Y');
        $data = \App\Gangguan::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho','<>',5)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_imb()
    {
        $thn = date('Y');
        $data = \App\IMB::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitungpemutihan($tahun)
    {
        $now = date('Y');
        $tahun = $tahun;
        $cek = $now - $tahun;
        return $cek;
    }
    public static function pemutihan($tahun)
    {
        $now = date('Y');
        $tahun = $tahun;
        $cek = $now - $tahun;
        if ($cek < 5 ) {
            $data = 0.05;
        }elseif ($cek < 10) {
            $data = 0.1;
        }elseif ($cek < 15) {
            $data = 0.25;
        }elseif ($cek < 20) {
            $data = 0.35;
        }else{
            $data = 0.5;
        }

        return $data;
    }

    public static function triwulan($var)
    {
        if ($var == 1) {
            $tri = "Pertama";
        }elseif ($var == 2) {
            $tri = "Kedua";
        }elseif ($var == 3) {
            $tri = "Ketiga";
        }elseif ($tri == 4) {
            $tri = "Keempat";
        }

        return $tri;
    }
    public static function filter_iumk($var)
    {
        $data = explode("/", $var);
        return $data[3];
    }
    public static function hitung_jumlah_imb_satu_tahunan($thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_imb',[0,2])
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_jumlah_imb_dua_tahunan($thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_imb',3)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_retribusi_imb_tahunan($thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_imb',[0,3])
            ->where('sertifikat','<>','')
            ->sum('nominal_total');
        return $data;
    }
    public static function hitung_retribusi_imb_bulanan($bln, $thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',NULL)
            ->whereBetween('status_imb',[0,5])
            ->where('sertifikat','!=',NULL)
            ->sum('nominal_total');
        return $data;
    }
    public static function hitung_jumlah_imb_baru($bln, $thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_selesai',$thn)
            ->where('bln_selesai',$bln)
            ->where('terhapus',NULL)
            ->where('status_imb','0')
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_jumlah_imb_perubahan($bln, $thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_selesai',$thn)
            ->where('bln_selesai',$bln)
            ->where('terhapus',NULL)
            ->whereBetween('status_imb',['1','2'])
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }

    public static function hitung_jumlah_imb_pemecahan($bln, $thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_selesai',$thn)
            ->where('bln_selesai',$bln)
            ->where('terhapus',NULL)
            ->whereBetween('status_imb',['4','5'])
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }

    public static function hitung_jumlah_imb_baliknama($bln, $thn)
    {
        $data = DB::table('skrd_imb')
            ->where('status_bayar',1)
            ->leftJoin('y_imb','skrd_imb.imb','=','y_imb.id_imb')
            ->where('thn_selesai',$thn)
            ->where('bln_selesai',$bln)
            ->where('terhapus',NULL)
            ->where('status_imb','3')
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_retribusi_gangguan_satu($bln, $thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[0,3])
            ->where('sertifikat','<>','')
            ->sum('nominal_total');

        return $data;
    }
    public static function hitung_retribusi_gangguan_dua($bln, $thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',0)
            ->where('status_ho',4)
            ->where('sertifikat','<>','')
            ->sum('nominal_total');

        return $data;
    }
    public static function hitung_jumlah_gangguan_dua($bln, $thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',0)
            ->where('status_ho',4)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_jumlah_gangguan_satu($bln, $thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[0,3])
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_retribusi_gangguan($bln, $thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[0,4])
            ->where('sertifikat','<>','')
            ->sum('nominal_total');
        return $data;
    }
    public static function hitung_retribusi_total_gangguan($thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[0,4])
            ->where('sertifikat','<>','')
            ->sum('nominal_total');
        return $data;
    }
    public static function hitung_total_jumlah_gangguan_dua($thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho',4)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_total_jumlah_gangguan_satu($thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[0,3])
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_gangguan_perubahan($thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_ho',[1,2])
            ->where('sertifikat','<>','')
            ->count();

        return $data;
    }
    public static function hitung_gangguan_perpanjangan($thn)
    {
        $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho',3)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_gangguan_baru($thn)
    {
         $data = DB::table('skrd_ho')
            ->where('status_bayar',1)
            ->leftJoin('x_izingangguan','skrd_ho.gangguan','=','x_izingangguan.id_gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->where('status_ho',0)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function total_siup($thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',0)
            ->whereBetween('status_siup',[0,4])
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_siup_besar($thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->whereBetween('status_siup',[0,4])
            ->where('sertifikat','!=',NULL)
            ->where('nomor_sk','like','%BESAR%')
            ->count();
        return $data;
    }

    public static function hitung_siup_menengah($thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->whereBetween('status_siup',[0,4])
            ->where('sertifikat','!=',NULL)
            ->where('nomor_sk','like','%MENENGAH%')
            ->count();
        return $data;
    }

    public static function hitung_siup_mikro($thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->whereBetween('status_siup',[0,4])
            ->where('sertifikat','!=',NULL)
            ->where('nomor_sk','like','%MIKRO%')
            ->count();
        return $data;
    }

    public static function hitung_siup_kecil($thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->whereBetween('status_siup',[0,4])
            ->where('sertifikat','!=',NULL)
            ->where('nomor_sk','like','%KECIL%')
            ->count();
        return $data;
    }

    public static function hitung_situ_daftarulang($thn)
    {
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->where('status_situ',4)
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_situ_baru($thn)
    {
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('terhapus',NULL)
            ->whereBetween('status_situ',[0,3])
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_siup_satu($bln, $thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',NULL)
            ->whereBetween('status_siup',[0,3])
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_siup_dua($bln, $thn)
    {
        $data = \App\SIUP::where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',NULL)
            ->where('status_siup',4)
            ->where('sertifikat','!=',NULL)
            ->count();
        return $data;
    }
    public static function hitung_situ_satu($bln, $thn)
    {
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',NULL)
            ->whereBetween('status_situ',[0,3])
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function hitung_situ_dua($bln, $thn)
    {
        $data = \App\SITU::where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('terhapus',NULL)
            ->where('status_situ',4)
            ->where('sertifikat','<>','')
            ->count();
        return $data;
    }
    public static function nominal_denda($jumlah, $var)
    {
        $data   = \App\IMB::find($var);
        $exp    = $data->tgl_selesai_timer;
        $exp    = strtotime($exp);
        $today  = date('m/d/Y');
        $today  = strtotime($today);;
        $hitung = $today-$exp;
        $hitung = $hitung/2592000;
        if ($hitung < 1) {
            $hitung = 0;
        } else
        {
            $hitung = round($hitung);
        }
        $hitung = $hitung * 0.05;
        $hitung = $hitung * $jumlah;
        return $hitung;
    }
    public static function hitung_denda($var)
    {
        $data   = \App\IMB::find($var);
        $exp    = $data->tgl_selesai_timer;
        $exp    = strtotime($exp);
        $today  = date('m/d/Y');
        $today  = strtotime($today);;
        $hitung = $today-$exp;
        $hitung = $hitung/2592000;
        if ($hitung < 1) {
            $hitung = 0;
        } else
        {
            $hitung = round($hitung);
        }
        return $hitung;
    }
    public static function biaya_lain($id)
    {
        $tarif  = \App\IMBTarif::find($id);
        return $tarif->tarif_bangunan;
    }
    public static function biaya_perumahan($id)
    {
        $data   = \App\BAPIMB::where('imb',$id)->first();
        $data   = $data->x_klasifikasibangunan;
        $tarif  = \App\IMBTarif::find($data);
        return $tarif->tarif_bangunan;
    }
    public static function volume_perumahan_4($id)
    {
        $data   = \App\BAPIMB::where('imb',$id)->first();
        $luas   = $data->luas_input_4;
        $jumlah = $data->jumlah_input_4;
        $volume = $luas * $jumlah;
        return $volume;
    }
    public static function volume_perumahan_3($id)
    {
        $data   = \App\BAPIMB::where('imb',$id)->first();
        $luas   = $data->luas_input_3;
        $jumlah = $data->jumlah_input_3;
        $volume = $luas * $jumlah;
        return $volume;
    }
    public static function volume_perumahan_2($id)
    {
        $data   = \App\BAPIMB::where('imb',$id)->first();
        $luas   = $data->luas_input_2;
        $jumlah = $data->jumlah_input_2;
        $volume = $luas * $jumlah;
        return $volume;
    }
    public static function volume_perumahan_1($id)
    {
        $data   = \App\BAPIMB::where('imb',$id)->first();
        $luas   = $data->luas_input_1;
        $jumlah = $data->jumlah_input_1;
        $volume = $luas * $jumlah;
        return $volume;
    }
    public static function tahunOrTanggal($var)
    {
        $data = strlen($var);
        if ($data == 4) {
            echo "TAHUN ";
        }elseif ($data > 4) {
            echo "TANGGAL ";
        }
    }
    public static function status_siup($var)
    {
        $data = \App\SIUP::find($var);
        if ($data->status_kelengkapan == 0) {
            echo "Pengecekan kelengkapan berkas";
        }elseif ($data->status_kelengkapan == 1) {
            if ($data->status_verifikasi == 0) {
                echo "Proses Verifikasi";
            }elseif ($data->status_verifikasi == 1) {
                echo "Proses Verifikasi";
            }elseif ($data->status_verifikasi == 2) {
                echo "Proses Penandatanganan";
            }elseif ($data->status_verifikasi == 3) {
                echo "Proses Perbaikan Berkas";
            }elseif ($data->status_verifikasi == 4) {
                echo "Izin Diterbitkan";
            }
        } else {
            echo "Berkas tidak Lengkap";
        }
    }

    public static function status_situ($var)
    {
        $data = \App\SITU::find($var);
        if ($data->status_kelengkapan == 0) {
            echo "Pengecekan kelengkapan berkas";
        }elseif ($data->status_kelengkapan == 1) {
            if ($data->status_verifikasi == 0) {
                echo "Proses Verifikasi";
            }elseif ($data->status_verifikasi == 1) {
                echo "Proses Verifikasi";
            }elseif ($data->status_verifikasi == 2) {
                echo "Proses Penandatanganan";
            }elseif ($data->status_verifikasi == 3) {
                echo "Proses Perbaikan Berkas";
            }elseif ($data->status_verifikasi == 4) {
                echo "Izin Diterbitkan";
            }
        } else {
            echo "Berkas tidak Lengkap";
        }
    }

    public static function status_gangguan($var)
    {
        $data = \App\Gangguan::find($var);
        if ($data->status_kelengkapan == 0) {
            echo "Pengecekan kelengkapan berkas";
        }elseif ($data->status_kelengkapan == 1) {
            if ($data->status_verifikasi == 0) {
                echo "Proses Pemeriksaan Lapangan";
            }elseif ($data->status_verifikasi == 1) {
                if($data->status_pembayaran == 0) {
                    echo "Proses Penandatanganan";
                }elseif($data->status_pembayaran == 1){
                    echo "Proses Pelunasan Retribusi";
                }elseif($data->status_pembayaran == 2){
                    echo "Izin Telah Diterbitkan";
                }
            }elseif ($data->status_verifikasi == 2) {
                echo "Berkas di tolak verifikator";
            } elseif($data->status_verifikasi == 3) {
                echo "Proses Verifikasi";
            }
        } else {
            echo "Berkas tidak Lengkap";
        }
    }

    public static function status_gangguan_warna($var)
    {
        $data = \App\Gangguan::find($var);
        if ($data->status_kelengkapan == 0) {
            $warna = "Pengecekan kelengkapan berkas";
        }elseif ($data->status_kelengkapan == 1) {
            if ($data->status_verifikasi == 0) {
                $warna = "Proses Pemeriksaan Lapangan";
            }elseif ($data->status_verifikasi == 1) {
                if($data->status_pembayaran == 0) {
                    $warna = "<span style='color: red'>Proses Penandatanganan </span>";
                }elseif($data->status_pembayaran == 1){
                    $warna = "<span style='color: green'>Proses Pelunasan Retribusi</span>";
                }elseif($data->status_pembayaran == 2){
                    $warna = "Izin Telah Diterbitkan";
                }
            }elseif ($data->status_verifikasi == 2) {
                $warna = "Berkas di tolak verifikator";
            } elseif($data->status_verifikasi == 3) {
                $warna = "Proses Verifikasi";
            }
        } else {
            $warna = "Berkas tidak Lengkap";
        }

        return $warna;
    }

    public static function simulasiIMB($var)
    {
        $data = \App\IMBTarif::where('id_klasifikasi_daerah',$var)->first();
        return $data->tarif_bangunan;
    }
    public static function luas($i, $id)
    {
        $data = \App\BAPIMB::find($id);
        echo $data->luas_.$i;
    }
    public static function lantai($i)
    {
        if ($i == 1) {
            echo "Dasar";
        } else {
            return $i-1;
        }
    }
    public static function rencana($var)
    {
        if ($var < 100) {
            echo "rencana pembangunan";
        } elseif ($var = 100) {
            echo "bangunan";
        }
    }
    public static function bap_imb($var, $id)
    {
        $data = \App\BAPIMB::where('imb',$id)->first();
        return $data->$var;
    }
    public static function detail_bap($var, $id)
    {
        $data = \App\BAPIMB::find($id);
        return $data->$var;
    }
    public static function detail_bap_lanjutan($var, $id)
    {
        $data = \App\BAPIMBLanjut::where('bap',$id)->where('z_bangunan', 3)->get();
        return $data->$var;
    }
    public static function detail_imb($var, $id)
    {
        $data = \App\IMB::find($id);
        return $data->$var;
    }
    public static function klasifikasibangunan($var1, $var2)
    {
        $data = \App\IMBTarif::find($var2);
        return $data->$var1;
    }

    public static function berkas_imb($var)
    {
        $data = \App\IMB::find($var);

        if ($data->status_kelengkapan == 0) {
            echo "Pengecekan kelengkapan berkas";
        }elseif ($data->status_kelengkapan == 1) {
            echo "Proses Pemeriksaan Lapangan";
        }elseif ($data->status_kelengkapan == 2) {
            echo "Berkas Tidak Lengkap";
        }elseif ($data->status_kelengkapan == 3) {
            echo "Proses Pemeriksaan Lapangan";
        }elseif($data->status_kelengkapan == 4) {
            echo "Proses Verifikasi Berkas";
        }elseif ($data->status_kelengkapan == 5) {
            if($data->status_pembayaran == 0) {
                echo "Proses Pembuatan SK";
            } elseif ($data->status_pembayaran == 1) {
                if ($data -> sertifikat == null) {
                    echo "Proses Penandatanganan";
                }else {
                    echo "Izin Telah Diterbitkan (Belum Lunas)";
                }
            } elseif ($data->status_pembayaran == 2) {
                echo "Izin Telah Diterbitkan";
            }
        }
    }
    public static function lama_berkas($var)
    {
        $today = date('m/d/Y');
        $today = strtotime($today);
        $data = strtotime($var);

        $selisih = $today - $data;

        if ($selisih == 0) {
            echo "Berkas Hari Ini";
        } elseif($selisih == 86400) {
            echo "1 Hari";
        } elseif($selisih == 172800) {
            echo "2 Hari";
        } elseif($selisih == 259200) {
            echo "2 Hari";
        } elseif ($selisih > 260000) {
            echo "Lebih dari 3 Hari";
        }
    }

    public static function digit_1($id)
    {
        $data   = \App\SITU::find($id);
        $data   = $data->perubahan_ke;
        $satu  = substr($data, 0,1);
        return $satu;
    }
    public static function digit_2($id)
    {
        $data   = \App\SITU::find($id);
        $data   = $data->perubahan_ke;
        $dua  = substr($data, 1);
        return $dua;
    }
    public static function thn_satu($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[2], 0, 1);
        return $satu;
    }
    public static function thn_dua($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[2],1,1);
        return $satu;
    }
    public static function thn_tiga($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[2],2,1);
        return $satu;
    }
    public static function thn_empat($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[2],3,4);
        return $satu;
    }
    public static function tgl_satu($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[1], 0, 1);
        return $satu;
    }
    public static function tgl_dua($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[1], 1, 2);
        return $satu;
    }
    public static function bln_satu($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[0], 0, 1);
        return $satu;
    }
    public static function bln_dua($data)
    {
        $var = explode("/", $data);
        $satu = substr($var[0], 1, 2);
        return $satu;
    }
    public static function nomor_sk($data)
    {
        $var = explode("/", $data);
        return $var[0];
    }

    public static function thn_sk($data)
    {
        $var = explode("/", $data);
        return $var[2];
    }

    public static function tanggal_titik($data)
    {
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[0] == '01'){$bulan = "Januari";}
            if($var[0] == '02'){$bulan = "Februari";}
            if($var[0] == '03'){$bulan = "Maret";}
            if($var[0] == '04'){$bulan = "April";}
            if($var[0] == '05'){$bulan = "Mei";}
            if($var[0] == '06'){$bulan = "Juni";}
            if($var[0] == '07'){$bulan = "Juli";}
            if($var[0] == '08'){$bulan = "Agustus";}
            if($var[0] == '09'){$bulan = "September";}
            if($var[0] == '10'){$bulan = "Oktober";}
            if($var[0] == '11'){$bulan = "November";}
            if($var[0] == '12'){$bulan = "Desember";}

            if(isset($bulan))
            {
                $str = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$bulan." ".$var[2]."";
                return $str;
            }
            else
            {
                if($var[1] == '01'){$bulan = "Januari";}
                if($var[1] == '02'){$bulan = "Februari";}
                if($var[1] == '03'){$bulan = "Maret";}
                if($var[1] == '04'){$bulan = "April";}
                if($var[1] == '05'){$bulan = "Mei";}
                if($var[1] == '06'){$bulan = "Juni";}
                if($var[1] == '07'){$bulan = "Juli";}
                if($var[1] == '08'){$bulan = "Agustus";}
                if($var[1] == '09'){$bulan = "September";}
                if($var[1] == '10'){$bulan = "Oktober";}
                if($var[1] == '11'){$bulan = "November";}
                if($var[1] == '12'){$bulan = "Desember";}
                $str = "".$var[0]." ".$bulan." ".$var[2]."";
                return $str;
            }
        }
        else
        {
            return "-";
        }
    }

    public static function tanggal($data)
    {
        error_reporting(0);
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[0] == '01'){$bulan = "Januari";}
            if($var[0] == '02'){$bulan = "Februari";}
            if($var[0] == '03'){$bulan = "Maret";}
            if($var[0] == '04'){$bulan = "April";}
            if($var[0] == '05'){$bulan = "Mei";}
            if($var[0] == '06'){$bulan = "Juni";}
            if($var[0] == '07'){$bulan = "Juli";}
            if($var[0] == '08'){$bulan = "Agustus";}
            if($var[0] == '09'){$bulan = "September";}
            if($var[0] == '10'){$bulan = "Oktober";}
            if($var[0] == '11'){$bulan = "November";}
            if($var[0] == '12'){$bulan = "Desember";}

            if(isset($bulan))
            {
                $str = "".$var[1]." ".$bulan." ".$var[2]."";
                return $str;
            }
            else
            {
                if($var[1] == '01'){$bulan = "Januari";}
                if($var[1] == '02'){$bulan = "Februari";}
                if($var[1] == '03'){$bulan = "Maret";}
                if($var[1] == '04'){$bulan = "April";}
                if($var[1] == '05'){$bulan = "Mei";}
                if($var[1] == '06'){$bulan = "Juni";}
                if($var[1] == '07'){$bulan = "Juli";}
                if($var[1] == '08'){$bulan = "Agustus";}
                if($var[1] == '09'){$bulan = "September";}
                if($var[1] == '10'){$bulan = "Oktober";}
                if($var[1] == '11'){$bulan = "November";}
                if($var[1] == '12'){$bulan = "Desember";}
                $str = "".$var[0]." ".$bulan." ".$var[2]."";
                return $str;
            }
        }
        else
        {
            return "-";
        }
    }

    public static function date_from_dt($data)
    {
        error_reporting(0);
        $dt = new DateTime($data);
        $date = $dt->format('m/d/Y');
        $var = explode("/", $date);
        if(isset($var[1]))
        {
            if($var[0] == '01'){$bulan = "Januari";}
            if($var[0] == '02'){$bulan = "Februari";}
            if($var[0] == '03'){$bulan = "Maret";}
            if($var[0] == '04'){$bulan = "April";}
            if($var[0] == '05'){$bulan = "Mei";}
            if($var[0] == '06'){$bulan = "Juni";}
            if($var[0] == '07'){$bulan = "Juli";}
            if($var[0] == '08'){$bulan = "Agustus";}
            if($var[0] == '09'){$bulan = "September";}
            if($var[0] == '10'){$bulan = "Oktober";}
            if($var[0] == '11'){$bulan = "November";}
            if($var[0] == '12'){$bulan = "Desember";}

            if(isset($bulan))
            {
                $str = "".$var[1]." ".$bulan." ".$var[2]."";
                return $str;
            }
            else
            {
                if($var[1] == '01'){$bulan = "Januari";}
                if($var[1] == '02'){$bulan = "Februari";}
                if($var[1] == '03'){$bulan = "Maret";}
                if($var[1] == '04'){$bulan = "April";}
                if($var[1] == '05'){$bulan = "Mei";}
                if($var[1] == '06'){$bulan = "Juni";}
                if($var[1] == '07'){$bulan = "Juli";}
                if($var[1] == '08'){$bulan = "Agustus";}
                if($var[1] == '09'){$bulan = "September";}
                if($var[1] == '10'){$bulan = "Oktober";}
                if($var[1] == '11'){$bulan = "November";}
                if($var[1] == '12'){$bulan = "Desember";}
                $str = "".$var[0]." ".$bulan." ".$var[2]."";
                return $str;
            }
        }
        else
        {
            return "-";
        }
    }

    public static function daftar_ulang($data)
    {
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[0] == '01'){$bulan = "Januari";}
            if($var[0] == '02'){$bulan = "Februari";}
            if($var[0] == '03'){$bulan = "Maret";}
            if($var[0] == '04'){$bulan = "April";}
            if($var[0] == '05'){$bulan = "Mei";}
            if($var[0] == '06'){$bulan = "Juni";}
            if($var[0] == '07'){$bulan = "Juli";}
            if($var[0] == '08'){$bulan = "Agustus";}
            if($var[0] == '09'){$bulan = "September";}
            if($var[0] == '10'){$bulan = "Oktober";}
            if($var[0] == '11'){$bulan = "November";}
            if($var[0] == '12'){$bulan = "Desember";}

            if(isset($bulan))
            {
                $str = "".$var[1]." ".$bulan." ";
                return $str;
            }
            else
            {
                if($var[1] == '01'){$bulan = "Januari";}
                if($var[1] == '02'){$bulan = "Februari";}
                if($var[1] == '03'){$bulan = "Maret";}
                if($var[1] == '04'){$bulan = "April";}
                if($var[1] == '05'){$bulan = "Mei";}
                if($var[1] == '06'){$bulan = "Juni";}
                if($var[1] == '07'){$bulan = "Juli";}
                if($var[1] == '08'){$bulan = "Agustus";}
                if($var[1] == '09'){$bulan = "September";}
                if($var[1] == '10'){$bulan = "Oktober";}
                if($var[1] == '11'){$bulan = "November";}
                if($var[1] == '12'){$bulan = "Desember";}
                $str = "".$var[0]." ".$bulan." ".$var[2]."";
                return $str;
            }
        }
        else
        {
            return "-";
        }
    }

    public static function sebut_tanggal($data)
    {
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[1] == '01'){$tanggal = "Satu";}
            if($var[1] == '02'){$tanggal = "Dua";}
            if($var[1] == '03'){$tanggal = "Tiga";}
            if($var[1] == '04'){$tanggal = "Empat";}
            if($var[1] == '05'){$tanggal = "Lima";}
            if($var[1] == '06'){$tanggal = "Enam";}
            if($var[1] == '07'){$tanggal = "Tujuh";}
            if($var[1] == '08'){$tanggal = "Delapan";}
            if($var[1] == '09'){$tanggal = "Sembilan";}
            if($var[1] == '10'){$tanggal = "Sepuluh";}
            if($var[1] == '11'){$tanggal = "Sebelas";}
            if($var[1] == '12'){$tanggal = "Dua Belas";}
            if($var[1] == '13'){$tanggal = "Tiga Belas";}
            if($var[1] == '14'){$tanggal = "Empat Belas";}
            if($var[1] == '15'){$tanggal = "Lima Belas";}
            if($var[1] == '16'){$tanggal = "Enam Belas";}
            if($var[1] == '17'){$tanggal = "Tujuh Belas";}
            if($var[1] == '18'){$tanggal = "Delapan Belas";}
            if($var[1] == '19'){$tanggal = "Sembilan Belas";}
            if($var[1] == '20'){$tanggal = "Dua Puluh";}
            if($var[1] == '21'){$tanggal = "Dua Puluh Satu";}
            if($var[1] == '22'){$tanggal = "Dua Puluh Dua";}
            if($var[1] == '23'){$tanggal = "Dua Puluh Tiga";}
            if($var[1] == '24'){$tanggal = "Dua Puluh Empat";}
            if($var[1] == '25'){$tanggal = "Dua Puluh Lima";}
            if($var[1] == '26'){$tanggal = "Dua Puluh Enam";}
            if($var[1] == '27'){$tanggal = "Dua Puluh Tujuh";}
            if($var[1] == '28'){$tanggal = "Dua Puluh Delapan";}
            if($var[1] == '29'){$tanggal = "Dua Puluh Sembilan";}
            if($var[1] == '30'){$tanggal = "Tiga Puluh";}
            if($var[1] == '31'){$tanggal = "Tiga Puluh Satu";}

            if(isset($tanggal))
            {
                $str = "".$tanggal."";
                return $str;
            }
        }
    }

    public static function bulan($data)
    {
        if($data == '01'){$bulan = "Januari";}
        if($data == '02'){$bulan = "Februari";}
        if($data == '03'){$bulan = "Maret";}
        if($data == '04'){$bulan = "April";}
        if($data == '05'){$bulan = "Mei";}
        if($data == '06'){$bulan = "Juni";}
        if($data == '07'){$bulan = "Juli";}
        if($data == '08'){$bulan = "Agustus";}
        if($data == '09'){$bulan = "September";}
        if($data == '10'){$bulan = "Oktober";}
        if($data == '11'){$bulan = "November";}
        if($data == '12'){$bulan = "Desember";}
        return $bulan;
    }

    public static function sebut_bulan($data)
    {
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[0] == '01'){$bulan = "Januari";}
            if($var[0] == '02'){$bulan = "Februari";}
            if($var[0] == '03'){$bulan = "Maret";}
            if($var[0] == '04'){$bulan = "April";}
            if($var[0] == '05'){$bulan = "Mei";}
            if($var[0] == '06'){$bulan = "Juni";}
            if($var[0] == '07'){$bulan = "Juli";}
            if($var[0] == '08'){$bulan = "Agustus";}
            if($var[0] == '09'){$bulan = "September";}
            if($var[0] == '10'){$bulan = "Oktober";}
            if($var[0] == '11'){$bulan = "November";}
            if($var[0] == '12'){$bulan = "Desember";}

            if(isset($bulan))
            {
                $str = "".$bulan."";
                return $str;
            }
            else
            {
                if($var[1] == '01'){$bulan = "Januari";}
                if($var[1] == '02'){$bulan = "Februari";}
                if($var[1] == '03'){$bulan = "Maret";}
                if($var[1] == '04'){$bulan = "April";}
                if($var[1] == '05'){$bulan = "Mei";}
                if($var[1] == '06'){$bulan = "Juni";}
                if($var[1] == '07'){$bulan = "Juli";}
                if($var[1] == '08'){$bulan = "Agustus";}
                if($var[1] == '09'){$bulan = "September";}
                if($var[1] == '10'){$bulan = "Oktober";}
                if($var[1] == '11'){$bulan = "November";}
                if($var[1] == '12'){$bulan = "Desember";}
                $str = "".$var[0]." ".$bulan." ".$var[2]."";
                return $str;
            }
        }
        else
        {
            return "-";
        }
    }

    public static function sebut_tahun($data)
    {
        $var = explode("/", $data);
        if(isset($var[1]))
        {
            if($var[2] == '2016'){$tahun = "Dua Ribu Lima Belas";}
            if($var[2] == '2016'){$tahun = "Dua Ribu Enam Belas";}
            if($var[2] == '2017'){$tahun = "Dua Ribu Tujuh Belas";}
            if($var[2] == '2018'){$tahun = "Dua Ribu Delapan Belas";}
            if($var[2] == '2019'){$tahun = "Dua Ribu Sembilan Belas";}
            if($var[2] == '2020'){$tahun = "Dua Ribu Dua Puluh";}
            if($var[2] == '2021'){$tahun = "Dua Ribu Dua Puluh Satu";}
            if($var[2] == '2022'){$tahun = "Dua Ribu Dua Puluh Dua";}
            if($var[2] == '2023'){$tahun = "Dua Ribu Dua Puluh Tiga";}
            if($var[2] == '2024'){$tahun = "Dua Ribu Dua Puluh Empat";}
            if($var[2] == '2025'){$tahun = "Dua Ribu Dua Puluh Lima";}

            if(isset($tahun))
            {
                $str = "".$tahun."";
                return $str;
            }
        }
    }

    public static function username()
    {
        $id = Auth::user()->id;
        $data = DB::table('users')->where('id',$id)->first();
        return $data->fullname;
    }

    public static function rupiah($angka){
        $rupiah = "Rp. " . number_format($angka,0,',','.');
        return $rupiah;
    }

    public static function rupiah2($angka){
        $rupiah2 = number_format($angka,0,',','.');
        return $rupiah2;
    }

    public static function nama_pemohon($id) {
        $data = \App\Pemohon::where('no_identitas', $id)->first();
        return $data->nama_pemohon;
    }

    public static function data_pemohon($idb, $id) {
        error_reporting(0);
        $data = \App\Pemohon::where('no_identitas', $id)->first();
        return $data->$idb;
    }

    public static function izin_gangguan($idb, $id) {
        $data = \App\Gangguan::where('id_gangguan', $id)->first();
        return $data->$idb;
    }

    public static function bap_gangguan($idb, $id) {
        error_reporting(0);
        $data = \App\BapGangguan::where('gangguan', $id)->first();
        return $data->$idb;
    }

    public static function data_pejabat($get,$id) {
        $data = \App\Pejabat::find($id);
        return $data->$get;
    }

    public static function detail_pejabat2($idb, $id) {
        $data = \App\Pejabat::where('jabatan', $id)->first();
        return $data->$idb;
    }

    public static function data_jabatan($id) {
        $data = \App\Jabatan::find($id);
        return $data->nama_jabatan;
    }
    //revisiseibu
    public static function penandatangan($req,$id) {
        $gg = \App\Gangguan::find($id);
        $id_ttd = $gg->ttd_daftarulang;

        $jbt = \App\Jabatan::find($id_ttd);

        $ptg = \App\Pejabat::where('jabatan', $id_ttd)->first();



        if ($req == 'jabatan') {
            return $jbt->nama_jabatan;
        }else{

            return $ptg->$req;
        }

    }

    /////////////

    public static function detail_pejabat($idb, $id) {
        $data = \App\Pejabat::find($id);
        return $data->$idb;
    }

    public static function kasi_perizinan($detail) {
        $data = \App\Pejabat::where('jabatan',4)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }
    public static function kasi_pengaduan($detail) {
        $data = \App\Pejabat::where('jabatan',16)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }

    public static function bendahara($detail) {
        $data = \App\Pejabat::where('jabatan',6)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }

    public static function kepala_kantor($detail) {
        $data = \App\Pejabat::where('jabatan',3)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }

    public function tata_usaha($detail) {
        $data = \App\Pejabat::where('jabatan', 10)->first();
        return $data->$detail;
    }


    public static function pejabat_ho($detail) {
        $data = \App\Pejabat::where('jabatan',5)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }

    public static function pejabat_situtiup($detail) {
        $data = \App\Pejabat::where('jabatan',7)->get();
        foreach ($data as $var) {
            return $var->$detail;
        }
    }

    public static function kewarganegaraan ($data) {
        $id = "WNI";
        if (strcmp($data, $id) == 0) {
            echo "Indonesia";
        } else {
            echo "Asing";
        }
    }

    public static function sekarang()
    {
        $now = date("m/d/Y");
        return $now;
        // $date = new DateTime();
        // echo $date->getTimestamp();
    }

    public static function sekarangbah()
    {
        $now = gmdate('Y-m-d h:i:s',time()+60*60*7);
        $now = strtotime($now);
        return $now;
    }

    public static function expired_berkas($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yang lalu' : 'sekarang';
    }

    public static function nama_kawasan($value)
    {
        $data = \App\Kawasan::find($value);
        return $data->nm_kawasan;
    }

    public static function tarif_kawasan($value)
    {
        $data  = \App\TarifKawasan::find($value);
        $kwsn  = $data->kawasan;
        $data2 = \App\Kawasan::find($kwsn);
        return $data2->nm_kawasan;
    }

    public static function jenis_kawasan($var, $value)
    {
        $data = \App\TarifKawasan::find($value);
        return $data->$var;
    }

    public static function indeks_lokasi($data)
    {
        $data = \App\IndekLokasi::find($data);
        return $data->nm_lokasi;
    }

    public static function detail_indeks_lokasi($var,$data)
    {
        $data = \App\IndekLokasi::find($data);
        return $data->$var;
    }

    public static function detail_indeks_gangguan($var, $data)
    {
        $data = \App\IndekGangguan::find($data);
        return $data->$var;
    }

    public static function det_nominal_nflrtu($var1, $var2)
    {
        $data = \App\TarifNFLRTU::where('luas', $var1)->where('n_faktor', $var2)->first();
        return $data->trf_nflrtu;
    }
    public static function nflrtu($data)
    {
        $data = \App\NFLRTU::find($data);
        return $data->luas_lokasi;
    }

    public static function detail_nflrtu($var, $data)
    {
        $data = \App\TarifNFLRTU::find($data);
        return $data->$var;
    }

    public static function det_penolakan($var, $id)
    {
        $data = \App\PenolakanIzinGangguan::where('gangguan',$id)->first();
        return $data->$var;
    }

    public static function jumlah_ho()
    {
        $data = \App\Gangguan::count();
        return $data;
    }

    public static function uang_ho()
    {
        $data = \App\SKRDHO::where('status_bayar',1)->sum('nominal_total');
        return $data;
    }

    public static function uang_imb()
    {
        $data = \App\SKRDIMB::where('status_bayar',1)->sum('nominal_total');
        return $data;
    }

    public static function bulan_Sekarang()
    {
        $now = date('m');
        return $now;
    }

    public static function tahun_sekarang()
    {
        $now = date('Y');
        return $now;
    }

    public static function get_bulan_sekarang()
    {
        $data = gmdate('m',time()+60*60*7);

        if($data == '01'){$bulan = "Januari";}
        if($data == '02'){$bulan = "Februari";}
        if($data == '03'){$bulan = "Maret";}
        if($data == '04'){$bulan = "April";}
        if($data == '05'){$bulan = "Mei";}
        if($data == '06'){$bulan = "Juni";}
        if($data == '07'){$bulan = "Juli";}
        if($data == '08'){$bulan = "Agustus";}
        if($data == '09'){$bulan = "September";}
        if($data == '10'){$bulan = "Oktober";}
        if($data == '11'){$bulan = "November";}
        if($data == '12'){$bulan = "Desember";}

        return $bulan;
    }

    public static function get_ho_bulan_sekarang()
    {
        $bln = date('m');
        $thn = date('Y');
        // $var = \App\Gangguan::where('bln_pengajuan',$bln)
        //     ->where('thn_pengajuan',$thn)
        //     ->where('terhapus',0)
        //     ->where('sertifikat','<>','')
        //     ->where('status_ho','<>',5)
        //     ->count();
        // return $var;

        $data = \App\Gangguan::where('tgl_sk','LIKE','%'.$thn.'%')
            ->where('terhapus',0)
            ->where('sertifikat','<>','')
            ->where('status_ho','<>',5)
            ->get();
        $count = 0;
        foreach ($data as $value) {
            $aDate = explode("/", $value->tgl_sk);
        // dd($aDate);
            $bulan = $aDate[0];
            if($bulan == $bln){
                $count+=1;
            }
        }
        return $count;
    }

    public static function uang_ho_bulan_sekarang()
    {
        $bln = date('m');
        $thn = date('Y');

        $var = DB::table('x_izingangguan')
            ->leftJoin('skrd_ho','x_izingangguan.id_gangguan','=','skrd_ho.gangguan')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('status_bayar',1)
            ->sum('nominal_total');
        return $var;
    }

    public static function uang_imb_bulan_sekarang()
    {
        $bln = date('m');
        $thn = date('Y');

        $var = DB::table('y_imb')
            ->leftJoin('skrd_imb','y_imb.id_imb','=','skrd_imb.imb')
            ->where('thn_pengajuan',$thn)
            ->where('bln_pengajuan',$bln)
            ->where('status_bayar',1)
            ->sum('nominal_total');
        return $var;
    }

    public static function sts_gangguan($id)
    {
        $var = \App\SKRDHO::where('nomor_sts',3)->sum('nominal_total');
        return $var;
    }

    public static function pembayaran_ho($id)
    {
        $data = \App\BapGangguan::where('gangguan',$id)->first();

        $tl = $data->tarif_lingkungan;
        $tl = \App\TarifKawasan::find($tl);
        $tl = $tl->trf_kawasan;

        $il = $data->indek_lokasi;
        $il = \App\IndekLokasi::find($il);
        $il = $il->ix_lokasi;

        $ig = $data->indek_gangguan;
        $ig = \App\IndekGangguan::find($ig);
        $ig = $ig->ix_gangguan;

        $nflrtu = $data->indek_nflrtu;
        $nflrtu = \App\TarifNFLRTU::find($nflrtu);
        $nflrtu = $nflrtu->trf_nflrtu;
        $total = $tl * $il * $ig * $nflrtu;

            $cek = \App\Gangguan::find($id);
            if ($cek->status_ho == 4) {
                $now = $cek->tgl_pengajuan;
                $cekold = \App\Gangguan::find($cek->id_tue);
                $old = $cekold->masa_berlaku;

                $now_num = strtotime($now);
                $old_num = strtotime($old);

                $denda_num = $now_num - $old_num;
                $denda_bln = ceil($denda_num / 2592000 );

                if ($denda_bln <= 1) {
                    $denda = 0;
                    $total = $total + $denda;
                    return $total;
                } elseif ($denda_bln > 1) {
                    $denda = ($denda_bln * 2) / 100;
                    $denda = $total * $denda;
                    $total = $total + $denda;
                    return $total;
                }
            } else {
                $denda = 0;
                $total = $total + $denda;
                return $total;
            }

    }

    public static function detail_pembayaran_ho($money, $var)
    {
        $data = \App\SKRDHO::where('gangguan', $var)->first();
        return $data->$money;
    }

    public static function fungsi_terbilang($var)
    {
        $data = Terbilang::make($var,' rupiah');
        return $data;
    }

    public static function count_status_situ()
    {
        $data = \App\SITU::where('status_verifikasi','<>',4)->count();
        return $data;
    }

    public static function count_status_siup()
    {
        $data = \App\SIUP::where('status_verifikasi','<',4)->count();
        return $data;
    }

    public static function count_status_ho()
    {
        $data = \App\Gangguan::where('status_ho','<',5)->count();
        return $data;
    }

    public static function count_status_imb()
    {
        $data_1 = \App\IMB::where('status_kelengkapan','!=',3)
            ->where('status_kelengkapan','!=',4)
            ->where('status_kelengkapan','!=',6)
            ->where('status_pembayaran','!=',2)
            ->orderBy('id_imb', 'desc')
            ->where('terhapus', '0')
            ->where('sertifikat','=','')
            ->count();

        $data_2 = \App\IMB::where('status_kelengkapan','<',4)->count();
        $data = $data_1 + $data_2;
        return $data; 
    }

    public static function count_pembayaran_ho()
    {
        $data = \App\Gangguan::where('status_pembayaran',1)->count();
        return $data;
    }

    public static function count_pembayaran_imb()
    {
        $data = \App\IMB::where('status_pembayaran',1)->count();
        return $data;
    }

    public static function count_verifikasi_ho()
    {
        $data = \App\Gangguan::where('status_verifikasi',3)->count();
        return $data;
    }

    public static function count_verifikasi_situ()
    {
        $data = \App\SITU::where('status_verifikasi',1)->count();
        return $data;
    }

    public static function count_verifikasi_siup()
    {
        $data = \App\SIUP::where('status_verifikasi',1)->count();
        return $data;
    }

    public static function count_verifikasi_imb()
    {
        $data = \App\IMB::where('status_kelengkapan',4)
            ->where('terhapus',0)
            ->count();
        return $data;
    }

    public static function menghitung_hari($data)
    {
        $dulu     = strtotime($data);
        $sekarang = strtotime(date('m/d/Y'));
        $beda     = $sekarang - $dulu;
        $cari_hari = $beda / 86400;
        return $cari_hari;
    }
    public static function cek_expired($data, $id)
    {
        $var = \App\Gangguan::find($id);
        $tanggal = $var->masa_berlaku;

        $dulu     = strtotime($data);
        $sekarang = strtotime(date('m/d/Y'));

        $beda     = $sekarang - $dulu;

        $cari_hari = $beda / 86400;
        if ($cari_hari >= -30) {
            if ($cari_hari >= -14) {
                if ($cari_hari >= -7) {
                    if ($cari_hari === 0) {
                        echo "Izin Expired";
                    } elseif($cari_hari < 0) {
                        echo "Expired dalam 7 Hari";
                    } elseif ($cari_hari >= 1) {
                        echo "Expired ".$cari_hari." Hari";
                    }
                } elseif($cari_hari < -7) {
                    echo "Expired dalam 2 Minggu";
                }
            } elseif ($cari_hari < -14) {
                echo "Expired Dalam 30 Hari";
            }
        } else if ($cari_hari < -30) {
            return $tanggal;
        }
    }

    public static function det_bangunan($id)
    {
        $data = \App\IMBBangunan::find($id);
        return $data->nama_bangunan;
    }

    public static function det_daerah_bangunan($id)
    {
        error_reporting(0);
        $data = \App\IMBDaerahBangunan::find($id);
        return $data->nama_daerah_bangunan;
    }


    public static function pay_ho($id)
    {
        $data = \App\BapGangguan::where('gangguan',$id)->first();
        $nflrtu                  = $data->indek_nflrtu;
        $tarif_lingkungan        = $data->tarif_lingkungan;
            $cek1                = \App\TarifKawasan::find($tarif_lingkungan);
            $cek_tarif_lingkungan= $cek1->trf_kawasan;
        $indek_lokasi            = $data->indek_lokasi;
            $cek2                = \App\IndekLokasi::find($indek_lokasi);
            $cek_indek_lokasi    = $cek2->ix_lokasi;
        $indek_gangguan          = $data->indek_gangguan;
            $cek3                = \App\IndekGangguan::find($indek_gangguan);
            $cek_indek_gangguan  = $cek3->ix_gangguan;


        $tingkat                 = $data->jumlah_lantai;

        if ($tingkat == 1) {
            $cek4                = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
            $cek_tarif_nflrtu    = $cek4->trf_nflrtu;
            $total               = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

            $cek = \App\Gangguan::find($id);
            if ($cek->status_ho == 4) {
                $now = $cek->tgl_pengajuan;
                $cekold = \App\Gangguan::find($cek->id_tue);
                $old = $cekold->masa_berlaku;

                $now_num = strtotime($now);
                $old_num = strtotime($old);

                $denda_num = $now_num - $old_num;
                $denda_bln = floor($denda_num / 2592000 );
                if ($denda_bln < 1) {
                    $denda = 0;
                    $total = $total + $denda;
                    return $total;
                } else {
                    $denda = ($denda_bln * 2) / 100;
                    $denda = $total * $denda;
                    $total = $total + $denda;
                    return $total;
                }
            } else {
                $denda = 0;
                $total = $total + $denda;
                return $total;
                // echo $cek_indek_gangguan;
            }
        } elseif ($tingkat == 2) {
            $total = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $denda = 0;
                        $subtotal = $subtotal + $denda;
                        $total += $subtotal;

                    } elseif ($denda_bln >= 2) {
                        $denda = ($denda_bln * 2) / 100;
                        $denda = $subtotal * $denda;
                        $subtotal = $subtotal + $denda;
                        $total += $subtotal;
                    }

                } else {
                    $denda = 0;
                    $subtotal = $subtotal + $denda;
                    $total += $subtotal;
                }
                // echo $total;
            }
            return $total;
        } elseif ($tingkat == 3) {
            $total = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $denda = 0;
                        $subtotal = $subtotal + $denda;
                        $total += $subtotal;

                    } elseif ($denda_bln >= 2) {
                        $denda = ($denda_bln * 2) / 100;
                        $denda = $subtotal * $denda;
                        $subtotal = $subtotal + $denda;
                        $total += $subtotal;
                    }

                } else {
                    $denda = 0;
                    $subtotal = $subtotal + $denda;
                    $total += $subtotal;
                }
                // echo $total;
            }
            return $total;
        } else {
            $total = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                if ($i == 1) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai satu  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $denda = 0;
                            $subtotal = $subtotal + $denda;
                        } elseif ($denda_bln >= 2) {
                            $denda = ($denda_bln * 2) / 100;
                            $denda = $subtotal * $denda;
                            $subtotal = $subtotal + $denda;
                        }
                    } else {
                        $denda = 0;
                        $subtotal = $subtotal + $denda;
                    }
                } elseif($i == 2) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 2)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai Dua  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $denda = 0;
                            $subtotal = $subtotal + $denda;
                        } elseif ($denda_bln >= 2) {
                            $denda = ($denda_bln * 2) / 100;
                            $denda = $subtotal * $denda;
                            $subtotal = $subtotal + $denda;
                        }
                    } else {
                        $denda = 0;
                        $subtotal = $subtotal + $denda;
                    }
                } else {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 3)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai ".$i."  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $denda = 0;
                            $subtotal = $subtotal + $denda;
                        } elseif ($denda_bln >= 2) {
                            $denda = ($denda_bln * 2) / 100;
                            $denda = $subtotal * $denda;
                            $subtotal = $subtotal + $denda;
                        }
                    } else {
                        $denda = 0;
                        $subtotal = $subtotal + $denda;
                    }
                }
                $total += $subtotal;
            }
            return $total;
        }
    }

    public static function detail_ho($id)
    {
        $data = \App\BapGangguan::where('gangguan',$id)->first();
        $nflrtu                  = $data->indek_nflrtu;
        $tarif_lingkungan        = $data->tarif_lingkungan;
            $cek1                = \App\TarifKawasan::find($tarif_lingkungan);
            $cek_tarif_lingkungan= $cek1->trf_kawasan;
        $indek_lokasi            = $data->indek_lokasi;
            $cek2                = \App\IndekLokasi::find($indek_lokasi);
            $cek_indek_lokasi    = $cek2->ix_lokasi;
        $indek_gangguan          = $data->indek_gangguan;
            $cek3                = \App\IndekGangguan::find($indek_gangguan);
            $cek_indek_gangguan  = $cek3->ix_gangguan;

        
        $tingkat                 = $data->jumlah_lantai;

        $persen_denda = str_replace('%', '', $data->persen_denda) / 100;
        $faktor_denda = $persen_denda  * $data->bulan_terlambat;

        if ($tingkat == 1) {
            $cek4                = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
            $cek_tarif_nflrtu    = $cek4->trf_nflrtu;
            $total               = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

            $cek = \App\Gangguan::find($id);
            if ($cek->status_ho == 4) {
                $now = $cek->tgl_pengajuan;
                $cekold = \App\Gangguan::find($cek->id_tue);
                $old = $cekold->masa_berlaku;

                $now_num = strtotime($now);
                $old_num = strtotime($old);

                $denda_num = $now_num - $old_num;
                $denda_bln = floor($denda_num / 2592000 );
                if ($denda_bln < 1) {
                    $denda = 0;
                    $denda_bln = 0;
                    $totalbayar = $total;
                    $baga['gangguan'] = $id;
                    $baga['nominal_bayar'] = $totalbayar;
                    $baga['nominal_denda'] = $denda;
                    $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                    $input = $baga;
                    echo "<tr>";
                    echo "<td align='center' align='center'>LD</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($totalbayar,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda (2% x ".$denda_bln." bulan)</td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                } else {
                    $denda = ($denda_bln * 2) / 100;
                    $totalbayar = $total;
                    $denda = $totalbayar * $denda;
                    // echo "Denda Bulan = " .$denda;
                    
                    $baga['gangguan'] = $id;
                    $baga['nominal_bayar'] = $totalbayar;
                    $baga['nominal_denda'] = $denda;
                    $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                    $input = $baga;
                    echo "<tr>";
                    echo "<td align='center' align='center'>LD</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($totalbayar,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda (2% x ".$denda_bln." bulan)</td>";
                    echo "<td align='center' align='center'>".number_format($denda,0,',','.')."</td>";
                    echo "</tr>";
                }
            } else {
                $denda = 0;
                $totalbayar = $total;
                $baga['gangguan'] = $id;
                $baga['nominal_bayar'] = $totalbayar;
                $baga['nominal_denda'] = $denda;
                $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                $input = $baga;
                echo "<tr>";
                echo "<td align='center' align='center'>LD</td>";
                echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                echo "<td align='center' align='center'>".number_format($totalbayar,0,',','.')."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td align='center' align='center'></td>";
                // echo "<td align='center' align='center'>Keterlmbatan</td>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'></td>";
                // echo "<td align='center' align='center'> 2 % x ".$data->bulan_terlambat." Bulan</td>";
                $faktor_denda = $faktor_denda * $totalbayar;
                echo "<td align='center' align='center'>$faktor_denda</td>";
                echo "</tr>";
            }
        } elseif ($tingkat == 2) {
            $total = 0;
            $denda = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $elek = $subtotal;
                        $total += $subtotal;
                        // echo "denda lantai ".$i." ini :". $denda. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";

                    } elseif ($denda_bln >= 2) {
                        $elek = $subtotal;
                        $denda_satuan = ($denda_bln * 2) / 100;
                        $denda_satuan = $subtotal * $denda_satuan;
                        $total += $subtotal;
                        $denda += $denda_satuan;
                        // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                        echo "</tr>";
                    }

                } else {
                    $elek = $subtotal;
                    $total += $subtotal;
                    // echo "denda lantai ".$i." ini :". $denda. "<br>";
                    // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'>";
                        if ($i == 1) {
                            $lantai = "LD";
                        } else {
                            $e = $i - 1;
                            $lantai = "L".$e;
                        }
                    echo $lantai;
                    echo "</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda</td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                }
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        } elseif ($tingkat == 3) {
            $total = 0;
            $denda = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $elek = $subtotal;
                        $total += $subtotal;
                        // echo "denda lantai ".$i." ini :". $denda. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";

                    } elseif ($denda_bln >= 2) {
                        $elek = $subtotal;
                        $denda_satuan = ($denda_bln * 2) / 100;
                        $denda_satuan = $subtotal * $denda_satuan;
                        $total += $subtotal;
                        $denda += $denda_satuan;
                        // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                        echo "</tr>";
                    }

                } else {
                    $elek = $subtotal;
                    $total += $subtotal;
                    // echo "denda lantai ".$i." ini :". $denda. "<br>";
                    // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'>";
                        if ($i == 1) {
                            $lantai = "LD";
                        } else {
                            $e = $i - 1;
                            $lantai = "L".$e;
                        }
                    echo $lantai;
                    echo "</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda</td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                }
                // echo $total;
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        } else {
            $denda = 0;
            $total = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                if ($i == 1) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>LD</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>LD</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";
                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>LD</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                } elseif($i == 2) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 2)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai Dua  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>L1</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>L1</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";
                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>L1</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                } else {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 3)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai ".$i."  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>";
                                if ($i == 1) {
                                    $lantai = "LD";
                                } else {
                                    $e = $i - 1;
                                    $lantai = "L".$e;
                                }
                            echo $lantai;
                            echo "</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>";
                                if ($i == 1) {
                                    $lantai = "LD";
                                } else {
                                    $e = $i - 1;
                                    $lantai = "L".$e;
                                }
                            echo $lantai;
                            echo "</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";

                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                }
                // $denda += $denda_satuan;
                // $total += $subtotal;
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        }
    }

    public static function detail_spp($id)
    {
        $data = \App\BapGangguan::where('gangguan',$id)->first();
        $nflrtu                  = $data->indek_nflrtu;
        $tarif_lingkungan        = $data->tarif_lingkungan;
            $cek1                = \App\TarifKawasan::find($tarif_lingkungan);
            $cek_tarif_lingkungan= $cek1->trf_kawasan;
        $indek_lokasi            = $data->indek_lokasi;
            $cek2                = \App\IndekLokasi::find($indek_lokasi);
            $cek_indek_lokasi    = $cek2->ix_lokasi;
        $indek_gangguan          = $data->indek_gangguan;
            $cek3                = \App\IndekGangguan::find($indek_gangguan);
            $cek_indek_gangguan  = $cek3->ix_gangguan;


        $tingkat                 = $data->jumlah_lantai;

        $persen_denda = str_replace('%', '', $data->persen_denda) / 100;
        $faktor_denda = $persen_denda  * $data->bulan_terlambat;
        if ($tingkat == 1) {
            $cek4                = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
            $cek_tarif_nflrtu    = $cek4->trf_nflrtu;
            $total               = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

            $cek = \App\Gangguan::find($id);
            if ($cek->status_ho == 4) {
                $now = $cek->tgl_pengajuan;
                $cekold = \App\Gangguan::find($cek->id_tue);
                $old = $cekold->masa_berlaku;

                $now_num = strtotime($now);
                $old_num = strtotime($old);

                $denda_num = $now_num - $old_num;
                $denda_bln = floor($denda_num / 2592000 );
                if ($denda_bln < 1) {
                    $denda = 0;
                    $denda_bln = 0;
                    $totalbayar = $total;
                    $baga['gangguan'] = $id;
                    $baga['nominal_bayar'] = $totalbayar;
                    $baga['nominal_denda'] = $denda;
                    $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                    $input = $baga;
                    echo "<tr>";
                    echo "<td align='center' align='center'>LD</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($totalbayar,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda (2% x ".$denda_bln." bulan)</td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                } else {
                    $denda = ($denda_bln * 2) / 100;
                    $totalbayar = $total;
                    $denda = $totalbayar * $denda;
                    $baga['gangguan'] = $id;
                    $baga['nominal_bayar'] = $totalbayar;
                    $baga['nominal_denda'] = $denda;
                    $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                    $input = $baga;
                    echo "<tr>";
                    echo "<td align='center' align='center'>LD</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($totalbayar,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda (2% x ".$denda_bln." bulan)</td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>".number_format($denda,0,',','.')."</td>";
                    echo "</tr>";
                }
            } else {
                $denda = 0;
                $totalbayar = $total;
                $baga['gangguan'] = $id;
                $baga['nominal_bayar'] = $totalbayar;
                $baga['nominal_denda'] = $denda;
                $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
                $input = $baga;
                echo "<tr>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'>LD</td>";
                echo "<td align='center' align='center'>:</td>";
                echo "<td align='left'>".$cek_tarif_lingkungan." x ";
                echo "".$cek_indek_lokasi." x ";
                echo "".$cek_indek_gangguan." x ";
                echo "".$cek_tarif_nflrtu."</td>";
                echo "<td align='center' align='center'>Rp.</td>";
                echo "<td align='center'>".number_format($totalbayar,0,',','.')."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td align='center' align='center'></td>";
                // echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='center' align='center'></td>";
                echo "<td align='left' align='center'>Denda Keterlambatan</td>";
                echo "<td align='center'>Rp.</td>";
                // echo "<td align='center' align='center'> 2 % x ".$data->bulan_terlambat." Bulan</td>";
                $faktor_denda = $faktor_denda * $totalbayar;
                echo "<td align='center' align='center'>$faktor_denda</td>";
                echo "</tr>";
            }
        } elseif ($tingkat == 2) {
            $total = 0;
            $denda = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $elek = $subtotal;
                        $total += $subtotal;
                        // echo "denda lantai ".$i." ini :". $denda. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";

                    } elseif ($denda_bln >= 2) {
                        $elek = $subtotal;
                        $denda_satuan = ($denda_bln * 2) / 100;
                        $denda_satuan = $subtotal * $denda_satuan;
                        $total += $subtotal;
                        $denda += $denda_satuan;
                        // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                        echo "</tr>";
                    }

                } else {
                    $elek = $subtotal;
                    $total += $subtotal;
                    // echo "denda lantai ".$i." ini :". $denda. "<br>";
                    // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>";
                        if ($i == 1) {
                            $lantai = "LD";
                        } else {
                            $e = $i - 1;
                            $lantai = "L".$e;
                        }
                    echo $lantai;
                    echo "</td>";
                    echo "<td align='center' align='center'>:</td>";
                    echo "<td align='left'>".$cek_tarif_lingkungan." x ";
                    echo "".$cek_indek_lokasi." x ";
                    echo "".$cek_indek_gangguan." x ";
                    echo "".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>Rp.</td>";
                    echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='left'>Denda Keterlambatan</td>";
                    echo "<td align='center' align='center'>Rp.</td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                }
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        } elseif ($tingkat == 3) {
            $total = 0;
            $denda = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', $i)->first();
                $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;

                $cek = \App\Gangguan::find($id);
                if ($cek->status_ho == 4) {
                    $now = $cek->tgl_pengajuan;
                    $cekold = \App\Gangguan::find($cek->id_tue);
                    $old = $cekold->masa_berlaku;

                    $now_num = strtotime($now);
                    $old_num = strtotime($old);

                    $denda_num = $now_num - $old_num;
                    $denda_bln = ceil($denda_num / 2592000 );
                    if ($denda_bln <= 1) {
                        $elek = $subtotal;
                        $total += $subtotal;
                        // echo "denda lantai ".$i." ini :". $denda. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";

                    } elseif ($denda_bln >= 2) {
                        $elek = $subtotal;
                        $denda_satuan = ($denda_bln * 2) / 100;
                        $denda_satuan = $subtotal * $denda_satuan;
                        $total += $subtotal;
                        $denda += $denda_satuan;
                        // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                        echo "</tr>";
                    }

                } else {
                    $elek = $subtotal;
                    $total += $subtotal;
                    // echo "denda lantai ".$i." ini :". $denda. "<br>";
                    // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'>";
                        if ($i == 1) {
                            $lantai = "LD";
                        } else {
                            $e = $i - 1;
                            $lantai = "L".$e;
                        }
                    echo $lantai;
                    echo "</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                    echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                    echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                    echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'></td>";
                    echo "<td align='center' align='center'>Denda</td>";
                    echo "<td align='center' align='center'>0</td>";
                    echo "</tr>";
                }
                // echo $total;
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        } else {
            $denda = 0;
            $total = 0;
            for ($i=1; $i <= $tingkat ; $i++) {
                if ($i == 1) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 1)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>LD</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>LD</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";
                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        // echo "<tr>";
                        // echo "<td align='center' align='center'>LD</td>";
                        // echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        // echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        // echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        // echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        // echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        // echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>LD</td>";
                        echo "<td align='center' align='center'>:</td>";
                        echo "<td align='left'>".$cek_tarif_lingkungan." x ";
                        echo "".$cek_indek_lokasi." x ";
                        echo "".$cek_indek_gangguan." x ";
                        echo "".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>Rp.</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                } elseif($i == 2) {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 2)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai Dua  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>L1</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>L1</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";
                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>L1</td>";
                        echo "<td align='center' align='center'>:</td>";
                        echo "<td align='left'>".$cek_tarif_lingkungan." x ";
                        echo "".$cek_indek_lokasi." x ";
                        echo "".$cek_indek_gangguan." x ";
                        echo "".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>Rp.</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                } else {
                    $cek4            = \App\TarifNFLRTU::where('luas', $nflrtu)->where('n_faktor', 3)->first();
                    $cek_tarif_nflrtu= $cek4->trf_nflrtu;
                    $subtotal           = $cek_tarif_lingkungan * $cek_indek_lokasi * $cek_indek_gangguan * $cek_tarif_nflrtu;
                    // echo "Lantai ".$i."  :" .$subtotal."<br>";
                    $cek = \App\Gangguan::find($id);
                    if ($cek->status_ho == 4) {
                        $now = $cek->tgl_pengajuan;
                        $cekold = \App\Gangguan::find($cek->id_tue);
                        $old = $cekold->masa_berlaku;

                        $now_num = strtotime($now);
                        $old_num = strtotime($old);

                        $denda_num = $now_num - $old_num;
                        $denda_bln = ceil($denda_num / 2592000 );

                        if ($denda_bln <= 1) {
                            $elek = $subtotal;
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>";
                                if ($i == 1) {
                                    $lantai = "LD";
                                } else {
                                    $e = $i - 1;
                                    $lantai = "L".$e;
                                }
                            echo $lantai;
                            echo "</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>0</td>";
                            echo "</tr>";
                        } elseif ($denda_bln >= 2) {
                            $elek = $subtotal;
                            $denda_satuan = ($denda_bln * 2) / 100;
                            $denda_satuan = $subtotal * $denda_satuan;
                            // echo "denda lantai ".$i." ini :". $denda_satuan. "<br>";
                            // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'>";
                                if ($i == 1) {
                                    $lantai = "LD";
                                } else {
                                    $e = $i - 1;
                                    $lantai = "L".$e;
                                }
                            echo $lantai;
                            echo "</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                            echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                            echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                            echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'></td>";
                            echo "<td align='center' align='center'>Denda</td>";
                            echo "<td align='center' align='center'>".number_format($denda_satuan,0,',','.')."</td>";
                            echo "</tr>";

                        }
                    } else {
                        $elek = $subtotal;
                        $subtotal = $subtotal + $denda;
                        // echo "biaya retribusi lantai ".$i." ini :". $elek. "<br><hr>";
                        // echo "<tr>";
                        // echo "<td align='center' align='center'>";
                        //     if ($i == 1) {
                        //         $lantai = "LD";
                        //     } else {
                        //         $e = $i - 1;
                        //         $lantai = "L".$e;
                        //     }
                        // echo $lantai;
                        // echo "</td>";
                        // echo "<td align='center' align='center'>".$cek_tarif_lingkungan."</td>";
                        // echo "<td align='center' align='center'>".$cek_indek_lokasi."</td>";
                        // echo "<td align='center' align='center'>".$cek_indek_gangguan."</td>";
                        // echo "<td align='center' align='center'>".$cek_tarif_nflrtu."</td>";
                        // echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        // echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>";
                            if ($i == 1) {
                                $lantai = "LD";
                            } else {
                                $e = $i - 1;
                                $lantai = "L".$e;
                            }
                        echo $lantai;
                        echo "</td>";
                        echo "<td align='center' align='center'>:</td>";
                        echo "<td align='left'>".$cek_tarif_lingkungan." x ";
                        echo "".$cek_indek_lokasi." x ";
                        echo "".$cek_indek_gangguan." x ";
                        echo "".$cek_tarif_nflrtu."</td>";
                        echo "<td align='center' align='center'>Rp.</td>";
                        echo "<td align='center' align='center'>".number_format($subtotal,0,',','.')."</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'></td>";
                        echo "<td align='center' align='center'>Denda</td>";
                        echo "<td align='center' align='center'>0</td>";
                        echo "</tr>";
                    }
                }
                // $denda += $denda_satuan;
                // $total += $subtotal;
            }
            // $baga['gangguan'] = $id;
            // $baga['nominal_bayar'] = $total;
            // $baga['nominal_denda'] = $denda;
            // $baga['nominal_total'] = $baga['nominal_bayar'] + $baga['nominal_denda'];
            // $input = $baga;
            // dd($input);
        }
    }

    public static function jenis_bangunan($var)
    {
        $data = \App\JenisBangunan::where('id_jns_bangunan',$var)->first();
        return $data->jns_bangunan;
    }

    public static function bap_lanjutan_khusus($var, $id)
    {
        $data = \App\BAPIMBLanjut::where('bap',$id)->get();
        return $data->$var;
    }
    public static function jenis_usaha($id)
    {

        $data = \App\SIUPJASA::where('siup',$id)->get();
        foreach ($data as $key => $value) {
            $ret = $ret.", ".$value->bidang_jasa;
        }
        return $ret;
    }

    public static function stat_siup($status)
    {
        if ($status == '1' || $status == '0') {
            $status = "Berkas Sedang di Proses di Operator";
        }elseif ($status == '2') {
            $status = "Berkas Sedang diverifikasi teknis";
        }elseif ($status == '3') {
            $status = "Berkas Ditolak";
        }elseif ($status == 4) {
            $status = "Permohonan Selesai";
        }else
        {
            $status = "";
        }

        return $status;
    }

    public static function pengaturan($var)
        {
            $data = \App\Pengaturan::find(1);
            return $data->$var;
        }

        public static function findStatusIzin($url)
        {
            $data = strpos($url, "keluar");
            if ($data !== false) {
                return 1;
            }else{
                return 0;
            }
        }

        public static function get_halaman()
        {
            $data = \App\Halaman::all();
            foreach ($data as $var) {
                echo '<li id="tentang"><a href="'.url('/detailhalaman/'.$var->id.'').'">'.$var->judul.'</a></li>';
            }
        }

        public static function get_perizinan()
        {
            $data = \App\MasterPerizinan::all();
            foreach ($data as $var) {
                echo '<li><a href="'.url('/detailizin/'.$var->id.'').'">'.$var->perizinan.'</a></li>';
            }
        }

        public static function get_link()
        {
            $data = \App\Link::all();
            foreach ($data as $var) {
                echo '<li><a href="'.$var->url.'">'.$var->nama_web.'</a></li>';
            }
        }

}