<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Hadirrapat;
use App\User;

class DaftarHadirRapatController extends Controller
{
    public function data()
    {
    	$hadirrapats = DB::table('hadirrapats')->get();
        return view('daftarhadirrapat.data',['hadirrapats' => $hadirrapats]);
        //return view('daftarhadirrapat/data');
    }

    public function add()
    {
        $users = User::all();
        // return $users;
    	return view('daftarhadirrapat/add', compact('users'));
    }

    public function addProcessing(Request $request)
    {
    	$validateData = $request->validate([
            'keterangan' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
            'tempat' => 'required',            
            'yang_hadir' => 'required'
        ], [            
            'keterangan.required' => 'Keterangan harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'pukul.required' => 'Pukul harus diisi',
            'tempat.required' => 'Tempat harus diisi',
            'yang_hadir.required' => 'Yang hadir harus diisi'
        ]);

        DB::table('hadirrapats')->insert([
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'pukul' => $request->pukul,
            'tempat' => $request->tempat,
            'yang_hadir' => implode(", ", $request->yang_hadir),
            'id_pengedit' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // hadirrapat::create($validateData);
        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('daftarhadirrapat')->with('pesan', 'Data berhasil ditambah');
    }

    public function edit($hadirrapat)
    {
        $result = Hadirrapat::find($hadirrapat);
        $users = User::all();
        return view('daftarhadirrapat.edit',['hadirrapat'=>$result,'users'=>$users]);
    }

    public function update(Request $request, $hadirrapat)
    {
        $validateData = $request->validate([
            'keterangan' => 'required',
            'tanggal' => 'required',
            'pukul' => 'required',
            'tempat' => 'required',            
            'yang_hadir' => 'required'
        ], [
            'keterangan.required' => 'Keterangan harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'pukul.required' => 'Pukul harus diisi',
            'tempat.required' => 'Tempat harus diisi',
            'yang_hadir.required' => 'Yang hadir harus diisi'
        ]);
    
        DB::table('hadirrapats')->where('id', $hadirrapat)
        ->update([
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'pukul' => $request->pukul,
            'tempat' => $request->tempat,
            'yang_hadir' => implode(", ", $request->yang_hadir),
            'id_pengedit' => Auth::id(),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // hadirrapat::where('id',$hadirrapat->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('daftarhadirrapat')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Hadirrapat $hadirrapat)
    {
        $hadirrapat->delete();
        return redirect('daftarhadirrapat')->with('pesan','Data berhasil dihapus');
    }
}
