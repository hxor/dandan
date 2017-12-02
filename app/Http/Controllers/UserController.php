<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\User;
use App\Models\City;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = [
            'manager' => 'Manager',
        ];

        $city = City::pluck('city', 'city');

        return view('pages.admin.user.create', compact('role', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required',
            'city' => 'required'
        ]);

        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        User::create($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully added',
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = [
            'manager' => 'Manager',
        ];
        $city = City::pluck('city', 'city');
        $user = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('user', 'role', 'city'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role' => 'required', 
            'city' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully edited',
        ]);

        return redirect()->route('admin.user.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPass($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.user.editpass', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePass(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User Password successfully Edited',
        ]);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!User::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'User successfully deleted',
        ]);

        return redirect()->route('admin.user.index');
    }

    public function getUserData()
    {
        $user = User::all();
        return Datatables::of($user)
            ->addColumn('action', function ($user) {
            return view('layouts.admin.partials._action', [
                'model' => $user->id,
                'form_url' => route('admin.user.destroy', $user->id),
                'edit_url' => route('admin.user.edit', $user->id),
                'show_url' => route('admin.user.show', $user->id)
            ]);
        })
        ->rawColumns(['action'])
        ->make(true);

    }
}
