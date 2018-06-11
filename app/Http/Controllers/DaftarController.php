<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class DaftarController extends Controller
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
        $pendaftaran = DB::table('data_pendaftarans')
                ->leftjoin('kbbls', 'kbbls.id_anak', '=', 'data_pendaftarans.id_anak')
                ->orderBy('data_pendaftarans.tgl', 'desc')
                ->get();
        return view('adminlte::pendaftaran', ['pendaftaran' => $pendaftaran]);
    }
}
