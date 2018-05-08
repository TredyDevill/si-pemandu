<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('vendor.adminlte.admin.maps');
    }
}
