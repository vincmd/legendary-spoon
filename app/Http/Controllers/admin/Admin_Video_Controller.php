<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\video;
use Illuminate\Http\Request;

class Admin_Video_Controller extends Controller
{
    public function video()
    {
        $video = video::first();
        $video->file_path = explode('/', $video->file_path);
        $video->file_path = "http://legendary-spoon.test/video/" . $video->file_path[1];
        // dd($video->file_path);

        return view('admin.video.video', compact('video'));
    }

    public function video_new(Request $request)
    {
        // dd($request);
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('sementara', 'public');
            $update = false;

            if ($request->id !== null) {
                $ids = $request->id;
                $update = video::findOrFail($ids);
                if ($update) {
                    $update->file_path = $path;
                    $update->save();
                }


            } else {
                video::create([
                    'title' => 'asa',
                    'file_path' => $path,
                    'status' => 0,
                ]);
            }
            return back()->with('success', 'Video uploaded!');
        } else {
            return back()->withErrors('No file uploaded.');
        }
    }


    public function fix_up_video(Request $request)
    {
        video::create([
            'title' => $request->title,
            'file_path' => session('path_video'),
            'status' => 0,
        ]);
        session()->remove('path_video');
        return back();
    }
}
