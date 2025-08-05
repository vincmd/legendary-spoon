<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\lockets;
use App\Models\LocketService;
use App\Models\que;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class loketcontroller extends Controller
{

    public function index()
    {
        $servicess = layanan::all();
        $locket = lockets::where('email_user', session('email'))->first();
        if ($locket) {
            $serve = LocketService::where('locket_id', $locket->id)->first();
            if ($serve) {
                return redirect('/locket/main');
            }
        }
        return view('lockets.index', compact('servicess'));
    }

    public function select(Request $request)
    {
        $request->validate([
            'opsi' => 'required',
        ]);
        $service = layanan::find($request->opsi);
        $locket_id = lockets::where('email_user', session('email'))->first();
        if ($service && $locket_id) {

            $locketserve = LocketService::create([
                'layanan_id' => $request->input('opsi'),
                'locket_id' => $locket_id->id,
            ]);
        }
        return back();
    }

    public function early()
    {
        $locket = lockets::where('email_user', session('email'))->first();
        $serve = LocketService::where('locket_id', $locket->id)->first();
        $queues = que::where('layanan_id', $serve->layanan_id)->whereToday('dates', 'true');


        return view('lockets.loket', compact('queues'));
    }

    public function logout(Request $request)
    {
        $locket = lockets::where('email_user', session('email'))->first();
        $serve = LocketService::where('locket_id', $locket->id)->first();

        if ($serve) {
            $input = LocketService::findOrFail($serve->id);
            $input->delete();
            return redirect('/logout');
        }
    }
}
