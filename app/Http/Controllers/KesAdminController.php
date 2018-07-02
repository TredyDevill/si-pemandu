<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class KesAdminController extends Controller
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
        $kesehatans = DB::table('kesehatan_anaks')->orderBy('id_ka', 'desc')->get();
        return view('vendor.adminlte.admin.datakesehatananak', ['kesehatans' => $kesehatans]);
    }
}
