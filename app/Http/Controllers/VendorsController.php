<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vendor;
use App\type;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = vendor::all();
        return view('vendors.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendors.create');
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
            'name' => 'required',
            'brand_id' => 'required',
            'group_id' => 'required',
            'idnumber' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $vendor = new vendor;
        $vendor->name = $request->input('name');
        $vendor->brand_id = $request->input('brand_id');
        $vendor->group_id = $request->input('group_id');
        $vendor->idnumber = $request->input('idnumber');
        $vendor->description = $request->input('description');
        $vendor->phone = $request->input('phone');
        $vendor->email = $request->input('email');
        $vendor->address = $request->input('address');
        $vendor->save();

        return redirect('/Vendors')->with('success','Vendor Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = vendor::find($id);
        $types = type::where('vendor_id',$id)->get();
        $data=[
            'vendor'=>$vendor,
            'types'=>$types,
        ];
        return view('vendors.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = vendor::find($id);
        return view('vendors.edit')->with('vendor', $vendor);
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
            'name' => 'required',
            'brand_id' => 'required',
            'group_id' => 'required',
            'idnumber' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $vendor = vendor::find($id);
        $vendor->name = $request->input('name');
        $vendor->brand_id = $request->input('brand_id');
        $vendor->group_id = $request->input('group_id');
        $vendor->idnumber = $request->input('idnumber');
        $vendor->description = $request->input('description');
        $vendor->phone = $request->input('phone');
        $vendor->email = $request->input('email');
        $vendor->address = $request->input('address');
        $vendor->save();

        return redirect('/Vendors')->with('success','Vendor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = vendor::find($id);
        $vendor->delete();
        return redirect('/Vendors')->with('success','Vendor Removed');
    }
}
