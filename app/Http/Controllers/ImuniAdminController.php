<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ImuniAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namas = DB::table('imunisasis')->distinct()->select('nama_anak')->get();
        $arrimun = array();
        foreach($namas as $nama)
        {
            $imunisasis = DB::table('imunisasis')->selectRaw("DISTINCT id_anak,
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
                        (SELECT tgl FROM imunisasis WHERE nama_anak = '" .$nama->nama_anak. "' AND vaksin = 'Hepatitis III') as hepatitis_iii, nama_anak, umur, nama_ayah, nama_ibu, kesimpulan_imunisasi, ttl")
            ->where('nama_anak', $nama->nama_anak)
            ->first();

            array_push($arrimun, $imunisasis);    
        }
        
        return view('vendor.adminlte.admin.dataimunisasi', ['arrimun' => $arrimun]);
     }
}
