<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    public function data()
    {
        if (Gate::allows('isAnggota')) {
            $workshops = DB::table('workshops')->where('id_pengedit',Auth::id())->get();
            return view('workshop/data', compact('workshops'));
        }
        else {
            $workshops = DB::table('workshops')->get();
            return view('workshop/data', compact('workshops'));
        }
        // dd($workshops);
        // return $workshops;
    	// return view('workshop/data', ['workshops'=>$workshops]);
    }

    public function add()
    {
    	return view('workshop/add');
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

    	DB::table('workshops')->insert([
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
        return redirect('workshop')->with('status', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $workshop=DB::table('workshops')->where('id', $id)->first();
        // dd('workshops');
        return view('workshop/edit', compact('workshop'));
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

        DB::table('workshops')->where('id', $id)
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
        return redirect('workshop')->with('status', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        DB::table('workshops')->where('id',$id)->delete();
        return redirect('workshop')->with('status', 'Data Berhasil Dihapus');

    }
}
