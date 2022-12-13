<?php

namespace App\Http\Controllers;

use App\Imports\ItemsetImport;
use App\Models\Itemset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date as FacadesDate;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;

class ItemsetController extends Controller
{
    //
    public function index()
    {
        $itemset = Itemset::all();
        return view('admin.itemset.index', compact('itemset'));

    }

    public function import(Request $request)
    {
        // dd($request->all());
        try {
            $date = date('Ymd His gis');
            Excel::import(new ItemsetImport,  $request->file('itemset'));
            $request->file('itemset')->move('admin/itemset/', $date.$request->file('itemset')->getClientOriginalName());

            return redirect()->back()->with('success', 'Berhasil mengimport data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gagal mengimport data');
        }
    }

    public function destroy($id)
    {
        try {
            Itemset::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gagal menghapus data');
        }
    }
}
