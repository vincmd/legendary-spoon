<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\video;
use Illuminate\Http\Request;

class Admin_Video_Controller extends Controller
{
    public function video()
    {
        $video = "";
        return view('admin.video.video', compact('video'));
    }

    public function video_new(Request $request)
    {
        dd($request);
    $path = $request->file('video')->store('sementara', 'public');
        session()->put('path_video', $path);
        return back();
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
