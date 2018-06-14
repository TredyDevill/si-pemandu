<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class SasaranAdminController extends Controller
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
    	$sasarans = DB::table('data_sasarans')->orderBy('id_sasaran', 'desc')->get();
    	return view('vendor.adminlte.admin.datasasaran', ['sasarans' => $sasarans]);
    }

}
