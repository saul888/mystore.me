<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\groups;
use App\User;
use App\type;

class ProductsController extends Controller
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
        $products =  groups::all();
        return view('groups.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'status' => 'required',
            'storage' => 'required',
            'store_id' => 'required',
        ]);

        $groups = new groups;
        $groups->title = $request->input('title');
        $groups->description = $request->input('description');
        $groups->status = $request->input('status');
        $groups->storage = $request->input('storage');
        $groups->store_id = $request->input('store_id');
        $groups->user_id = auth()->user()->id;
        $groups->save();

        return redirect('/products')->with('success','Group Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groups = groups::find($id);
        $types = type::where('group_id',$id)->get();
        $data=[
            'groups'=>$groups,
            'types'=>$types,
        ];
        return view('groups.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = groups::find($id);
        return view('groups.edit')->with('groups', $groups);
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
            'status' => 'required',
            'store_id' => 'required',
            'storage' => 'required',
        ]);

        $groups = groups::find($id);
        $groups->title = $request->input('title');
        $groups->description = $request->input('description');
        $groups->status = $request->input('status');
        $groups->store_id = $request->input('store_id');
        $groups->storage = $request->input('storage');
        $groups->save();

        return redirect('/products')->with('success','Group Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = groups::find($id);
        $groups->delete();

        return redirect('/products')->with('success','Group Removed');
    }
}
