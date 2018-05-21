<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class AdmPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$users = DB::table('users')->orderBy('id', 'dcs')->get();
        return view('vendor.adminlte.admin.petugas', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'    =>  'required',
            'email'      =>  'required',
            'password'      =>  'required'
        ]);

        DB::table('users')->insert([
            'name'    =>  $request->name,
            'email'      =>  $request->email,
            'password'      =>  $request->password
        ]);

        return redirect('/admin/petugas');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    =>  'required',
            'password'      =>  'required',
            'email'         =>  'required'
        ]);

        DB::table('users')
            ->where('id', $id)
            ->update([
                'name'    =>  $request->name,
                'password'      =>  $request->password,
                'email'         =>  $request->email
            ]);
    return redirect('/admin/petugas')->with('success', 'Data kader berhasil diubah');
    }

    public function destroy($id)
    {
        // $kaders = DB::table('kaders')->where('id_kader', $id_kader)->first();
        // $kaders = DB::delete('DELETE FROM kaders WHERE id_kader = ?', [$id_kader]);
        $kaders = DB::table('users')->where('id', $id)->delete();
    return redirect('/admin/petugas')->with('delete', 'Data kader berhasil dihapus');
    }
}
