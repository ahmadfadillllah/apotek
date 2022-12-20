<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\ResepObat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardPasienController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set("Asia/Makassar");
        $jam = date('H:i');
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Selamat Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Selamat Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Selamat Sore';
        } else {
            $salam = 'Selamat Malam';
        }
        return view('pasien.index', compact('salam'));
    }

    public function cari(Request $request)
    {
        $pasien = DataPasien::with('antrian','resep', 'keluhan')->where('nik_ktp', $request->nik_ktp)->first();;

        $time = date_diff(Carbon::create($pasien->keluhan->start_date), Carbon::now());

        if(empty($pasien->nik_ktp)){
            return redirect()->back()->with('info', 'NIK KTP belum registrasi');
        }

        return view('pasien.show', compact('pasien', 'time'));
    }
}
