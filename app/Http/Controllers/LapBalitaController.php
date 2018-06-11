<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LapBalitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $namas = DB::table('kms')->distinct()->select('nama_anak')->get();
        $arrimun = array();
        foreach($namas as $nama)
        {
            $kmss = DB::select(DB::raw("SELECT DISTINCT
                        (SELECT berat_badan FROM kbbls WHERE nama_anak = '" .$nama->nama_anak. "') as bbl,
                        (SELECT bb FROM kms WHERE nama_anak = '" .$nama->nama_anak. "' AND bln_penimbangan = 'mei') as mei,
                        (SELECT bb FROM kms WHERE nama_anak = '" .$nama->nama_anak. "' AND bln_penimbangan = 'juni') as juni,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Fe I') as sb_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Fe II') as sb_ii,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Vit A I') as vita_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Vit A II') as vita_ii,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'PMT Pemulihan') as pmt,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Oralit') as oralit, nama_anak, nama_ayah, nama_ibu, ttl 
                    FROM kms WHERE nama_anak = '" .$nama->nama_anak. "' AND status_anak = 'Balita' "));
            if($kmss != null)
            {
                foreach($kmss as $keluar)
                {
                    array_push($arrimun, $keluar);
                }
            }
        }
        return view('adminlte::laporanbalita', ['arrimun' => $arrimun]);
    }
}
