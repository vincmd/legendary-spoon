<?php

namespace App\Http\Controllers;

use App\Models\Queues;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Queue;

class SignageController extends Controller
{
    public function index()
    {
        $que = Queues::where('is_called', 1)
            ->get();
        foreach ($que as $a) {

            $que[] = [
                'title' => 'apalah',
                'data' => $a->que_number,
            ];
        }
        // dd($que);

        return view('signage.signage', compact('que'));
    }
}
