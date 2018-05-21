<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Petugas;

class PetugasController extends Controller
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
        $kaders = DB::table('kaders')->orderBy('id_kader', 'dsc')->get();
        return view('adminlte::petugas', ['kaders' => $kaders]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_admin'    =>  'required',
            'username'      =>  'required',
            'password'      =>  'required',
            'email'         =>  'required',
            'no_hp'         =>  'required',
            'bio'           =>  'required',
            'alamat'        =>  'required',
            'tgl_lahir'     =>  'required',
            'tgl_join'      =>  'required'
        ]);

        DB::table('kaders')->insert([
            'nama_admin'    =>  $request->nama_admin,
            'username'      =>  $request->username,
            'password'      =>  $request->password,
            'email'         =>  $request->email,
            'no_hp'         =>  $request->no_hp,
            'bio'           =>  $request->bio,
            'alamat'        =>  $request->alamat,
            'tgl_lahir'     =>  $request->tgl_lahir,
            'tgl_join'      =>  $request->tgl_join
        ]);

        return redirect('/petugas');
    }

    public function update(Request $request, $id_kader)
    {
        $this->validate($request, [
            'nama_admin'    =>  'required',
            'username'      =>  'required',
            'password'      =>  'required',
            'email'         =>  'required',
            'no_hp'         =>  'required',
            'bio'           =>  'required',
            'alamat'        =>  'required',
            'tgl_lahir'     =>  'required',
            'tgl_join'      =>  'required'
        ]);

        DB::table('kaders')
            ->where('id_kader', $id_kader)
            ->update([
                'nama_admin'    =>  $request->nama_admin,
                'username'      =>  $request->username,
                'password'      =>  $request->password,
                'email'         =>  $request->email,
                'no_hp'         =>  $request->no_hp,
                'bio'           =>  $request->bio,
                'alamat'        =>  $request->alamat,
                'tgl_lahir'     =>  $request->tgl_lahir,
                'tgl_join'      =>  $request->tgl_join
            ]);
    return redirect('/petugas')->with('success', 'Data kader berhasil diubah');
    }

    public function destroy($id_kader)
    {
        // $kaders = DB::table('kaders')->where('id_kader', $id_kader)->first();
        // $kaders = DB::delete('DELETE FROM kaders WHERE id_kader = ?', [$id_kader]);
        $kaders = DB::table('kaders')->where('id_kader', $id_kader)->delete();
    return redirect('/petugas')->with('delete', 'Data kader berhasil dihapus');
    }
}
