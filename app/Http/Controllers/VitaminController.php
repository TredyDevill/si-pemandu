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
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'kapsul biru') as vita_i,
                        (SELECT tgl FROM vitas WHERE nama_anak = '" .$nama->nama_anak. "' AND nama_kapsul = 'kapsul merah') as vita_ii, nama_anak, umur, nama_ayah, nama_ibu, kesimpulan_vita, ttl")
            ->where('nama_anak', $nama->nama_anak)
            ->first();

            array_push($arrimun, $vitas);    
        }

        return view('adminlte::datavitamina', ['arrimun' => $arrimun]);
    }

    public function update(Request $request, $id_anak)
    {

        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'kapsul biru')
        ->update(['tgl' => $request->vita_i]);
        DB::table('vitas')->where('id_anak', $id_anak)
        ->where('nama_kapsul', 'kapsul merah')
        ->update(['tgl' => $request->vita_ii]);
        
        
        return redirect('/datavitamina')->with('success', 'Data vitamin berhasil diubah');
    }
    public function destroy($id_anak)
    {
        $vit = DB::table('vitas')->where('id_anak', $id_anak)->delete();
    return redirect('/datavitamina')->with('delete', 'Data vitamin berhasil dihapus');
    }
}
