<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class VitAdminController extends Controller
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
        $namas = DB::table('vitas')->distinct()->select('nama_anak')->get();
        $arrimun = array();
        foreach($namas as $nama)
        {
            $vitas = DB::table('vitas')->selectRaw("DISTINCT id_anak,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Fe I') as sb_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Fe II') as sb_ii,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Vit A I') as vita_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Vit A II') as vita_ii,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'PMT Pemutihan') as pmt,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'Oralit') as oralit, nama_anak, umur, nama_ayah, nama_ibu, kesimpulan_vita, ttl")
            ->where('nama_anak', $nama->nama_anak)
            ->first();

            array_push($arrimun, $vitas);    
        }

        return view('vendor.adminlte.admin.datavitamin', ['arrimun' => $arrimun]);
    }
}
