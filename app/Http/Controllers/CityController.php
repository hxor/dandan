<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.city.create');
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
            'city' => 'required'
        ]);

        $request['city'] = ucwords($request->city);

        City::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'City successfully added',
        ]);

        return redirect()->route('admin.city.index');
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
        $city = City::findOrFail($id);
        return view('pages.admin.city.edit', compact('city'));
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
            'city' => 'required',
        ]);

        $request['city'] = ucwords($request->city);

        $city = City::findOrFail($id);
        $city->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'City successfully edited',
        ]);

        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!City::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'City successfully deleted',
        ]);

        return redirect()->route('admin.city.index');
    }

    public function getCityData()
    {
        $city = City::all();
        return Datatables::of($city)
            ->addColumn('action', function($city){
                return view('layouts.admin.partials._action', [
                    'model' => $city->id,
                    'form_url' => route('admin.city.destroy', $city->id),
                    'edit_url' => route('admin.city.edit', $city->id),
                ]);
            })
            ->make(true);

    }
}
