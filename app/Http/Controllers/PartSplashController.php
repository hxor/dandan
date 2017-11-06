<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\PartnerSplash as Splash;

class PartSplashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.splash.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.splash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'color' => 'required',
            'is_active' => 'required',
        ]);

        Splash::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Splash successfully added',
        ]);

        return redirect()->route('admin.splash.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $splash = Splash::findOrFail($id);
        return view('pages.admin.splash.show', compact('splash'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $splash = Splash::findOrFail($id);
        return view('pages.admin.splash.edit', compact('splash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'required',
            'color' => 'required',
            'is_active' => 'required',
        ]);

        $splash = Splash::findOrFail($id);
        $splash->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Partner Splash successfully edited',
        ]);

        return redirect()->route('admin.splash.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Splash::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Partner Splash successfully deleted',
        ]);

        return redirect()->route('admin.splash.index');
    }

    public function getSplashData()
    {
        $splash = Splash::all();
        return Datatables::of($splash)
            ->addColumn('is_show', function($splash) {
                return $splash->is_active == 1 ? 'Yes' : 'No';
            })
            ->addColumn('show_image', function($splash) {
                return '<img class="rounded-square" width="50" height="50" src="'. url($splash->image) .'" alt="">';
            })
            ->addColumn('action', function($splash){
                return view('layouts.admin.partials._action', [
                    'model' => $splash->id,
                    'form_url' => route('admin.splash.destroy', $splash->id),
                    'edit_url' => route('admin.splash.edit', $splash->id),
                    'show_url' => route('admin.splash.show', $splash->id)
                ]);
            })
            ->rawColumns(['show_image', 'action'])
            ->make(true);
    }
}
