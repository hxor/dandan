<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.customer.create');
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
            'address' => 'required',
            'phone' => 'required|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $customer = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        Customer::create($customer);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Customer successfully added',
        ]);

        return redirect()->route('admin.customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('pages.admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('pages.admin.customer.edit', compact('customer'));
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
            'address' => 'required',
            'phone' => 'required|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Customer successfully Edited',
        ]);

        return redirect()->route('admin.customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPass($id)
    {
        $customer = Customer::findOrFail($id);
        return view('pages.admin.customer.editpass', compact('customer'));
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

        $customer = Customer::findOrFail($id);
        $customer->update([
            'password' => bcrypt($request->password)
        ]);

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Customer Password successfully Edited',
        ]);

        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Customer::destroy($id)) return redirect()->back();

        notify()->flash('Done!', 'success', [
            'timer' => 1500,
            'text' => 'Customer successfully deleted',
        ]);

        return redirect()->route('admin.customer.index');
    }

    public function getCustomerData()
    {
        $customer = Customer::all();
        return Datatables::of($customer)
            ->addColumn('action', function($customer){
                return view('layouts.admin.partials._action', [
                    'model' => $customer->id,
                    'form_url' => route('admin.customer.destroy', $customer->id),
                    'edit_url' => route('admin.customer.edit', $customer->id),
                    'show_url' => route('admin.customer.show', $customer->id)
                ]);
            })
            ->make(true);

    }
}
