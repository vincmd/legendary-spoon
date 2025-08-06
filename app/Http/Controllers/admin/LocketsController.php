<?php

namespace App\Http\Controllers\admin;

use App\Models\lockets;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocketsController extends Controller
{
    public function lockets()
    {
        $emails = User::all();
        $lockets = lockets::all();
        return view('admin.loket.loket', compact('lockets', 'emails'));
    }
    public function search_locket(Request $request)
    {
        if ($request) {
            $lockets = lockets::where('email_user', 'like', '%' . $request->search . '%')
                ->get();

            if ($lockets->isEmpty()) {
                $lockets = lockets::where('alias', 'like', '%' . $request->search . '%')
                    ->get();
            }


            return view('admin.loket.loket', compact('lockets'));
        } else {
            return redirect('/admin/locket');
        }
    }

    public function locket_add_data()
    {
        $emails = User::all();
        $lockets = lockets::all();
        $sorted = [];

        if ($lockets->isEmpty()) {
            foreach ($emails as $email) {
                array_push($sorted, $email);
            }
        }
        foreach ($lockets as $datas) {
            foreach ($emails as $checkemail) {
                if ($datas->email_user !== $checkemail->email) {
                    array_push($sorted, $checkemail);
                } else {
                    continue;
                }
            }
        }
        return view('admin.loket.loket-new', compact('sorted'));
    }


    public function locket_new(Request $request)
    {
        $request->validate([
            'alias' => 'required',
            'email' => 'required',
        ]);
        $emails = User::where('email', $request->email)->first();
        lockets::create([
            'alias' => $request->input('alias'),

            'email_user' => $emails->email,
        ]);
        return back();
    }
    public function locket_destroy($id)
    {
        $input = lockets::findOrFail($id);
        $input->delete();
        return back();
    }
  
}
