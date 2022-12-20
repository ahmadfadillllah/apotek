<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }
    public function update(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'avatar' => ['required', 'mimes:png,jpg,jpeg,heic'],
        ],
        [
            'avatar.mimes' => 'Format file harus berupa png, jpg, heic atau jpeg'
        ]);

        try {
            //code...
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $date = date('Ymd His gis');

            if($request->hasFile('avatar')){
                $request->file('avatar')->move('admin/themesbrand.com/velzon/html/default/assets/images/', $date.$request->file('avatar')->getClientOriginalName());
                $user->avatar = $date.$request->file('avatar')->getClientOriginalName();
                $user->save();

                return redirect()->back()->with('success', 'Profil telah diupdate');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('info', $th->getMessage());
        }


    }
}
