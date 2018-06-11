<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Totalanak;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // $bayi = DB::table('kms')->where('status_anak', '=', 'Bayi')->count();
        // $balita = DB::table('kms')->where('status_anak', '=', 'Balita')->count();
        $total = DB::table('kms')->selectRaw("DISTINCT (SELECT COALESCE(COUNT(status_anak), 0) FROM kms WHERE status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as bayi,
            (SELECT COALESCE(COUNT(status_anak), 0) FROM kms WHERE status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as balita")->first();
        $totaljml = array();
        array_push($totaljml, $total->bayi, $total->balita);

        // $banyak = DB::table('kms')->count();
        // for($i = 1; $i <= $banyak; $i++)
        // {
        //     if(rand(0,3) == 0)
        //     {
        //         $acak = 'Buruk';
        //     }
        //     else if(rand(0,3) == 1)
        //     {
        //         $acak = 'Kurang';
        //     }
        //     else if(rand(0,3) == 2)
        //     {
        //         $acak = 'Baik';
        //     }
        //     else
        //     {
        //         $acak = 'Lebih';
        //     }
        //     DB::table('kms')->where('id_kms', $i + 22)
        //     ->update([
        //     'kesimpulan_kms' => 'Gizi '.$acak
        //     ]);    
        // }
        $gizibayi = DB::table('kms')->selectRaw("DISTINCT (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Buruk' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as buruk,
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Kurang' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as kurang, 
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Baik' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as baik, 
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Lebih' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as Lebih")->first();
        $gizijml = array();
        array_push($gizijml, $gizibayi->buruk, $gizibayi->kurang, $gizibayi->baik, $gizibayi->lebih, 0);

        $gizibalita = DB::table('kms')->selectRaw("DISTINCT (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Buruk' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as buruk,
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Kurang' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as kurang, 
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Baik' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as baik, 
            (SELECT COALESCE(COUNT(kesimpulan_kms), 0) FROM kms WHERE kesimpulan_kms = 'Gizi Lebih' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as Lebih")->first();
        $gizibalitajml = array();
        array_push($gizibalitajml, $gizibalita->buruk, $gizibalita->kurang, $gizibalita->baik, $gizibalita->lebih, 0);

        return view('adminlte::home', ['totaljml' => $totaljml, 'gizijml' => $gizijml, 'gizibalitajml' => $gizibalitajml]);
    }

    public function jsphp(){
        // $jml = DB::table('kms')->where('status_anak', '=', 'Bayi')
        //      ->count();

        // $jmltotal = DB::table('kms')
        //      ->select('')
        $kmss = DB::table('kms')->selectRaw("MAX(id_kms) as maks")->groupBy('id_anak')->get();
        $arr = array();
        foreach ($kmss as $kmsz) 
        {
            array_push($arr, $kmsz->maks);
        }
        $kmz = DB::table('kms')->select('*')->whereIn('id_kms', $arr)->where('status_anak', '=', 'Bayi')
                ->count();
        
        $kmssbayi = DB::table('kms')->selectRaw("MAX(id_kms) as maks")->groupBy('id_anak')->get();
        $arrbayi = array();
        foreach ($kmssbayi as $kmszbayi) 
        {
            array_push($arrbayi, $kmszbayi->maks);
        }
        $kmzbayi = DB::table('kms')->select('bb', 'tinggi')->where('status_anak', '=', 'Bayi')->whereIn('id_kms', $arr)
                ->get();
        
/////////////////////////////////////////////////////////////////////////////////////////
        $kmsbalita = DB::table('kms')->selectRaw("MAX(id_kms) as maks")->groupBy('id_anak')->get();
        $arr = array();
        foreach ($kmsbalita as $kmszbalita) 
        {
            array_push($arr, $kmszbalita->maks);
        }
        $kmzbalita = DB::table('kms')->select('*')->whereIn('id_kms', $arr)->where('status_anak', '=', 'Balita')
                ->count();
        // dd($kmzbalita);

        $kmssbalita = DB::table('kms')->selectRaw("MAX(id_kms) as maks")->groupBy('id_anak')->get();
        $arrbalita = array();
        foreach ($kmssbalita as $kmszbalita) 
        {
            array_push($arrbalita, $kmszbalita->maks);
        }
        $kmzzbalita = DB::table('kms')->select('bb', 'tinggi')->where('status_anak', '=', 'Balita')->whereIn('id_kms', $arr)
                ->get();
        // dd($kmzzbalita);
        // include(app_path('\kmeans.php'));  
        return view('adminlte::kmeans', ['kmz' => $kmz, 'kmzbayi' => $kmzbayi, 'kmzbalita' => $kmzbalita, 'kmzzbalita' => $kmzzbalita]);
    }
}