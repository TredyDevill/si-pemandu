<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MapsAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $kmsgk = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($kmsgk as $kmsg) 
        {
            array_push($arr, $kmsg->maks);
        }
        $kmsk = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Bayi')
        ->where('kesimpulan_kms', '=', 'Gizi Kurang')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $bayigb = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($bayigb as $bayibaik) 
        {
            array_push($arr, $bayibaik->maks);
        }
        $kmsbaik = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Bayi')
        ->where('kesimpulan_kms', '=', 'Gizi Baik')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $bayigl = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($bayigl as $bayilebih) 
        {
            array_push($arr, $bayilebih->maks);
        }
        $kmslebih = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Bayi')
        ->where('kesimpulan_kms', '=', 'Gizi Lebih')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $balitagb = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($balitagb as $balitaburuk) 
        {
            array_push($arr, $balitaburuk->maks);
        }
        $kmsbalburuk = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Balita')
        ->where('kesimpulan_kms', '=', 'Gizi Buruk')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $balitagk = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($balitagk as $balitakurang) 
        {
            array_push($arr, $balitakurang->maks);
        }
        $kmsbalkurang = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Balita')
        ->where('kesimpulan_kms', '=', 'Gizi Kurang')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $balitagb = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($balitagb as $balitabaik) 
        {
            array_push($arr, $balitabaik->maks);
        }
        $kmsbalbaik = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Balita')
        ->where('kesimpulan_kms', '=', 'Gizi Baik')
        ->whereIn('id_kms', $arr)->get();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $balitagl = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->selectRaw("MAX(id_kms) as maks, kms.id_anak")->groupBy('kms.id_anak')->get();
        $arr = array();
        foreach ($balitagl as $balitalebih) 
        {
            array_push($arr, $balitalebih->maks);
        }
        $kmsballebih = DB::table('kms')->leftjoin('alamats', 'alamats.id_anak', '=', 'kms.id_anak')->select('*')->where('status_anak', '=', 'Balita')
        ->where('kesimpulan_kms', '=', 'Gizi Lebih')
        ->whereIn('id_kms', $arr)->get();

        return view('vendor.adminlte.admin.maps', ['kmz' => $kmz, 'kmsk' => $kmsk, 'kmsbaik' => $kmsbaik, 'kmslebih' => $kmslebih, 'kmsbalburuk' => $kmsbalburuk, 'kmsbalkurang' => $kmsbalkurang, 'kmsbalbaik' => $kmsbalbaik, 'kmsballebih' => $kmsballebih]);
    }
}
