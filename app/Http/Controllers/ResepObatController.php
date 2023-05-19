<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DataObat;
use App\Models\DataPasien;
use App\Models\Keluhan;
use App\Models\ResepObat;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepObatController extends Controller
{
    //
    public function index()
    {
        // $pasien = Antrian::with('datapasien')->whereNotNull('no_antrian')->orderBy('no_antrian', 'asc')->get();

        if(Auth::user()->role != 'apoteker'){
            $pasien = DataPasien::with('antrian')->where('poli', Auth::user()->poli)->get();
        }
        $pasien = DataPasien::with('antrian')->get();
        // dd($pasien);
        return view('admin.resepobat.index', compact('pasien'));
    }

    public function resep(Request $request, $id)
    {
        $pasien = DataPasien::with('keluhan')->where('id', $id)->first();
        $time = date_diff(Carbon::create($pasien->keluhan->start_date), Carbon::now());

        $obat = ResepObat::join('dataobat', 'resepobat.dataobat_id', 'dataobat.id')
        ->select('resepobat.id', 'dataobat.kode', 'dataobat.nama_obat', 'resepobat.pemakaian')->where('pasien_id', $id)->get();

        $dataobat = DataObat::all();

        return view('admin.resepobat.show', compact('pasien','obat', 'dataobat', 'time'));
    }

    public function update(Request $request, $id)
    {
        try {
            ResepObat::where('id', $id)->update([
                'resep' => $request->resep,
            ]);

            return redirect()->route('resepobat.index')->with('success','Berhasil memberikan resep obat');
        } catch (\Throwable $th) {
            return redirect()->route('resepobat.index')->with('info',$th->getMessage());
        }
    }

    public function keluhan(Request $request, $pasien_id)
    {
        try {
            Keluhan::where('pasien_id', $pasien_id)->update([
                'keluhan' => $request->keluhan,
                'start_date' => Carbon::now(),
            ]);

            return redirect()->back()->with('success','Berhasil update keluhan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info',$th->getMessage());
        }
    }

    public function insert(Request $request, $pasien_id)
    {
        $request->validate([
            'dataobat_id' => ['required'],
            'pemakaian' => ['required'],
        ],[
            'dataobat_id.required' => 'Silahkan pilih obat'
        ]);
        try {
            $resep = new ResepObat;
            $resep->pasien_id = $pasien_id;
            $resep->dataobat_id = $request->dataobat_id;
            $resep->pemakaian = $request->pemakaian;
            $resep->save();

            return redirect()->back()->with('success','Resep telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info',$th->getMessage());
        }
    }

    public function hapusobat($id)
    {
        try {
            ResepObat::where('id', $id)->delete();

            return redirect()->back()->with('success','Berhasil menghapus resep obat');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info',$th->getMessage());
        }
    }

    public function destroy($pasien_id)
    {
        try {
            Antrian::where('pasien_id', $pasien_id)->update(['no_antrian' => NULL]);
            Keluhan::where('pasien_id', $pasien_id)->update(['keluhan' => NULL]);
            ResepObat::where('pasien_id', $pasien_id)->delete();

            return redirect()->route('datapasien.index')->with('success','Berhasil mengakhiri pasien');
        } catch (\Throwable $th) {
            return redirect()->back()->with('success',$th->getMessage());
        }
    }
}
