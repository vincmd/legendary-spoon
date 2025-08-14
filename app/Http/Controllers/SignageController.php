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
            ->latest('updated_at')
            ->limit(4)
            ->get();

        // Get existing session data or empty array
        $ex_que = session('que_data', []);

        // Step 1: reset all statuses to false before checking new data
        foreach ($ex_que as &$item) {
            $item['status'] = false;
        }
        unset($item); // break reference

        // Step 2: loop through current queue items
        foreach ($que as $a) {
            $quenum = "a" . $a->que_number;
            $timeStr = $a->updated_at->format('Y-m-d H:i:s'); // ensure string comparison

            // Check if this data already exists in session
            $index = array_search($quenum, array_column($ex_que, 'data'));

            if ($index !== false) {
                // Found same data → check if time is different
                if ($ex_que[$index]['time'] !== $timeStr) {
                    $ex_que[$index]['time'] = $timeStr;
                    $ex_que[$index]['status'] = true;
                }
                // else: leave status as false (since no change)
            } else {
                // New data
                if (count($ex_que) >= 4) {
                    // Sort by oldest first
                    usort($ex_que, fn($x, $y) => strtotime($x['time']) <=> strtotime($y['time']));
                    // Replace oldest
                    $ex_que[0] = [
                        'title' => 'apalah',
                        'data' => $quenum,
                        'status' => true,
                        'time' => $timeStr,
                    ];
                } else {
                    // Append new
                    $ex_que[] = [
                        'title' => 'apalah',
                        'data' => $quenum,
                        'status' => true,
                        'time' => $timeStr,
                    ];
                }
            }
        }

        // Step 3: save back to session
        session(['que_data' => $ex_que]);
        $que=$ex_que;



        $video = video::first();
        $video = $video->file_path;
        $video = explode('/', $video);
        $video = "http://legendary-spoon.test/video/" . $video[1];
        // dd($video);


        return view('signage.signage', compact('que', 'video'));
    }
}
