<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class LokakaryaController extends Controller
{
    public function data()
    {
        if (Gate::allows('isAnggota')) {
            $lokakaryas = DB::table('lokakaryas')->where('id_pengedit',Auth::id())->get();
            return view('lokakarya/data', compact('lokakaryas'));
        }
        else {
            $lokakaryas = DB::table('lokakaryas')->get();
            return view('lokakarya/data', compact('lokakaryas'));
        }
        
        // dd($lokakarya);
        // return $workshops;
        // return view('workshop/data', ['workshops'=>$workshops]);
    }

    public function add()
    {
        return view('lokakarya/add');
    }

    public function addProcessing(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'nama_pelatihan' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
            'ln_dn' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nama_pelatihan.required' => 'Nama Workshop Harus Diisi',
            'tempat.required' => 'Tempat Harus Diisi',
            'waktu.required' => 'Waktu Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi',
            'tahun.required' => 'Tahun Harus Diisi',
            'ln_dn.required' => 'Ln/Dn Harus Diisi',
        ]);

        DB::table('lokakaryas')->insert([
            'nama' => $request->nama, 
            'nama_pelatihan' => $request->nama_pelatihan,
            'tempat' => $request->tempat,
            'waktu' => $request->waktu,
            'penyelenggara' => $request->penyelenggara,
            'tahun' => $request->tahun,
            'ln_dn' => $request->ln_dn,
            'id_pengedit' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('lokakarya')->with('status', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $lokakarya=DB::table('lokakaryas')->where('id', $id)->first();
        // dd('workshops');
        return view('lokakarya/edit', compact('lokakarya'));
    }

    public function editProcessing(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'nama_pelatihan' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
            'ln_dn' => 'required',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nama_pelatihan.required' => 'Nama Workshop Harus Diisi',
            'tempat.required' => 'Tempat Harus Diisi',
            'waktu.required' => 'Waktu Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi',
            'tahun.required' => 'Tahun Harus Diisi',
            'ln_dn.required' => 'Ln/Dn Harus Diisi',
        ]);

        DB::table('lokakaryas')->where('id', $id)
            ->update([
            'nama' => $request->nama, 
            'nama_pelatihan' => $request->nama_pelatihan,
            'tempat' => $request->tempat,
            'waktu' => $request->waktu,
            'penyelenggara' => $request->penyelenggara,
            'tahun' => $request->tahun,
            'ln_dn' => $request->ln_dn,
            'updated_at' => date('Y-m-d H:i:s')
            ]);
        return redirect('lokakarya')->with('status', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        DB::table('lokakaryas')->where('id',$id)->delete();
        return redirect('lokakarya')->with('status', 'Data Berhasil Dihapus');

    }
}
