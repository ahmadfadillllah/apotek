<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DataPasien;
use App\Models\Keluhan;
use App\Models\ResepObat;
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    //
    public function index()
    {
        $pasien = DataPasien::with('antrian')->get();

        return view('admin.datapasien.index', compact('pasien'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nik_ktp' => ['required', 'unique:datapasien,nik_ktp'],
            'nama_lengkap' => ['required'],
            'nohp' => ['required', 'min:11', 'max:13'],
            'umur' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required'],
            'poli' => ['required'],
        ],
        [
            'nik_ktp.unique' => "NIK KTP sudah terdaftar",
            'nohp.min' => "No. Handphone minimal 11 digit",
            'nohp.max' => "No. Handphone maksimal 13 digit",
            'poli.required' => "Pilih salah satu poli",
        ]);
        try {
            $pasien = new DataPasien;
            $pasien->nik_ktp = $request->nik_ktp;
            $pasien->nama_lengkap = $request->nama_lengkap;
            $pasien->nohp = $request->nohp;
            $pasien->umur = $request->umur;
            $pasien->tempat_lahir = $request->tempat_lahir;
            $pasien->tanggal_lahir = $request->tanggal_lahir;
            $pasien->alamat = $request->alamat;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->poli = $request->poli;
            $pasien->save();

            $request->request->add(['pasien_id' => $pasien->id, 'start_date' => $pasien->updated_at]);
            Antrian::create($request->all());
            Keluhan::create($request->all());

            return redirect()->route('datapasien.index')->with('success','Pasien telah ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('datapasien.index')->with('info',$th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => ['required'],
            'nohp' => ['required', 'min:11', 'max:13'],
            'umur' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required'],
            'poli' => ['required'],
        ],
        [
            'nohp.min' => "No. Handphone minimal 11 digit",
            'nohp.max' => "No. Handphone maksimal 13 digit",
            'poli.required' => "Pilih salah satu poli",
        ]);
        try {
            DataPasien::where('id', $id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nohp' => $request->nohp,
                'umur' => $request->umur,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'poli' => $request->poli,
            ]);

            return redirect()->route('datapasien.index')->with('success','Pasien berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('datapasien.index')->with('info',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DataPasien::where('id', $id)->delete();
            return redirect()->route('datapasien.index')->with('success','Pasien berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('datapasien.index')->with('info',$th->getMessage());
        }
    }

    public function antrian($pasien_id)
    {
        $data_antrian = Antrian::whereNotNull('no_antrian')->count();
        $no_antrian = $data_antrian + 1;

        try {
            Antrian::where('pasien_id', $pasien_id)->update(['no_antrian' => $no_antrian]);

            return redirect()->route('datapasien.index')->with('success','No. Antrian telah diambil');
        } catch (\Throwable $th) {
            return redirect()->route('datapasien.index')->with('info',$th->getMessage());
        }
    }
}
