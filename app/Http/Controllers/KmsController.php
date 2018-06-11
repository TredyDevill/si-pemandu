<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Connection;
use App\Connection2;

class KmsController extends Controller
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
        // $kmss = DB::select('SELECT sipeman1_ka.kms, puskesm8_pemandu.anaks FROM sipeman1_ka.kms JOIN puskesm8_pemandu.anaks ON sipeman1_ka.kms.id_anak = puskesm8_pemandu.anaks.id_anak');

        // $kmss = DB::table('kms as dt1')->leftjoin('anaks as dt2', 'dt2.id_anak', '=', 'dt1.id_anak')->selectRaw("MAX(id_kms) as maks, dt1.id_anak")->groupBy('dt1.id_anak')->get();
        // $arr = array();
        // foreach($kmss as $kmsz)
        // {
        //     array_push($arr, $kmsz->maks);
        // }
        // $kmz = DB::table('kms as dt1')->leftjoin('anaks as dt2', 'dt2.id_anak', '=', 'dt1.id_anak')->select('*')->whereIn('id_kms', $arr)->get();

        $kmss = DB::table('kms')->selectRaw("MAX(id_kms) as maks")->groupBy('id_anak')->get();
        $arr = array();
        foreach ($kmss as $kmsz) 
        {
            array_push($arr, $kmsz->maks);
        }
        $kmz = DB::table('kms')->select('*')->whereIn('id_kms', $arr)->get();

        // $kmss = Connection2::join('puskesm8_pemandu.anaks as db2', 'Connection.id_anak', '=', 'db2.id_anak')
        //             ->select(['Connection.*', 'db2.*'])
        //             ->orderBy('id_anak', 'desc')
        //             ->get();
        // $kmss = DB::table('sipeman1_ka.kms as db1')
        return view('adminlte::datakms', ['kmz' => $kmz]);
    }

    public function update(Request $request, $id_kms)
    {
        $this->validate($request, [
            'bb'                =>  'required',
            'status_asi'        =>  'required',
            'tinggi'            =>  'required',
            'tgl'               =>  'required',
            'bln_penimbangan'   =>  'required',
            'status_bb'         =>  'required',
            'kesimpulan_kms'    =>  'required'
        ]);

        DB::table('kms')
            ->where('id_kader', $id_kms)
            ->update([
                'bb'              =>  $request->bb,
                'status_asi'      =>  $request->status_asi,
                'tinggi'          =>  $request->tinggi,
                'tgl'             =>  $request->tgl,
                'bln_penimbangan' =>  $request->bln_penimbangan,
                'status_bb'       =>  $request->status_bb,
                'kesimpulan_kms'  =>  $request->kesimpulan_kms
            ]);
    return redirect('/datakms')->with('success', 'Data kader berhasil diubah');
    }

    public function destroy($id_kms)
    {
        // $kaders = DB::table('kaders')->where('id_kader', $id_kader)->first();
        // $kaders = DB::delete('DELETE FROM kaders WHERE id_kader = ?', [$id_kader]);
        $kaders = DB::table('kms')->where('id_kms', $id_kms)->delete();
    return redirect('/datakms')->with('delete', 'Data kader berhasil dihapus');
    }
}
