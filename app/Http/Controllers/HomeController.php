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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        // dd($kmeansbalita);
        return view('adminlte::home', ['totaljml' => $totaljml, 'gizijml' => $gizijml, 'gizibalitajml' => $gizibalitajml, 'tingkatbayijml' => $tingkatbayijml, 'tingkatbalitajml' => $tingkatbalitajml]);
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
        
        // dd($kmzzbalita);
        // include(app_path('\kmeans.php'));  
        return view('adminlte::kmeans', ['kmz' => $kmz, 'kmzbayi' => $kmzbayi]);
    }

    public function postjsphp(Request $request){
        // ini_set('max_execution', 600);
        $clstr =[];
        $jclstr =[];

        $st = "Status";
        $st1 = "Status 1";
        $st2 = "Status 2";
        $st3 = "Status 3";
        $st4 = "Status 4";

        // $nilai1 = $request->input('varn1');
        // $nilai2 = $request->input('varn2');
        // $nilai3 = $request->input('varn3');
        // $nilai4 = $request->input('varn4');

        // $nilaicluster = [$nilai1, $nilai2, $nilai3, $nilai4];
        // rsort($nilaicluster);

        // for($i = 0; $i < 4; $i++)
        // {
        //     if($nilaicluster[0] == ${"nilai".($i + 1)})
        //     {
        //         ${"st".($i + 1)} = "Gemuk";
        //     }
        //     else if($nilaicluster[1] == ${"nilai".($i + 1)}){
        //         ${"st".($i + 1)} = "Normal";
        //     }
        //     else if($nilaicluster[2] == ${"nilai".($i + 1)}){
        //         ${"st".($i + 1)} = "Kurus";
        //     }
        //     else{
        //         ${"st".($i + 1)} = "Sangat Kurus";
        //     }
        // }

        for($cluster = 0; $cluster < 4; $cluster++){
            if($cluster == 0){
                $clstr = $request->input('varc1');
                ${"st".($cluster + 1)} = "Gemuk";
            }
            if($cluster == 1){
                $clstr = $request->input('varc2');
                ${"st".($cluster + 1)} = "Normal";
            }
            if($cluster == 2){
                $clstr = $request->input('varc3');
                ${"st".($cluster + 1)} = "Kurus";
            }
            if($cluster == 3){
                $clstr = $request->input('varc4');
                ${"st".($cluster + 1)} = "Sangat Kurus";
            }

        for($c1 = 0; $c1 < count($clstr); $c1++){
            DB::table('kms')
            ->where('status_anak', '=', 'Bayi')
            ->where('bb', $clstr[$c1][0])
            ->where('tinggi', $clstr[$c1][1])
            ->update(['status_kmeans' => ${"st".($cluster+1)}]);

        }

    }

    }

    public function jsphpbalita(){
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

        return view('adminlte::kmeansbalita', ['kmzbalita' => $kmzbalita, 'kmzzbalita' => $kmzzbalita]);
    }

    public function postjsphpbalita(Request $request){
        // ini_set('max_execution', 600);
        $clstr =[];
        $jclstr =[];

        $st = "Status";
        $st1 = "Status 1";
        $st2 = "Status 2";
        $st3 = "Status 3";
        $st4 = "Status 4";

        // $nilai1 = $request->input('varn1');
        // $nilai2 = $request->input('varn2');
        // $nilai3 = $request->input('varn3');
        // $nilai4 = $request->input('varn4');

        // $nilaicluster = [$nilai1, $nilai2, $nilai3, $nilai4];
        // rsort($nilaicluster);

        // for($i = 0; $i < 4; $i++)
        // {
        //     if($nilaicluster[0] == ${"nilai".($i + 1)})
        //     {
        //         ${"st".($i + 1)} = "Gemuk";
        //     }
        //     else if($nilaicluster[1] == ${"nilai".($i + 1)}){
        //         ${"st".($i + 1)} = "Normal";
        //     }
        //     else if($nilaicluster[2] == ${"nilai".($i + 1)}){
        //         ${"st".($i + 1)} = "Kurus";
        //     }
        //     else{
        //         ${"st".($i + 1)} = "Sangat Kurus";
        //     }
        // }

        for($cluster = 0; $cluster < 4; $cluster++){
            if($cluster == 0){
                $clstr = $request->input('varc1');
                ${"st".($cluster + 1)} = "Gemuk";
            }
            if($cluster == 1){
                $clstr = $request->input('varc2');
                ${"st".($cluster + 1)} = "Normal";
            }
            if($cluster == 2){
                $clstr = $request->input('varc3');
                ${"st".($cluster + 1)} = "Kurus";
            }
            if($cluster == 3){
                $clstr = $request->input('varc4');
                ${"st".($cluster + 1)} = "Sangat Kurus";
            }

        for($c1 = 0; $c1 < count($clstr); $c1++){
            DB::table('kms')
            ->where('status_anak', '=', 'Balita')
            ->where('bb', $clstr[$c1][0])
            ->where('tinggi', $clstr[$c1][1])
            ->update(['status_kmeans' => ${"st".($cluster+1)}]);

        }

    }

    }
}