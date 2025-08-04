<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use App\Models\lockets;
use App\Models\que;
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
        $layans=layanan::count();
        $que_all=que::count();
        $que_today=que::whereDate('dates',Carbon::today())->count();
        $loket=lockets::count();

        return view('admin.admin', compact('users','layans','que_all','que_today','loket'));
    }

    public function account()
    {

        $users = User::all();

        return view('admin.account.account', compact('users'));
    }

    public function search_acc(Request $request)
    {
        if ($request) {
            $users = User::where('name', 'like', '%' . $request->search . '%')
                ->get();

            if ($users->isEmpty()) {
                $users = User::where('email', 'like', '%' . $request->search . '%')
                    ->get();
            }


            return view('admin.account.account', compact('users'));
        } else {
            return redirect('/admin/account');
        }
    }
    public function add_acc(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create(
            [
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
                'email' => $request->input('email'),

            ]
        );


        return back();
    }

    public function removeacc($id)
    {
        $input = User::findOrFail($id);
        $input->delete();

        return back();
    }

    public function layanan()
    {

        $layan = layanan::all();
        return view('admin.layanan.layanan', compact('layan'));
    }
    public function search_layanan(Request $request)
    {
        if ($request) {
            $layan = layanan::where('services_name', 'like', '%' . $request->search_layanan . '%')
                ->get();

            if ($layan->isEmpty()) {
                $layan = layanan::where('code', 'like', '%' . $request->search_layanan . '%')
                    ->get();
            }


            return view('admin.layanan.layanan', compact('layan'));
        } else {
            return redirect('/admin/layanan');
        }
    }


    public function layanan_new(Request $request)
    {
        $request->validate([
            'services_name' => 'required',
            'code' => 'required',
        ]);
        $logo_path = '-';
        if ($request->file('logo')) {
            $logo_path = 0;
            $logo_path = $request->file('logo')->store('logo');
        }
        layanan::create([
            'services_name' => $request->input('services_name'),
            'code' => $request->input('code'),
            'logo_path' => $logo_path,
        ]);
        return back();
    }
    public function layanan_destroy($id)
    {
        $input = layanan::findOrFail($id);
        $input->delete();
        return back();
    }

    public function lockets()
    {
        $emails = User::all();
        $lockets = lockets::all();
        return view('admin.loket.loket', compact('lockets', 'emails'));
    }
    public function search_locket(Request $request)
    {
        if ($request) {
            $lockets = lockets::where('email_user', 'like', '%' . $request->search . '%')
                ->get();

            if ($lockets->isEmpty()) {
                $lockets = lockets::where('alias', 'like', '%' . $request->search . '%')
                    ->get();
            }


            return view('admin.loket.loket', compact('lockets'));
        } else {
            return redirect('/admin/locket');
        }
    }

    public function locket_add_data()
    {
        $emails = User::all();
        $lockets = lockets::all();
        $yap = [];

        if ($lockets->isEmpty()) {
            foreach ($emails as $ay) {
                array_push($yap, $ay);
            }
        }
        foreach ($lockets as $datas) {
            foreach ($emails as $checkemail) {
                if ($datas->email_user !== $checkemail->email) {
                    array_push($yap, $checkemail);
                } else {
                    continue;
                }
            }
        }
        return view('admin.loket.loket-new', compact('yap'));
    }


    public function locket_new(Request $request)
    {
        $request->validate([
            'alias' => 'required',
            'email' => 'required',
        ]);
        $emails = User::where('email', $request->email)->first();
        lockets::create([
            'alias' => $request->input('alias'),

            'email_user' => $emails->email,
        ]);
        return back();
    }
    public function locket_destroy($id)
    {
        $input = lockets::findOrFail($id);
        $input->delete();
        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function running_text()
    {
        $running_text = RunningText::all()->first();
        if(!$running_text){
            $running_text=' ';
            session()->put('test',false);
        }
        else{session()->put('test',true);}
        return view('admin.running_text.running_text', compact('running_text'));

    }
    public function update_text(Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $hasData = RunningText::whereNotNull('texts')
            ->where('texts', '!=', '')
            ->exists();

        if ($hasData) {
            $update = RunningText::findOrFail(1);
            $update->texts = $request->text;
            $update->save();
        } else {
            RunningText::create([
                'texts' => $request->text,
                'status' => '0',
            ]);
        }

        return back();

    }

    public function videos(){
        return view('admin.video.video');
    }

    public function video_new( Request $request){
        $path = $request->file('video')->store('sementara');
        session()->put('path_video',$path);
        return back();
    }

    public function fix_up_video(Request $request){
        video::create([
            'title'=>$request->title,
            'file_path'=>session('path_video'),
            'status'=>0,
        ]);
        session()->remove('path_video');
        return back();
    }

}
