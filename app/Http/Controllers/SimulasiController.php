<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class SimulasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function simulasi()
    {
        error_reporting(0);
        $tl  = \App\TarifKawasan::all();
        $il  = \App\IndekLokasi::all();
        $ig  = \App\IndekGangguan::all();
        $nf  = \App\TarifNFLRTU::all();

        //imb
        $td  = \App\IMBTarifDasar::all();
        $kg  = \App\IMBKoefisienGuna::all();
        $lb  = \App\IMBKoefisienLetak::all();
        $kk  = \App\IMBKoefisienKondisi::all();

        $jenis = Input::get('jenis');
        if ($jenis == 1) {
            $tltl       = Input::get('tl');
            $ilil       = Input::get('il');
            $igig       = Input::get('ig');
            $nflrtu     = Input::get('nflrtu');

            $cek        = \App\TarifNFLRTU::find($nflrtu);
            $cek        = $cek->n_faktor;

            $hitung_tl  = \App\TarifKawasan::find($tltl);
            $hitung_tl  = $hitung_tl->trf_kawasan;

            $hitung_il  = \App\IndekLokasi::find($ilil);
            $hitung_il  = $hitung_il->ix_lokasi;

            $hitung_ig  = \App\IndekGangguan::find($igig);
            $hitung_ig  = $hitung_ig->ix_gangguan;

            if ($cek == 1) { // 1 lantai
                $hitung_nflrtu  = \App\TarifNFLRTU::find($nflrtu);
                $hitung_nflrtu  = $hitung_nflrtu->trf_nflrtu;

                $hitung         = $hitung_tl * $hitung_il * $hitung_ig * $hitung_nflrtu;
            }elseif($cek == 2) { // 2 lantai
                $nflrtu_1       = \App\TarifNFLRTU::find($nflrtu);
                $nflrtu_1       = $nflrtu_1->trf_nflrtu;

                $nflrtu_2       = \App\TarifNFLRTU::find($nflrtu-1);
                $nflrtu_2       = $nflrtu_2->trf_nflrtu;

                $hitung_1       = $hitung_tl * $hitung_il * $hitung_ig * $nflrtu_1;
                $hitung_2       = $hitung_tl * $hitung_il * $hitung_ig * $nflrtu_2;

                $hitung         = $hitung_1 + $hitung_2;
            }elseif($cek == 3){ // 3 lantai
                $nflrtu_1       = \App\TarifNFLRTU::find($nflrtu);
                $nflrtu_1       = $nflrtu_1->trf_nflrtu;

                $nflrtu_2       = \App\TarifNFLRTU::find($nflrtu-1);
                $nflrtu_2       = $nflrtu_2->trf_nflrtu;

                $nflrtu_3       = \App\TarifNFLRTU::find($nflrtu-2);
                $nflrtu_3       = $nflrtu_3->trf_nflrtu;

                $hitung_1       = $hitung_tl * $hitung_il * $hitung_ig * $nflrtu_1;
                $hitung_2       = $hitung_tl * $hitung_il * $hitung_ig * $nflrtu_2;
                $hitung_3       = $hitung_tl * $hitung_il * $hitung_ig * $nflrtu_3;

                $hitung         = $hitung_1 + $hitung_2 + $hitung_3;
            }
        }else{
            $jnb    = Input::get('jenis_bangunan');
            $kjnb   = \App\IMBTarifDasar::find($jnb);
            $kjnb   = $kjnb->tarifdasar; //tarif dasar

            $gb    = Input::get('guna');
            $kgb   = \App\IMBKoefisienGuna::find($gb);
            $kgb   = $kgb->koefisien_guna; //guna bangunan

            $ltb   = Input::get('letak');
            $kltb  = \App\IMBKoefisienLetak::find($ltb);
            $kltb  = $kltb->koefisien_letak; // letak bangunan

            $knd   = Input::get('kondisi');
            $kknd  = \App\IMBKoefisienKondisi::find($knd);
            $kknd  = $kknd->koefisien_kondisi; // kondisi bangunan

            $luas  = Input::get('luas'); //luas bangunan
            if ($luas <= 100) {
                $kluas = 1;
            }elseif ($luas > 100 && $luas < 300) {
                $kluas = 1.1;
            }elseif ($luas >= 300 && $luas < 500) {
                $kluas = 1.2;
            }else {
                $kluas = $luas/500;
                $kluas = floor($kluas);
                $kluas = "0.".$kluas;
                $kluas = 1.2 + $kluas; // koefisien luas
            }

            $lantai= Input::get('lantai'); // OK
            $base  = Input::get('basement');

            $jimb  = Input::get('jenis_imb'); //jenis imb

            if ($lantai == "1") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $b;
                }
            }elseif ($lantai == "2") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $b;
                }
            }elseif ($lantai == "3") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $b;
                }
            }elseif ($lantai == "4") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $b;
                }
            }elseif ($lantai == "5") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 + $b;
                }
            }elseif ($lantai == "6") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $l6     = $luas * $kjnb * $kluas * 1.10 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $l6     = $luas * $kjnb * $kluas * 1.10 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $b;
                }
            }elseif ($lantai == "7") {
                if ($base == "0") {
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $l6     = $luas * $kjnb * $kluas * 1.10 * $kgb * $kltb * $kknd;
                    $l7     = $luas * $kjnb * $kluas * 1.12 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7 ;
                }else{
                    $l1     = $luas * $kjnb * $kluas * 1 * $kgb * $kltb * $kknd;
                    $l2     = $luas * $kjnb * $kluas * 1.02 * $kgb * $kltb * $kknd;
                    $l3     = $luas * $kjnb * $kluas * 1.04 * $kgb * $kltb * $kknd;
                    $l4     = $luas * $kjnb * $kluas * 1.06 * $kgb * $kltb * $kknd;
                    $l5     = $luas * $kjnb * $kluas * 1.08 * $kgb * $kltb * $kknd;
                    $l6     = $luas * $kjnb * $kluas * 1.10 * $kgb * $kltb * $kknd;
                    $l7     = $luas * $kjnb * $kluas * 1.12 * $kgb * $kltb * $kknd;
                    $b      = $luas * $kjnb * $kluas * 1.2 * $kgb * $kltb * $kknd;
                    $hitung_imb = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7 + $b;
                }
            }            
        }

        if ($jimb == "1") { //baru
            $hitung_imb2 = $hitung_imb;
        }elseif ($jimb == "2") { //perubahan luas
            $hitung_imb2 = $hitung_imb;
        }elseif ($jimb == "3") { //perubahan fungsi
            $hitung_imb2 = $hitung_imb * 0.35;
        }elseif ($jimb == "4") { //balik nama
            $hitung_imb2 = $hitung_imb * 0.25;
        }elseif ($jimb == "5") { //pemecahan
            $hitung_imb2 = $hitung_imb * 0.10;
        }elseif ($jimb == "6") { //pemecahan + balik nama
            $hitung_imb2 = $hitung_imb * 0.30;
        }
        return view('anjungan.simulasi', compact(['tl','il','ig','nf','hitung','td','kg','lb','kk','hitung_imb2','luas','kjnb','kluas','kgb','kltb','kknd']));
    }
}
