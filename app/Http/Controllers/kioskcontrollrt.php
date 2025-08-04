<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\que;
use Carbon\Carbon;
use Illuminate\Http\Request;

class kioskcontrollrt extends Controller
{
    public function early()
    {
        $kiosk = layanan::all();

        return view('kiosk.kiosk', compact('kiosk'));
    }

    public function kios(Request $request)
    {
        try {

            $request->validate([
                // 'phone_number',
                // 'first_letter',
                // 'plate_number',
                // 'last_plate_letter',
                // 'que_number',
                // 'call_status',
                // 'is_called',
                // 'dates',
            ]);

            $ya=1;
            que::create(
                [
                    'phone_number'=>$request->input("phone_number"),
                    'first_letter'=>"kt",
                    'plate_number'=>"1234",
                    'last_plate_letter'=>"abc",
                    'que_number'=>$ya,
                    // 'call_status'=>,
                    'is_called'=>false,
                    'dates'=>Carbon::today(),
                    'services_id'=>$request->services_id,
                ]

            );


            return response()->json(['success' => 'Data berhasil ditambahkan']);

        } catch (\Exception $e) {
            return response()->json(['success' => $e->getMessage()]);

        };
    }
}
