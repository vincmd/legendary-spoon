<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videos()
    {
        return view('admin.video.video');
    }

    public function video_new(Request $request)
    {
        $path = $request->file('video')->store('sementara');
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
