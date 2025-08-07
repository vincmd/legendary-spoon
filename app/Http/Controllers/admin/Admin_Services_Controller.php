<?php

namespace App\Http\Controllers\admin;

use App\Models\services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin_Services_Controller extends Controller
{
    public function services()
    {

        $servi = services::all();
        return view('admin.services.index.services', compact('servi'));
    }
    public function search_services(Request $request)
    {
        if ($request) {
            $servi = services::where('services_name', 'like', '%' . $request->search_services . '%')
                ->get();

            if ($servi->isEmpty()) {
                $servi = services::where('code', 'like', '%' . $request->search_services . '%')
                    ->get();
            }


            return view('admin.services.services', compact('servi'));
        } else {
            return redirect('/admin/services');
        }
    }


    public function services_new(Request $request)
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
        services::create([
            'services_name' => $request->input('services_name'),
            'code' => $request->input('code'),
            'logo_path' => $logo_path,
        ]);
        return back();
    }
    public function services_destroy($id)
    {
        $input = services::findOrFail($id);
        $input->delete();
        return back();
    }
}
