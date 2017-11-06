<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.promo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.promo.create');
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
            'desc' => 'required',
            'image' => 'required',
            'is_banner' => 'required',
        ]);

        Promo::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Promo successfully added',
        ]);

        return redirect()->route('admin.promo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promo = Promo::findOrfail($id);
        return view('pages.admin.promo.show', compact('promo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('pages.admin.promo.edit', compact('promo'));
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
            'desc' => 'required',
            'image' => 'required',
            'is_banner' => 'required',
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Promo successfully edited',
        ]);

        return redirect()->route('admin.promo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Promo::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Promo successfully deleted',
        ]);

        return redirect()->route('admin.promo.index');
    }

    public function getPromoData()
    {
        $promo = Promo::all();
        return Datatables::of($promo)
            ->addColumn('show_banner', function($promo) {
                return $promo->is_banner == 1 ? 'Yes' : 'No';
            })
            ->addColumn('show_image', function($promo) {
                return '<img class="rounded-square" width="50" height="50" src="'. url($promo->image) .'" alt="">';
            })
            ->addColumn('action', function($promo){
                return view('layouts.admin.partials._action', [
                    'model' => $promo->id,
                    'form_url' => route('admin.promo.destroy', $promo->id),
                    'edit_url' => route('admin.promo.edit', $promo->id),
                    'show_url' => route('admin.promo.show', $promo->id)
                ]);
            })
            ->rawColumns(['show_image', 'action'])
            ->make(true);

    }
}
