<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::orderBy('id', 'desc')->first();
        return view('pages.admin.setting.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Setting successfully Updated',
        ]);

        return redirect()->route('admin.setting.index');
    }
}
