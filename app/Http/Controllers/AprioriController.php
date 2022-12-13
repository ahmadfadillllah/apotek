<?php

namespace App\Http\Controllers;

use App\Models\Itemset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AprioriController extends Controller
{
    //
    public function index()
    {
        return view('admin.apriori.index');
    }

    public function proses(Request $request)
    {
        $support_absolute = $request->support;

        $start_date = Str::of($request->range)->before(' to');
        $end_date = Str::of($request->range)->after('to ');
        $num = Itemset::whereBetween('tanggal', [$start_date, $end_date])->count();

        if($num == 0){
            return redirect()->back()->with('info', 'Data tidak ada');
        }

        $support_relatif = ($request->support/$num) * 100;

        $confidence = $request->confidence;

        $range = $request->range;

        $item_list = $jumlah = array();

        $produk = Itemset::get()->pluck('item');
        $produk1 = explode(",", $produk);
        $produk1 = Str::replace('"', '', $produk1);
        $produk1 = Str::replace('[', '', $produk1);
        $produk1 = Str::replace(']', '', $produk1);

        foreach($produk1 as $item){
            $list_produk[] = $item;
        }

        $item_list = array_unique($list_produk);
        $jumlah = array_count_values($list_produk);
        // dd($jumlah);

        $data = [
            'produk' => $produk,
            'support_absolute' => $support_absolute,
            'support_relatif' => $support_relatif,
            'confidence' => $confidence,
            'range' => $range,
            'item_list' => $item_list,
            'jumlah' => $jumlah,
            'num' => $num,
        ];

        return view('admin.apriori.result', compact('data'));
    }
}
