<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use Illuminate\Http\Request;

class DataObatController extends Controller
{
    //
    public function index()
    {
        $obat = DataObat::all();

        return view('admin.dataobat.index', compact('obat'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'kode' => ['required', 'unique:dataobat,kode', 'min:6', 'max:6'],
            'nama_obat' => ['required'],
        ],
        [
            'kode.unique' => "Kode sudah terdaftar",
            'kode.min' => "Kode minimal 6 digit",
            'kode.max' => "Kode maksimal 6 digit",
        ]);
        try {
            $pasien = new DataObat;
            $pasien->kode = $request->kode;
            $pasien->nama_obat = $request->nama_obat;
            $pasien->save();

            return redirect()->route('dataobat.index')->with('success','Data obat telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('dataobat.index')->with('info',$th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => ['required'],
        ]);
        try {
            DataObat::where('id', $id)->update([
                'kode' => $request->kode,
                'nama_obat' => $request->nama_obat,
            ]);

            return redirect()->route('dataobat.index')->with('success','Data obat berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('dataobat.index')->with('info',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DataObat::where('id', $id)->delete();
            return redirect()->route('dataobat.index')->with('success','Data obat berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('dataobat.index')->with('info',$th->getMessage());
        }
    }
}
