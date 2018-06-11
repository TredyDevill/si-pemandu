<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class DatasasaranController extends Controller
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
    	$sasarans = DB::table('data_sasarans')->orderBy('id_sasaran', 'desc')->get();
    	return view('adminlte::datasasaran', ['sasarans' => $sasarans]);
    }

    public function update(Request $request, $id_sasaran)
    {
        $this->validate($request, [
            'nama_posyandu'    		  =>  'required',
            'total_sasaran_anak'      =>  'required',
            'total_sasaran_anak_baru' =>  'required',
            'total_laki_laki'         =>  'required',
            'total_perempuan'         =>  'required',
            'tgl'           		  =>  'required',
            'id_kader'        		  =>  'required'
        ]);

        DB::table('data_sasarans')
            ->where('id_sasaran', $id_sasaran)
            ->update([
                'nama_posyandu'    		  =>  $request->nama_posyandu,
                'total_sasaran_anak'      =>  $request->total_sasaran_anak,
                'total_sasaran_anak_baru' =>  $request->total_sasaran_anak_baru,
                'total_laki_laki'         =>  $request->total_laki_laki,
                'total_perempuan'         =>  $request->total_perempuan,
                'tgl'           		  =>  $request->tgl,
                'id_kader'        		  =>  $request->id_kader
            ]);
    return redirect('/datasasaran')->with('success', 'Data sasaran berhasil diubah');
    }

    public function destroy($id_sasaran)
    {
        $sasarans = DB::table('data_sasarans')->where('id_sasaran', $id_sasaran)->delete();
    return redirect('/datasasaran')->with('delete', 'Data sasaran berhasil dihapus');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_posyandu'    		  =>  'required',
            'total_sasaran_anak'      =>  'required',
            'total_sasaran_anak_baru' =>  'required',
            'total_laki_laki'         =>  'required',
            'total_perempuan'         =>  'required',
            'tgl'           		  =>  'required',
            'id_kader'        		  =>  'required'
        ]);

        DB::table('data_sasarans')->insert([
            'nama_posyandu'    		  =>  $request->nama_posyandu,
                'total_sasaran_anak'      =>  $request->total_sasaran_anak,
                'total_sasaran_anak_baru' =>  $request->total_sasaran_anak_baru,
                'total_laki_laki'         =>  $request->total_laki_laki,
                'total_perempuan'         =>  $request->total_perempuan,
                'tgl'           		  =>  $request->tgl,
                'id_kader'        		  =>  $request->id_kader
        ]);

        return redirect('/datasasaran');
    }
}
