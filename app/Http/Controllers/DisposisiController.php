<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisposisiController extends Controller
{
    public function data($id)
    {
    	$disposisis = DB::table('disposisis')->where('suratmasuk_id',$id)->get();
        $idsurat = $id;
        return view('disposisi.data', compact('disposisis', 'idsurat'));
    }

    public function add($id)
    {
        $idsurat = $id;
    	return view('disposisi/add', compact('idsurat'));
        // print_r($iddisposisi);
    }

    public function addProcessing(Request $request, $id)
    {
        // DB::table('disposisis')->where('suratmasuk_id',$iddisposisi)->delete();

    	$validateData = $request->validate([
            'catatan_disposisi' => 'required',
            'tanggal_verifikasi' => 'required',
            'verifikasi' => 'required',           
            'disposisi_lampiran' => 'required'
        ], [
            'catatan_disposisi' => 'Catatan Harus Diisi',
            'tanggal_verifikasi' => 'Tanggal Harus Diisi',
            'verifikasi' => 'Verifikasi Harus Diisi',
            'disposisi_lampiran' => 'Lampiran Harus Diisi'
        ]);

        //menyimpan lampiran
        if(!empty($request->disposisi_lampiran)) {
            $lampirans = $request->disposisi_lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratmasuk/disposisi',$namalampiran);
        }
        else{
            $namalampiran = '-';
        }

        
        $tabel = DB::table('disposisis')->where('suratmasuk_id', $id)->value('suratmasuk_id');
        DB::table('disposisis')->insert([
            'catatan_disposisi' => $request->catatan_disposisi,
            'tanggal_verifikasi' => $request->tanggal_verifikasi,
            'verifikasi' => $request->verifikasi,
            'suratmasuk_id' => $id,
            'disposisi_lampiran' => $namalampiran
        ]);
        
        return redirect('disposisi/view/'.$tabel)->with('pesan', 'Disposisi berhasil ditambah');
    }

    public function edit($id)
    {
        $disposisis = DB::table('disposisis')->where('id', $id)->first();
        return view('disposisi.edit',['disposisi'=>$disposisis]);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'catatan_disposisi' => 'required',
            'tanggal_verifikasi' => 'required',
            'verifikasi' => 'required'           
            
        ], [
            'catatan_disposisi' => 'Catatan Harus Diisi',
            'tanggal_verifikasi' => 'Tanggal Harus Diisi',
            'verifikasi' => 'Verifikasi Harus Diisi'
            
        ]);

        //menyimpan lampiran
        if(!empty($request->disposisi_lampiran)) {
            $lampirans = $request->disposisi_lampiran;
            $namalampiran = time().rand(100,999).".".$lampirans->getClientOriginalExtension();
            $lampirans->move(public_path().'/file/suratmasuk/disposisi',$namalampiran);
            $dihapus = DB::table('disposisis')->where('id', $id)->value('disposisi_lampiran');
            if(file_exists($dihapus)) {
                unlink(public_path('/file/suratmasuk/disposisi/'.$dihapus));
            }
        }
        else{
            $namalampiran = DB::table('disposisis')->where('id', $id)->value('disposisi_lampiran');
        }

        $tabel = DB::table('disposisis')->where('id', $id)->value('suratmasuk_id');
        DB::table('disposisis')->where('id', $id)->update([
            'catatan_disposisi' => $request->catatan_disposisi,
            'tanggal_verifikasi' => $request->tanggal_verifikasi,
            'verifikasi' => $request->verifikasi,
            'disposisi_lampiran' => $namalampiran
        ]);

        // seminar::where('id',$seminar->id)->update($validateData);
        // $request->session()->flash('pesan',"Data berhasil diperbarui");
        return redirect('disposisi/view/'.$tabel)->with('pesan', 'Disposisi berhasil diperbarui');
    }

    public function delete($id)
    {
        $tabel = DB::table('disposisis')->where('id', $id)->value('suratmasuk_id');
        DB::table('disposisis')->where('id',$id)->delete();
        return redirect('disposisi/view/'.$tabel)->with('pesan', 'Disposisi Berhasil Dihapus');
    }

    //deprecated, pakai yg di kontroler suratnasuk dan folder mail saja
    public function sendNotification()
    {
        $user = User::first();
  
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification',
            'thanks' => 'Thank you!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
  
        Notification::send($user, new UserNotification($details));
   
        dd('done');
    }
}
