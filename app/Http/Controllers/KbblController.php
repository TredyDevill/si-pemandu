<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class KbblController extends Controller
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
        // $kbbls = DB::table('kbbls')
        //         ->leftjoin('anaks', 'anaks.id_anak', '=', 'kbbls.id_anak')
        //         ->orderBy('kbbls.id_anak', 'asc')
        //         ->get();
        $kbbls = DB::table('kbbls')->orderBy('id_kbbl', 'desc')->get();

        return view('adminlte::datakbbl', ['kbbls' => $kbbls]);
    }

    public function update(Request $request, $id_kbbl)
    {
        $this->validate($request, [
            'nama_anak'         =>  'required',
            'nama_ayah'         =>  'required',
            'nama_ibu'          =>  'required',
            'ttl'               =>  'required',
            'umur'              =>  'required',
            'berat_badan'       =>  'required',
            'panjang_badan'     =>  'required',
            'tempat_lahir'      =>  'required',
            'cara_persalinan'   =>  'required',
            'kesimpulan_kbbl'   =>  'required'
        ]);

        DB::table('kbbls')
            ->where('id_kbbl', $id_kbbl)
            ->update([
                'nama_anak'         =>  $request->nama_anak,
                'nama_ayah'         =>  $request->nama_ayah,
                'nama_ibu'          =>  $request->nama_ibu,
                'ttl'               =>  $request->ttl,
                'umur'              =>  $request->umur,
                'berat_badan'       =>  $request->berat_badan,
                'panjang_badan'     =>  $request->panjang_badan,
                'tempat_lahir'      =>  $request->tempat_lahir,
                'cara_persalinan'   =>  $request->cara_persalinan,
                'kesimpulan_kbbl'   =>  $request->kesimpulan_kbbl
            ]);
    return redirect('/datakbbl')->with('success', 'Data KBBL berhasil diubah');
    }

    public function destroy($id_kbbl)
    {
        $kaders = DB::table('kbbls')->where('id_kbbl', $id_kbbl)->delete();
    return redirect('/datakbbl')->with('delete', 'Data KBBL berhasil dihapus');
    }
}
