<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $workshops = DB::table('workshops')->get(); 
        $lokakaryas = DB::table('lokakaryas')->get();       
        $suratmasuks = DB::table('suratmasuks')->get();
        $suratkeluars = DB::table('suratkeluars')->get();
        $seminars = DB::table('seminars')->get();
        $notulenrapats = DB::table('notulenrapats')->get();
        $hasilkegiatans = DB::table('hasilkegiatans')->get();
        $hadirrapats = DB::table('hadirrapats')->get();
        return view('home', compact('workshops', 'lokakaryas','suratmasuks','suratkeluars','seminars','notulenrapats','hasilkegiatans','hadirrapats'));      
        // return view('home', compact('lokakaryas'));               
    }
}
