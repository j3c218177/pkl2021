<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Suratkeluar;

class SuratKeluarController extends Controller
{
    public function data()
    {
        $suratkeluars = DB::table('suratkeluars')->get();
        return view('suratkeluar.data',['suratkeluars' => $suratkeluars]);
    	//return view('suratkeluar/data');
    }

    public function add()
    {
    	return view('suratkeluar/add');
    }

    public function addProcessing(Request $request)
    {
    	$validateData = $request->validate([
            'tanggal_keluar' => '',
            'nomor_dan_tanggal' => 'required',
            'jenis_surat' => 'required',            
            'jawaban' => 'required',
            'ditujukan' => 'required',
            'hal' => 'required',
            'lampiran' => 'required',
            'bidang_dan_pj' => 'required',
            'pengetik' => 'required',
            'tindak_lanjut' => 'required',
            'arsip' => 'required',
            'note' => 'required',
            'kode_surat' => 'required'
        ], [
            'nomor_dan_tanggal' => 'Nomor dan Tanggal Harus Diisi',
            'jenis_surat' => 'Tanggal Harus Diisi',            
            'jawaban' => 'Jawaban Harus Diisi',
            'ditujukan' => 'Ditujukan Harus Diisi',
            'hal' => 'Hal Harus Diisi',
            'lampiran' => 'Lampiran Harus Diisi',
            'bidang_dan_pj' => 'Bidang dan PJ Harus Diisi',
            'pengetik' => 'Pengetik Harus Diisi',
            'tindak_lanjut' => 'Tindak Lanjut Harus Diisi',
            'arsip' => 'Arsip Harus Diisi',
            'note' => 'Note Harus Diisi',
            'kode_surat' => 'Kode Surat Harus Diisi'
        ]);

        //menyimpan lampiran
        if(!empty($request->lampiran)) {
            $lampirans = $request->lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratkeluar',$namalampiran);
        }
        else{
            $namalampiran = '-';
        }

        DB::table('suratkeluars')->insert([
            'tanggal_keluar' => $request->tanggal_keluar,
            'nomor_dan_tanggal' => $request->nomor_dan_tanggal,
            'jenis_surat' => $request->jenis_surat,            
            'jawaban' => $request->jawaban,
            'ditujukan' => $request->ditujukan,
            'hal' => $request->hal,
            'lampiran' => $namalampiran,
            'bidang_dan_pj' => $request->bidang_dan_pj,
            'pengetik' => $request->pengetik,
            'tindak_lanjut' => $request->tindak_lanjut,
            'arsip' => $request->arsip,
            'note' => $request->note,
            'kode_surat' => $request->kode_surat,
            'id_pengedit' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // suratkeluar::create($validateData);
        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('suratkeluar')->with('pesan', 'Data berhasil ditambah');
    }

    public function edit($suratkeluar)
    {
        $result=Suratkeluar::find($suratkeluar);
        return view('suratkeluar.edit',['suratkeluar'=>$result]);
    }

    public function update(Request $request, $suratkeluar)
    {
        $validateData = $request->validate([
            'tanggal_keluar' => '',
            'nomor_dan_tanggal' => 'required',
            'jenis_surat' => 'required',            
            'jawaban' => 'required',
            'ditujukan' => 'required',
            'hal' => 'required',
            'lampiran' => '',
            'bidang_dan_pj' => 'required',
            'pengetik' => 'required',
            'tindak_lanjut' => 'required',
            'arsip' => 'required',
            'note' => 'required',
            'kode_surat' => 'required'
        ], [
            'nomor_dan_tanggal' => 'Nomor dan Tanggal Harus Diisi',
            'jenis_surat' => 'Tanggal Harus Diisi',            
            'jawaban' => 'Jawaban Harus Diisi',
            'ditujukan' => 'Ditujukan Harus Diisi',
            'hal' => 'Hal Harus Diisi',
            'lampiran' => 'Lampiran Harus Diisi',
            'bidang_dan_pj' => 'Bidang dan PJ Harus Diisi',
            'pengetik' => 'Pengetik Harus Diisi',
            'tindak_lanjut' => 'Tindak Lanjut Harus Diisi',
            'arsip' => 'Arsip Harus Diisi',
            'note' => 'Note Harus Diisi',
            'kode_surat' => 'Kode Surat Harus Diisi'
        ]);

        //menyimpan lampiran
        if(!empty($request->lampiran)) {
            $lampirans = $request->lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratkeluar',$namalampiran);
            $dihapus = DB::table('suratkeluars')->where('id', $suratkeluar)->value('lampiran');
            if(file_exists($dihapus)) {
                unlink(public_path('/file/suratkeluar/'.$dihapus));
            }
        }
        else{
            $namalampiran = DB::table('suratkeluars')->where('id', $suratkeluar)->value('lampiran');
        }

        DB::table('suratkeluars')->where('id', $suratkeluar)
        ->update([
            'tanggal_keluar' => $request->tanggal_keluar,
            'nomor_dan_tanggal' => $request->nomor_dan_tanggal,
            'jenis_surat' => $request->jenis_surat,            
            'jawaban' => $request->jawaban,
            'ditujukan' => $request->ditujukan,
            'hal' => $request->hal,
            'lampiran' => $namalampiran,
            'bidang_dan_pj' => $request->bidang_dan_pj,
            'pengetik' => $request->pengetik,
            'tindak_lanjut' => $request->tindak_lanjut,
            'arsip' => $request->arsip,
            'note' => $request->note,
            'kode_surat' => $request->kode_surat,
            'id_pengedit' => Auth::id(),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // suratkeluar::where('id',$suratkeluar->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('suratkeluar')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Suratkeluar $suratkeluar)
    {
        $suratkeluar->delete();
        return redirect('suratkeluar')->with('pesan','Data berhasil dihapus');
    }
}
