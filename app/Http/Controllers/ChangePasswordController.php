<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function index()
    {
        return view('admin.changepassword.index');
    }
    public function update(Request $request)
    {
        $request->validate([
            'passwordsekarang' => ['required', 'min:8'],
            'passwordbaru' => ['required', 'min:8'],
        ],
        [
            'passwordsekarang.min' => 'Password sekarang minimal 8 karakter',
            'passwordbaru.min' => 'Password baru minimal 8 karakter',
        ]);

        if(!Hash::check($request->passwordsekarang, auth()->user()->password)){
            return redirect()->back()->with("info", "Password sekarang salah");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->passwordbaru)
        ]);

        return redirect()->back()->with("success", "Password telah diubah");
    }
}
