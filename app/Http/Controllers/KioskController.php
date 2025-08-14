<?php

namespace App\Http\Controllers;

use App\Models\Queues;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function early()
    {
        $kiosk = Services::all();
        return view('kiosk.kiosk', compact('kiosk'));
    }

    public function kios(Request $request)
    {
        try {
            // Validasi
            $request->validate([
                'vehicle_number' => 'required|string',
                'services_id' => 'required|exists:services,id',
                'locket_id' => 'nullable|exists:lockets,id',
                'level_id' => 'nullable|exists:levels,id',
            ]);

            // Ambil kode prefix dari layanan
            $service = Services::findOrFail($request->services_id);
            $prefix = $service->code ?? 'Q'; // default Q jika code kosong

            // Ambil nomor terakhir untuk hari ini
            $lastQueue = Queues::where('services_id', $request->services_id)
                ->whereDate('dates', Carbon::today())
                ->orderBy('id', 'desc')
                ->first();

            $lastNumber = 0;
            if ($lastQueue) {
                $lastNumber = intval(substr($lastQueue->queue_number, strlen($prefix)));
            }

            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $queueNumber = $prefix . $newNumber;

            // Simpan ke database
            $queue = Queues::create([
                'queue_number' => $queueNumber,
                'vehicle_number' => $request->vehicle_number,
                'status' => 'new',
                'call_status' => null,
                'is_called' => 0,
                'dates' => Carbon::today(),
                'services_id' => $request->services_id,
                'locket_id' => $request->locket_id ?? null,
                'level_id' => $request->level_id ?? null,
            ]);

            return response()->json([
                'success' => 'Data berhasil ditambahkan dengan nomor antrian ' . $queueNumber
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
