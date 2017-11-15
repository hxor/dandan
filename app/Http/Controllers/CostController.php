<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Cost;
use App\Models\Job;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.cost.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::pluck('job', 'id');
        return view('pages.admin.cost.create', compact('jobs'));
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
            'job_id' => 'required',
            'cost_type' => 'required',
            'cost' => 'required|numeric'
        ]);

        Cost::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Cost successfully added',
        ]);

        return redirect()->route('admin.cost.index');
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
        $cost = Cost::findOrFail($id);
        $jobs = Job::pluck('job', 'id');
        return view('pages.admin.cost.edit', compact('cost','jobs'));
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
            'job_id' => 'required',
            'cost_type' => 'required',
            'cost' => 'required|numeric'
        ]);

        $cost = Cost::findOrFail($id);
        $cost->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Cost successfully updated',
        ]);

        return redirect()->route('admin.cost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Cost::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Cost successfully deleted',
        ]);

        return redirect()->route('admin.cost.index');
    }

    public function getCostData()
    {
        $costs = Cost::all();
        return Datatables::of($costs)
            ->addColumn('job', function($costs) {
                return $costs->job->job;
            })
            ->addColumn('action', function($costs){
                return view('layouts.admin.partials._action', [
                    'model' => $costs->id,
                    'form_url' => route('admin.cost.destroy', $costs->id),
                    'edit_url' => route('admin.cost.edit', $costs->id),
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);

    }
}
