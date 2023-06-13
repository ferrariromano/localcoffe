<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $staff = DB::table('staff')->count();
        $karyawan = DB::table('karyawan')->count();
        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        // Tampilkan jadwal panen yang akan datang pada saat hari H-1
        // $jadwal_panen = DB::table('jadwal_panen') ->select('tanggal', 'deskripsi')->whereDate('tanggal', '=', date('Y-m-d', strtotime('+1 day')))->get();
        // $jadwal_pascapanen = DB::table('jadwal_pascapanen') ->select('tanggal', 'deskripsi')->whereDate('tanggal', '=', date('Y-m-d', strtotime('+1 day')))->get();

        return view('home',compact('staff','users','user_activity_logs','activity_logs'));
        // 'jadwal_panen','jadwal_pascapanen'
    }
}
