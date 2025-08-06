<?php

namespace App\Http\Controllers\admin;

use App\Models\RunningText;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_RunningText_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function running_text()
    {
        $running_text = RunningText::all()->first();
        if (!$running_text) {
            $running_text = ' ';
            session()->put('test', false);
        } else {
            session()->put('test', true);
        }
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
}
