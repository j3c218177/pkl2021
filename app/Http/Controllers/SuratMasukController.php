<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Suratmasuk;
use App\User;
use App\Mail\Disposisi;

class SuratMasukController extends Controller
{
    public function data()
    {
        $suratmasuks = DB::table('suratmasuks')->get();
        return view('suratmasuk.data',['suratmasuks' => $suratmasuks]);
    	//return view('suratmasuk/data');
    }

    public function add()
    {
        $users = User::all();
    	return view('suratmasuk/add', compact('users'));
    }

    public function addProcessing(Request $request)
    {        
    	$request->validate([
            'tanggal_diterima' => 'required',
            'nomor_dan_tanggal' => 'required',
            'jenis_surat' => 'required',            
            'pengirim' => 'required',
            'ditujukan' => 'required',
            'hal' => 'required',
            'lampiran' => 'required',
            'bidang_dan_pj' => 'required',
            'penerima' => 'required',
            'penyerahan' => 'required',
            'tindak_lanjut' => 'required',
            'teruskan' => 'required',
            'arsip' => 'required',
            'note' => 'required',
            'kode_surat' => 'required'
        ], [
            'tanggal_diterima' => 'Tanggal Terima Harus Diisi',
            'nomor_dan_tanggal' => 'Nomor dan Tanggal Harus Diisi',
            'jenis_surat' => 'Tanggal Harus Diisi',            
            'pengirim' => 'Pengirim Harus Diisi',
            'ditujukan' => 'Ditujukan Harus Diisi',
            'hal' => 'Hal Harus Diisi',
            'lampiran' => 'Lampiran Harus Diisi',
            'bidang_dan_pj' => 'Bidang dan PJ Harus Diisi',
            'penerima' => 'Penerima Harus Diisi',
            'penyerahan' => 'Penyerahan Harus Diisi',
            'tindak_lanjut' => 'Tindak Lanjut Harus Diisi',
            'arsip' => 'Arsip Harus Diisi',
            'note' => 'Note Harus Diisi',
            'kode_surat' => 'Kode Surat Harus Diisi'
        ]);
        
        //menyimpan lampiran
        if(!empty($request->lampiran)) {
            $lampirans = $request->lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratmasuk',$namalampiran);
        }
        else{
            $namalampiran = '-';
        }
        
        DB::table('suratmasuks')->insert([
            'tanggal_diterima' => $request->tanggal_diterima,
            'nomor_dan_tanggal' => $request->nomor_dan_tanggal,
            'jenis_surat' => $request->jenis_surat,            
            'pengirim' => $request->pengirim,
            'ditujukan' => $request->ditujukan,
            'hal' => $request->hal,
            'lampiran' => $namalampiran,
            'bidang_dan_pj' => $request->bidang_dan_pj,
            'penerima' => $request->penerima,
            'penyerahan' => $request->penyerahan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'teruskan' => implode(", ", $request->teruskan),
            'arsip' => $request->arsip,
            'note' => $request->note,
            'kode_surat' => $request->kode_surat,
            'id_pengedit' => Auth::id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //kirim email
        $emails = $request->teruskan;
        $details = [
            'title' => 'Surat Masuk Biofarmaka',
            'body' => 'Kepada Bapak/Ibu Yth. Mohon untuk mengurus tindak lanjut surat ini.',
            'lampiran' => $namalampiran
        ];
        // \Mail::to('avicenna_333@apps.ipb.ac.id', [], function($details) use ($emails)
        // {    
        //     $details->to($emails);
        // });
            //->send(new Disposisi($details));
        Mail::to($emails)->send(new Disposisi($details));

        // suratmasuk::create($validateData);
        // $request->session()->flash('pesan',"Data berhasil dimasukan");
        return redirect('suratmasuk')->with('pesan', 'Data berhasil ditambah');
    }

    public function edit($suratmasuk)
    {
        $result= Suratmasuk::find($suratmasuk);
        $users = User::all();
        return view('suratmasuk.edit',['suratmasuk'=>$result, 'users'=>$users]);
    }

    public function update(Request $request, $suratmasuk)
    {
        $request->validate([
            'tanggal_diterima' => 'required',
            'nomor_dan_tanggal' => 'required',
            'jenis_surat' => 'required',            
            'pengirim' => 'required',
            'ditujukan' => 'required',
            'hal' => 'required',
            'lampiran' => '',
            'bidang_dan_pj' => 'required',
            'penerima' => 'required',
            'penyerahan' => 'required',
            'tindak_lanjut' => 'required',
            'teruskan' => 'required',
            'arsip' => 'required',
            'note' => 'required',
            'kode_surat' => 'required'
        ], [
            'tanggal_diterima' => 'Tanggal Terima Harus Diisi',
            'nomor_dan_tanggal' => 'Nomor dan Tanggal Harus Diisi',
            'jenis_surat' => 'Tanggal Harus Diisi',            
            'pengirim' => 'Pengirim Harus Diisi',
            'ditujukan' => 'Ditujukan Harus Diisi',
            'hal' => 'Hal Harus Diisi',
            'lampiran' => 'Lampiran Harus Diisi',
            'bidang_dan_pj' => 'Bidang dan PJ Harus Diisi',
            'penerima' => 'Penerima Harus Diisi',
            'penyerahan' => 'Penyerahan Harus Diisi',
            'tindak_lanjut' => 'Tindak Lanjut Harus Diisi',
            'teruskan' => 'Teruskan harus diisi',
            'arsip' => 'Arsip Harus Diisi',
            'note' => 'Note Harus Diisi',
            'kode_surat' => 'Kode Surat Harus Diisi'
        ]);        
        
        //menyimpan lampiran
        if(!empty($request->lampiran)) {
            $lampirans = $request->lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratmasuk',$namalampiran);
            $dihapus = DB::table('suratmasuks')->where('id', $suratmasuk)->value('lampiran');
            if(file_exists($dihapus)) {
                unlink(public_path('/file/suratmasuk/'.$dihapus));
            }
        }
        else {
            $namalampiran = DB::table('suratmasuks')->where('id', $suratmasuk)->value('lampiran');
        }

        DB::table('suratmasuks')->where('id', $suratmasuk)
        ->update([
            'tanggal_diterima' => $request->tanggal_diterima,
            'nomor_dan_tanggal' => $request->nomor_dan_tanggal,
            'jenis_surat' => $request->jenis_surat,            
            'pengirim' => $request->pengirim,
            'ditujukan' => $request->ditujukan,
            'hal' => $request->hal,
            'lampiran' => $namalampiran,
            'bidang_dan_pj' => $request->bidang_dan_pj,
            'penerima' => $request->penerima,
            'penyerahan' => $request->penyerahan,
            'tindak_lanjut' => $request->tindak_lanjut,
            'teruskan' => implode(", ", $request->teruskan),
            'arsip' => $request->arsip,
            'note' => $request->note,
            'kode_surat' => $request->kode_surat,
            'id_pengedit' => Auth::id(),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //kirim email
        $emails = $request->teruskan;
        $details = [
            'title' => 'Surat Masuk Biofarmaka',
            'body' => 'Kepada Bapak/Ibu Yth. Mohon untuk mengurus tindak lanjut surat ini.',
            'lampiran' => $namalampiran
        ];
        Mail::to($emails)->send(new Disposisi($details));

        // suratmasuk::where('id',$suratmasuk->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('suratmasuk')->with('pesan', 'Data berhasil diperbarui');
    }

    public function delete(Suratmasuk $suratmasuk)
    {
        $suratmasuk->delete();
        return redirect('suratmasuk')->with('pesan','Data berhasil dihapus');
    }
}
