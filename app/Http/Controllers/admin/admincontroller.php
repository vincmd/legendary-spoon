<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\services;
use App\Models\lockets;
use App\Models\que;
use App\Models\Queues;
use App\Models\RunningText;
use App\Models\User;
use App\Models\video;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\Skip;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\search;

class admincontroller extends Controller
{

    public function index()
    {
        $users = User::all();
        $layans = services::count();
        $que_all = Queues::count();
        $que_today = Queues::whereDate('dates', Carbon::today())->count();
        $loket = lockets::count();

        return view('admin.admin', compact('users', 'layans', 'que_all', 'que_today', 'loket'));
    }


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
