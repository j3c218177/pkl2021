<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notulenrapat;

class DaftarNotulenRapatController extends Controller
{
    public function data()
    {
    	$notulenrapats = DB::table('notulenrapats')->get();
        return view('daftarnotulenrapat.data',['notulenrapats' => $notulenrapats]);
        // $dihapus = DB::table('notulenrapats')->where('id', '10')->value('file_notulen');
        // echo '<pre>';
        // var_dump($dihapus);
        //return view('daftarnotulenrapat/data');
    }

    public function add()
    {
    	return view('daftarnotulenrapat/add');
    }

    public function addProcessing(Request $request)
    {
    	$validateData = $request->validate([
            'tanggal' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'file_notulen' => ''
        ], [
            'tanggal.required' => 'Tanggal Harus Diisi',
            'tempat.required' => 'Tempat Harus Diisi',
            'agenda.required' => 'Agenda Harus Diisi',
            'file_notulen.required' => 'File Notulen Harus Diisi'
        ]);

        //menyimpan file
        if(!empty($request->file_notulen)) {
            $notulens = $request->file_notulen;
            $namanotulen = time().rand(100,999).".".$notulens->getClientOriginalExtension();
            $notulens->move(public_path().'/file/notulenrapat',$namanotulen);
        }
        else{
            $namanotulen = '-';
        }

        DB::table('notulenrapats')->insert([
            'tanggal' => $request->tanggal, 
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'file_notulen' => $namanotulen,
            'id_pengedit' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('daftarnotulenrapat')->with('pesan', 'Data berhasil ditambah');
    }

    public function edit($notulenrapat)
    {
        $result = Notulenrapat::find($notulenrapat);
        return view('daftarnotulenrapat.edit',['notulenrapat'=>$result]);
    }

    public function update(Request $request, $notulenrapat)
    {
        $validateData = $request->validate([
            'tanggal' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'file_notulen' => ''
            ], [
                'tanggal.required' => 'Tanggal Harus Diisi',
                'tempat.required' => 'Tempat Harus Diisi',
                'agenda.required' => 'Agenda Harus Diisi',
                'file_notulen.required' => 'File Notulen Harus Diisi'
            ]);

        //menyimpan file
        if(!empty($request->file_notulen)) {
            $notulens = $request->file_notulen;
            $namanotulen = time().rand(100,999).".".$notulens->getClientOriginalExtension();
            $notulens->move(public_path().'/file/notulenrapat',$namanotulen);
            $dihapus = DB::table('notulenrapats')->where('id', $notulenrapat)->value('file_notulen');
            if(file_exists($dihapus)) {
                unlink(public_path('/file/notulenrapat/'.$dihapus));
            }
        }
        else {
            $namanotulen = DB::table('notulenrapats')->where('id', $notulenrapat)->value('file_notulen');
        }

        DB::table('notulenrapats')->where('id', $notulenrapat)
        ->update([
            'tanggal' => $request->tanggal, 
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'file_notulen' => $namanotulen,
            'id_pengedit' => Auth::id(),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('daftarnotulenrapat')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Notulenrapat $notulenrapat)
    {
        $notulenrapat->delete();
        return redirect('daftarnotulenrapat')->with('pesan','Data berhasil dihapus');
    }
}
