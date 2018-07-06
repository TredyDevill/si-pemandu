<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $kmeansbayi = DB::table('kms')->selectRaw("DISTINCT (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Sangat Kurus' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as sangat_kurus,
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Kurus' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as kurus, 
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Normal' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as normal, 
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Gemuk' AND status_anak = 'Bayi' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as gemuk")->first();
        $tingkatbayijml = array();
        array_push($tingkatbayijml, $kmeansbayi->sangat_kurus, $kmeansbayi->kurus, $kmeansbayi->normal, $kmeansbayi->gemuk, 0);
       
        $kmeansbalita = DB::table('kms')->selectRaw("DISTINCT (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Sangat Kurus' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as sangat_kurus,
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Kurus' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as kurus, 
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Normal' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as normal, 
            (SELECT COALESCE(COUNT(status_kmeans), 0) FROM kms WHERE status_kmeans = 'Gemuk' AND status_anak = 'Balita' AND id_kms IN (SELECT MAX(id_kms) as maks FROM kms GROUP BY id_anak)) as gemuk")->first();
        $tingkatbalitajml = array();
        array_push($tingkatbalitajml, $kmeansbalita->sangat_kurus, $kmeansbalita->kurus, $kmeansbalita->normal, $kmeansbalita->gemuk, 0);

        return view('vendor.adminlte.admin.admin', ['totaljml' => $totaljml, 'gizijml' => $gizijml, 'gizibalitajml' => $gizibalitajml, 'tingkatbayijml' => $tingkatbayijml, 'tingkatbalitajml' => $tingkatbalitajml]);
    }
}