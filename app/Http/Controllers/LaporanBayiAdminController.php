<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LaporanBayiAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'kapsul biru') as vita_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'kapsul merah') as vita_ii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'BCG') as bcg,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'DPT I') as dpt_i,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'DPT II') as dpt_ii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'DPT III') as dpt_iii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Polio I') as polio_i,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Polio II') as polio_ii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Polio III') as polio_iii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Polio IV') as polio_iv,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Campak') as campak,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Hepatitis I') as hepatitis_i,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Hepatitis II') as hepatitis_ii,
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Hepatitis III') as hepatitis_iii, nama_anak, nama_ayah, nama_ibu, ttl 
                    FROM kms WHERE nama_anak = '" .$nama->nama_anak. "' AND status_anak = 'Bayi' "));
            if($kmss != null)
            {
                foreach($kmss as $keluar)
                {
                    array_push($arrimun, $keluar);
                }
            }
        }
        return view('vendor.adminlte.admin.laporanbayi', ['arrimun' => $arrimun]);
    }
}
