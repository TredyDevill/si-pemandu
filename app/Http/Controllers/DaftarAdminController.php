<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('vendor.adminlte.admin.pendaftaran');
    }
}
