<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use App\groups;

class BrandsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['','']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::all();
        return view('brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'title' => 'required',
            'group_id' => 'required',
            'manufacturer' => 'required',
            'vendor_id' => 'required',
            'location' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        $brand = new brand;
        $brand->title = $request->input('title');
        $brand->group_id = $request->input('group_id');
        $brand->manufacturer = $request->input('manufacturer');
        $brand->vendor_id = $request->input('vendor_id');
        $brand->location = $request->input('location');
        $brand->code = $request->input('code');
        $brand->type = $request->input('type');
        $brand->save();

        return redirect('/Brands')->with('success','Brand Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = brand::find($id);
        return view('brands.show')->with('brand',$brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::find($id);
        return view('brands.edit')->with('brand', $brand);
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
            'title' => 'required',
            'group_id' => 'required',
            'manufacturer' => 'required',
            'vendor_id' => 'required',
            'location' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        $brand = brand::find($id);
        $brand->title = $request->input('title');
        $brand->group_id = $request->input('group_id');
        $brand->manufacturer = $request->input('manufacturer');
        $brand->vendor_id = $request->input('vendor_id');
        $brand->location = $request->input('location');
        $brand->code = $request->input('code');
        $brand->type = $request->input('type');
        $brand->save();

        return redirect('/Brands')->with('success','Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return redirect('/Brands')->with('success','Brand Removed');
    }
}
