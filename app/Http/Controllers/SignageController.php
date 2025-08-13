<?php

namespace App\Http\Controllers;

use App\Models\Queues;
use App\Models\video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Queue;

class SignageController extends Controller
{
    public function index()
    {
        $que = Queues::where('is_called', 1)
            ->latest()
            ->limit(4)
            ->get();

        foreach ($que as $a) {

            $que[] = [
                'title' => 'apalah',
                'data' => $a->que_number,
            ];
        }
        // dd($que);

        $video = video::first();
        $video = $video->file_path;
        $video = explode('/', $video);
        $video = "http://legendary-spoon.test/video/" . $video[1];

        
        return view('signage.signage', compact('que', 'video'));
    }
}
