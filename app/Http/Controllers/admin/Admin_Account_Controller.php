<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin_Account_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function account()
    {
        $users = User::all();

        return view('admin.account.index.account', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_acc(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        User::create(
            [
                'name' => $request->input('name'),
                'email' => ($request->input('email')),
                'password' => Hash::make($request->input('password')),

            ]
        );

        return back();
    }

    public function remove_acc($id)
    {
        $input = User::findOrFail($id);
        $input->delete();

        return back();
    }

    public function services()
    {
        $users = User::all();
        return view('admin.services.services', compact('users'));
    }

    public function search_acc(Request $request)
    {
        if ($request) {
            $users = User::where('name', 'like', '%' . $request->search . '%')
                ->get();

            if ($users->isEmpty()) {
                $users = User::where('email', 'like', '%' . $request->search . '%')
                    ->get();
            }


            return view('admin.account.account', compact('users'));
        } else {
            return redirect('/admin/account');
        }
    }
}
