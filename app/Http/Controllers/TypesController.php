<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type;
use App\item;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types =  type::all();
        return view('types.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'description' => 'required',
            'group_id' => 'required',
            'vendor_id' => 'required',
        ]);

        $type = new type;
        $type->title = $request->input('title');
        $type->description = $request->input('description');
        $type->group_id = $request->input('group_id');
        $type->vendor_id = $request->input('vendor_id');
        $type->save();

        return redirect('/types')->with('success','New Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = type::find($id);
        $items = item::where('type_id',$id)->get();
        $data=[
            'type'=>$type,
            'items'=>$items,
        ];
        return view('types.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = type::find($id);
        return view('types.edit')->with('type', $type);
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
            'description' => 'required',
            'group_id' => 'required',
            'vendor_id' => 'required',
        ]);

        $type = type::find($id);
        $type->title = $request->input('title');
        $type->description = $request->input('description');
        $type->group_id = $request->input('group_id');
        $type->vendor_id = $request->input('vendor_id');
        $type->save();

        return redirect('/types')->with('success','Group Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = type::find($id);
        $type->delete();

        return redirect('/types')->with('success','Product Type Removed');
    }
}
