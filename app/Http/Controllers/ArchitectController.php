<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Architect;
use App\Models\ArchImage;

class ArchitectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.architect.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.architect.create');
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
        ]);

        Architect::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Architect successfully added',
        ]);

        return redirect()->route('admin.architect.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $architect = Architect::findOrfail($id);
        $archimage = $architect->images()->get();
        return view('pages.admin.architect.show', compact('architect', 'archimage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $architect = Architect::findOrfail($id);
        return view('pages.admin.architect.edit', compact('architect'));
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
        ]);

        $architect = Architect::findOrFail($id);
        $architect->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Architect successfully edited',
        ]);

        return redirect()->route('admin.architect.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Architect::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Architect successfully deleted',
        ]);

        return redirect()->route('admin.architect.index');
    }

    public function getArchitectData()
    {
        $architect = Architect::all();
        return Datatables::of($architect)
            ->addColumn('show_image', function($architect) {
                return '<img class="rounded-square" width="100" height="50" src="'. url($architect->image) .'" alt="">';
            })
            ->addColumn('action', function($architect){
                return view('layouts.admin.partials._action', [
                    'model' => $architect->id,
                    'form_url' => route('admin.architect.destroy', $architect->id),
                    'edit_url' => route('admin.architect.edit', $architect->id),
                    'show_url' => route('admin.architect.show', $architect->id)
                ]);
            })
            ->rawColumns(['show_image', 'action'])
            ->make(true);

    }

    public function getUploadImage($id)
    {
        $architect = Architect::findOrfail($id);
        return view('pages.admin.architect.upload', compact('architect'));
    }

    public function postUploadImage(Request $request, $id)
    {
        $title = $request->file->getClientOriginalName();
        $path = '/upload/architect/'.str_slug($request->file->getClientOriginalName(),'-').'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload/architect/'), $path);

        ArchImage::create(['architect_id' => $id, 'image' => $path]);
    }
    public function deleteUploadImage($imageId){
        $image = ArchImage::findOrFail($imageId);
        unlink(public_path().$image->image);
        $image->delete();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Image successfully deleted',
        ]);

        return redirect()->route('admin.architect.show', $image->architect_id);
    }

}
