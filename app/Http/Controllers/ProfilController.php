<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Profil;
use App\User;

class ProfilController extends Controller
{
    public function data()
    {
        $profils = DB::table('users')->get();
        return view('profil.data',['users' => $profils]);
        //return view('profil/data');
    }

    public function add()
    {
        if (Gate::allows('isMaster')) {
    	    return view('profil/add');
        }
        else {
            return redirect('profil/list')->with('pesan', 'Anda tidak berkuasa melakukan itu');
        }  
    }

    public function addProcessing(Request $request)
    {
    	DB::table('users')->insert([
            'name' => $request->name, 
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('profil/list')->with('pesan', 'Data berhasil dimasukan');
    }

    public function edit($profil)
    {
        if (Gate::allows('isMaster')) {
            $result=user::find($profil);
            return view('profil.edit',['profil'=>$result]);
        }
        else {
            return redirect('profil/list')->with('pesan', 'Anda tidak berkuasa melakukan itu');
        }        
    }

    public function update(Request $request, $profil)
    {
        DB::table('users')->where('id', $profil)->update([
                'name' => $request->name, 
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'updated_at' => date('Y-m-d H:i:s')]);

        return redirect('profil/list')->with('pesan', 'Data berhasil dimasukan');
    }

    public function delete(user $profil)
    {
        if (Gate::allows('isMaster')) {
            $profil->delete();
            return redirect('profil/list')->with('pesan','Data berhasil dihapus');
        }
        else {
            return redirect('profil/list')->with('pesan', 'Anda tidak berkuasa melakukan itu');
        }
    }

    public function me($profil)
    {
        //$profils = User::all();
        //return view('profil.me',['profils' => $profils]);
        //$users = DB::table('users')->get();
        //return view('profil/me', compact('users'));
        $result = user::find($profil);
        return view('profil.me',['users'=>$result]);
    }
}
