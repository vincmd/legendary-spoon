<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\services;
use App\Models\lockets;
use App\Models\Queues;
use App\Models\User;
use Carbon\Carbon;

class admincontroller extends Controller
{

    public function index()
    {
        $users = User::all();
        $servi = services::count();
        $que_all = Queues::count();
        $que_today = Queues::whereDate('dates', Carbon::today())->count();
        $loket = lockets::count();

        return view('admin.admin', compact('users', 'servi', 'que_all', 'que_today', 'loket'));
    }
}
