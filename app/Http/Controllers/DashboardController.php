<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
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
        return view('admin.dashboard.index', compact('salam'));
    }
}
