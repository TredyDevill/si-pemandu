<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MapsController extends Controller
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
        $kmss = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($kmss as $kmsz) 
        {
            array_push($arr, $kmsz->maks);
        }
        $kmz = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Bayi')
        ->where('kesimpulan_kms', '=', 'Gizi Buruk')
        ->whereIn('id_kms', $arr)->get();
        
        return view('adminlte::maps', ['kmz' => $kmz]);
    }
}
