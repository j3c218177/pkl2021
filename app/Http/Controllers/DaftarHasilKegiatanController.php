<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Hasilkegiatan;
use App\User;

class DaftarHasilKegiatanController extends Controller
{
    public function data()
    {
    	$hasilkegiatans = DB::table('hasilkegiatans')->get();
        return view('daftarhasilkegiatan.data',['hasilkegiatans' => $hasilkegiatans]);
        //return view('daftarhasilkegiatan/data');
    }

    public function add()
    {        
        $users = User::all();
    	return view('daftarhasilkegiatan/add', compact('users'));
    }

    public function addProcessing(Request $request)
    {
    	$validateData = $request->validate([
            'tempat' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'ikut' => 'required'
        ], [
            'tempat.required' => 'Tempat harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'ikut.required' => 'Ikut harus diisi'
        ]);

        DB::table('hasilkegiatans')->insert([
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'ikut' => implode(", ", $request->ikut),
            'user_id' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // hasilkegiatan::create($validateData);
        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('daftarhasilkegiatan')->with('pesan', 'Data berhasil ditambah');
    }

    public function edit($hasilkegiatan)
    {
        $result = Hasilkegiatan::find($hasilkegiatan);
        $users = User::all();
        return view('daftarhasilkegiatan.edit',['hasilkegiatan'=>$result, 'users'=>$users]);
    }

    public function update(Request $request, $hasilkegiatan)
    {
        $validateData = $request->validate([
            'tempat' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'ikut' => 'required'
        ], [
            'tempat.required' => 'Tempat harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'ikut.required' => 'Ikut harus diisi'
        ]);
    
        DB::table('hasilkegiatans')->where('id', $hasilkegiatan)
        ->update([
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'ikut' => implode(", ", $request->ikut),
            'user_id' => Auth::id(),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // hasilkegiatan::where('id',$hasilkegiatan->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('daftarhasilkegiatan')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Hasilkegiatan $hasilkegiatan)
    {
        $hasilkegiatan->delete();
        return redirect('daftarhasilkegiatan')->with('pesan','Data berhasil dihapus');
    }
}
