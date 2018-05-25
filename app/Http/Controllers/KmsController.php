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

        $kmss = DB::table('sipeman1_ka.kms as dt1')->leftjoin('puskesm8_pemandu.anaks as dt2', 'dt2.id_anak', '=', 'dt1.id_anak')->selectRaw("MAX(id_kms) as maks, dt1.id_anak")->groupBy('dt1.id_anak')->get();
        $arr = array();
        foreach($kmss as $kmsz)
        {
            array_push($arr, $kmsz->maks);
        }
        $kmz = DB::table('sipeman1_ka.kms as dt1')->leftjoin('puskesm8_pemandu.anaks as dt2', 'dt2.id_anak', '=', 'dt1.id_anak')->select('*')->whereIn('id_kms', $arr)->get();
        // $kmss = Connection2::join('puskesm8_pemandu.anaks as db2', 'Connection.id_anak', '=', 'db2.id_anak')
        //             ->select(['Connection.*', 'db2.*'])
        //             ->orderBy('id_anak', 'desc')
        //             ->get();
        // $kmss = DB::table('sipeman1_ka.kms as db1')
        return view('adminlte::datakms', ['kmz' => $kmz]);
    }
}

        //         ->select('db1.*')
        //         ->leftjoin('puskesm8_pemandu.anaks as db2', 'db2.id_anak', '=', 'db1.id_anak')
        //         ->get();
