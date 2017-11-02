<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.partner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.partner.create');
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
           'title' => 'required',
           'link' => 'required',
           'is_home' => 'required',
           'image' => 'required'
        ]);

        Partner::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Partner successfully added',
        ]);

        return redirect()->route('admin.partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('pages.admin.partner.edit', compact('partner'));
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
            'title' => 'required',
            'link' => 'required',
            'is_home' => 'required',
            'image' => 'required'
        ]);

        $partner = Partner::findOrFail($id);
        $partner->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Partner successfully edited',
        ]);

        return redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Partner::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Partner successfully deleted',
        ]);

        return redirect()->route('admin.partner.index');
    }

    public function getPartnerData()
    {
        $partner = Partner::all();
        return Datatables::of($partner)
            ->addColumn('show_home', function($partner) {
                return $partner->is_home == 1 ? 'Yes' : 'No';
            })
            ->addColumn('show_image', function($club) {
                return '<img class="rounded-square" width="50" height="50" src="'. url($club->image) .'" alt="">';
            })
            ->addColumn('action', function($partner){
                return view('layouts.admin.partials._action', [
                    'model' => $partner->id,
                    'form_url' => route('admin.partner.destroy', $partner->id),
                    'edit_url' => route('admin.partner.edit', $partner->id),
                    'show_url' => route('admin.partner.show', $partner->id)
                ]);
            })
            ->rawColumns(['show_image', 'action'])
            ->make(true);

    }
}
