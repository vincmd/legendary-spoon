<?php

namespace App\Http\Controllers;

use App\Models\Queues;
use App\Models\RunningText;
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
        // dd($que);

        // Get existing session data or empty array
        $ex_que = session('que_data', []);
        // $ex_que=[];

        // Step 1: reset all statuses to false before checking new data

        foreach ($ex_que as &$item) {
            $item['status'] = false;
        }
        unset($item); // break reference

        $array_l = count($ex_que);
        // dd($array_l);
        // Step 2: loop through current queue items
        foreach ($que as $a) {
            if ($array_l >= 3) {
                $quenum = $a->queues_number;
                $timeStr = $a->updated_at->format('Y-m-d H:i:s');
                // ensure string comparison

                // Check if this data already exists in session
                $index = array_search($quenum, array_column($ex_que, 'data'));

                if ($index !== false) {
                    // Found same data → check if time is different
                    if ($ex_que[$index]['time'] !== $timeStr) {
                        array_splice($ex_que, $index, 1);
                        $ex_que[] = [
                            'title' => 'apalah',
                            'data' => $quenum,
                            'status' => true,
                            'time' => $timeStr,
                        ];
                    }
                    // else: leave status as false (since no change)
                } else {
                    usort($ex_que, fn($x, $y) => strtotime($x['time']) <=> strtotime($y['time']));
                    $ex_que[0] = [
                        'title' => 'apalah',
                        'data' => $quenum,
                        'status' => true,
                        'time' => $timeStr,
                    ];

                }
            } else {
                $quenum = $a->queues_number;
                $timeStr = $a->updated_at->format('Y-m-d H:i:s');
                $index = array_search($quenum, array_column($ex_que, 'data'));

                if ($index !== false) {
                    // dd($index);
                    // Found same data → check if time is different
                    if ($ex_que[$index]['time'] !== $timeStr) {
                        array_splice($ex_que, $index, 1);
                        $ex_que[] = [
                            'title' => 'apalah',
                            'data' => $quenum,
                            'status' => true,
                            'time' => $timeStr,
                        ];
                    }} else {
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
        $que = $ex_que;
        // dd(session('que_data'));


        $video = video::first();
        $video = $video->file_path;
        $video = explode('/', $video);
        $video = "http://legendary-spoon.test/video/" . $video[1];
        // dd($video);

        $text = RunningText::first();
        $text = $text->texts;


        return view('signage.signage', compact('que', 'video', 'text'));
    }
}
