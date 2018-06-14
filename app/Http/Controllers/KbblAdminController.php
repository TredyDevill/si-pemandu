<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class KbblAdminController extends Controller
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
        // $kbbls = DB::table('kbbls')
        //         ->leftjoin('anaks', 'anaks.id_anak', '=', 'kbbls.id_anak')
        //         ->orderBy('kbbls.id_anak', 'asc')
        //         ->get();
        $kbbls = DB::table('kbbls')->orderBy('id_kbbl', 'desc')->get();

        return view('vendor.adminlte.admin.datakbbl', ['kbbls' => $kbbls]);
    }
}
