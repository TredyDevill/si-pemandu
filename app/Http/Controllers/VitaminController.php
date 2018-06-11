<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VitaminController extends Controller
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

        return view('adminlte::datavitamina', ['arrimun' => $arrimun]);
    }

    public function update(Request $request, $id_anak)
    {

        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'Fe I')
        ->update(['tgl' => $request->sb_i]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'Fe I')
        ->update(['tgl' => $request->sb_ii]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'Vit A I')
        ->update(['tgl' => $request->vita_i]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'Vit A II')
        ->update(['tgl' => $request->vita_ii]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'PMT')
        ->update(['tgl' => $request->pmt]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'Oralit')
        ->update(['tgl' => $request->oralit]);
        
        
        return redirect('/datavitamina')->with('success', 'Data vitamin berhasil diubah');
    }
}
