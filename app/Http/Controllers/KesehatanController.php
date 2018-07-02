<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class KesehatanController extends Controller
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
        $kesehatans = DB::table('kesehatan_anaks')->orderBy('id_ka', 'desc')->get();
        return view('adminlte::datakesehatananak', ['kesehatans' => $kesehatans]);
    }

    public function update(Request $request, $id_ka)
    {
        $this->validate($request, [
            'penyakit'      =>  'required',
            'tindakan'      =>  'required',
            'keterangan'    =>  'required',
            'kesimpulan_ka' =>  'required'
        ]);

        DB::table('kesehatan_anaks')
            ->where('id_ka', $id_ka)
            ->update([
                'penyakit'      =>  $request->penyakit,
                'tindakan'      =>  $request->tindakan,
                'keterangan'    =>  $request->keterangan,
                'kesimpulan_ka' =>  $request->kesimpulan_ka
            ]);
    return redirect('/datakesehatananak')->with('success', 'Data kesehatan anak berhasil diubah');
    }

    public function destroy($id_ka)
    {
        $kaders = DB::table('kesehatan_anaks')->where('id_ka', $id_ka)->delete();
    return redirect('/datakesehatananak')->with('delete', 'Data kesehatan anak berhasil dihapus');
    }
}
