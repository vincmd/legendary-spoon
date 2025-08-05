<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\lockets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logincontroller extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|min:3',
            'password' => 'required|min:3'
        ]);
        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->with('error', 'Username atau Password salah');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Username atau Password salah');
        }
        Auth::login($user);
        $request->session()->regenerate();

        session()->put('username', $user->name);
        session()->put('email', $user->email);

        $locket_cek = lockets::where('email_user', $user->email)->first();
        if ($locket_cek) {
            return redirect('/locket');
        } else {
            return redirect('/admin');
        }
    }
}
