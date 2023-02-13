<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', '!=', 'admin')->get();
        return view('admin.datauser.index', compact('user'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'required',
            'poli' => 'required',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'poli' => $request->poli,
                'avatar' => 'user.png',
            ]);

            return redirect()->back()->with('success', 'Berhasil mendaftarkan user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'role' => ['required'],
            'poli' => ['required'],
        ]);
        try {
            User::where('id', $id)->update([
                'name' => $request->name,
                'role' => $request->role,
                'poli' => $request->poli,
            ]);

            return redirect()->route('datauser.index')->with('success','User berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('datauser.index')->with('info',$th->getMessage());
        }
    }

    public function changepassword(Request $request, $id)
    {
        try {
            User::where('id', $id)->update([
                'password' => Hash::make('password123'),
            ]);

            return redirect()->route('datauser.index')->with('success','Password user berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('datauser.index')->with('info',$th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect()->route('datauser.index')->with('success','User berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('datauser.index')->with('info',$th->getMessage());
        }
    }
}
