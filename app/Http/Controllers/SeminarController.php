<?php

namespace App\Http\Controllers;

use App\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Usermodel;
use App\User;


class SeminarController extends Controller
{
    public function data()
    {
        if (Gate::allows('isAnggota')) {
            $seminars = Seminar::with('user')->where('id_pengedit',Auth::id())->get();
            // $seminars = DB::table('seminars')->where('id_pengedit',Auth::id())->paginate();
            // $seminars = DB::table('seminars')
            // ->select('nama', 'nama_pelatihan', 'tempat', 'waktu', 'penyelenggara', 'tahun', 'ln_dn', 'id_pengedit AS user_id')
            // ->join('users', 'users.id', '=', 'seminars.id_pengedit')->paginate();
            // // ->join('users', 'users.id', '=', 'seminars.id_pengedit')
            return view('seminar/data', compact('seminars'));
            //return view('seminar/data');
            // return User::find(1);
            // echo "<pre>";
            // print_r($seminars);
        }
        else {
            $seminars = Seminar::with('user')->get();
            // $seminars = DB::table('seminars')//->select('nama', 'nama_pelatihan', 'tempat', 'waktu', 'penyelenggara', 'tahun', 'ln_dn', 'id_pengedit AS user_id')
            // ->join('users', 'users.id', '=', 'seminars.id_pengedit')
            // ->paginate();
            return view('seminar/data', compact('seminars'));
            // return User::find(1);
            // echo "<pre>";
            // print_r($seminars);
        }
    }

    public function add()
    {
    	return view('seminar/add');
    }

    public function addProcessing(Request $request)
    {
    	$validateData = $request->validate([
            'nama' => 'required',
            'nama_pelatihan' => 'required',
            'tempat' => 'required',            
            'waktu' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
            'ln_dn' => 'required'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nama_pelatihan.required' => 'Nama Seminar Harus Diisi',
            'tempat.required' => 'Tempat Harus Diisi',
            'waktu.required' => 'Waktu Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi',
            'tahun.required' => 'Tahun Harus Diisi',
            'ln_dn.required' => 'Ln/Dn Harus Diisi'
        ]);
    
        DB::table('seminars')->insert([
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

        // seminar::create($validateData);
        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('seminars')->with('pesan', 'Data berhasil diperbarui');
    }

    public function edit($seminar)
    {
        $result=Seminar::find($seminar);
        return view('seminar.edit',['seminar'=>$result]);
        // echo "<pre>";
        // print_r($result);
    }

    public function update(Request $request, $seminar)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nama_pelatihan' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'penyelenggara' => 'required',
            'tahun' => 'required',
            'ln_dn' => 'required'
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nama_pelatihan.required' => 'Nama Seminar Harus Diisi',
            'tempat.required' => 'Tempat Harus Diisi',
            'waktu.required' => 'Waktu Harus Diisi',
            'penyelenggara.required' => 'Penyelenggara Harus Diisi',
            'tahun.required' => 'Tahun Harus Diisi',
            'ln_dn.required' => 'Ln/Dn Harus Diisi'
        ]);

        DB::table('seminars')->where('id', $seminar)
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

        // seminar::where('id',$seminar->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('seminars')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Seminar $seminar)
    {
        $seminar->delete();
        return redirect('seminars')->with('pesan','Data berhasil dihapus');
    }
}
