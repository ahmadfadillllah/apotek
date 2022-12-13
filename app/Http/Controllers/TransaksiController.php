<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itemset;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        return view('admin.transaksi.index');
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        try {
            Itemset::create([
                'tanggal' => $request->tanggal,
                'item' => $request->item,
            ]);

            return redirect()->back()->with('success', 'Data telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Data gagal ditambahkan');
        }
    }
}
