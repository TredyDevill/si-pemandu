<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ImunisasiController extends Controller
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
        
        return view('adminlte::dataimunisasi', ['arrimun' => $arrimun]);
    }

    public function update(Request $request, $id_anak)
    {

        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'BCG')
        ->update(['tgl' => $request->bcg]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'DPT I')
        ->update(['tgl' => $request->dpt_i]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'DPT II')
        ->update(['tgl' => $request->dpt_ii]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'DPT III')
        ->update(['tgl' => $request->dpt_iii]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Polio I')
        ->update(['tgl' => $request->polio_i]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Polio II')
        ->update(['tgl' => $request->polio_ii]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Polio III')
        ->update(['tgl' => $request->polio_iii]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Polio IV')
        ->update(['tgl' => $request->polio_iv]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Campak')
        ->update(['tgl' => $request->campak]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Hepatitis I')
        ->update(['tgl' => $request->hepatitis_i]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Hepatitis II')
        ->update(['tgl' => $request->hepatitis_ii]);
        DB::table('imunisasis')->where('id_anak', $id_anak)
        ->where('vaksin', 'Hepatitis III')
        ->update(['tgl' => $request->hepatitis_iii]);
        
        return redirect('/dataimunisasi')->with('success', 'Data imunisasi berhasil diubah');
    }
    public function destroy($id_anak)
    {
        $imun = DB::table('imunisasis')->where('id_anak', $id_anak)->delete();
    return redirect('/dataimunisasi')->with('delete', 'Data imunisasi berhasil dihapus');
    }
}
