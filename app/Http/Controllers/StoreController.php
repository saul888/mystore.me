<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stores;
use App\item;

class StoreController extends Controller
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
        $store = stores::all();
        return view('stores.index')->with('store', $store);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
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
            'type' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        $stores = new stores;
        $stores->title = $request->input('title');
        $stores->type = $request->input('type');
        $stores->description = $request->input('description');
        $stores->location = $request->input('location');
        $stores->type = $request->input('type');
        $stores->save();

        return redirect('/store')->with('success','New Store Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stores = stores::find($id);
        $items = item::where('store_id',$id)->get();
        $data=[
            'stores'=>$stores,
            'items'=>$items,
        ];
        return view('stores.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = stores::find($id);
        return view('stores.edit')->with('stores', $stores);
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
            'type' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        $stores = stores::find($id);
        $stores->title = $request->input('title');
        $stores->type = $request->input('type');
        $stores->description = $request->input('description');
        $stores->location = $request->input('location');
        $stores->type = $request->input('type');
        $stores->save();

        return redirect('/store')->with('success','Store Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = stores::find($id);
        $stores->delete();

        return redirect('/store')->with('success','Store Removed');
    }
}

/*<div class="row">
<div class="col-sm">
<h3>Store</h3>
<a href="/stock/create">+ new custom store!</a>
        </div>
        <div class="col-sm">
                <h3>Suppliers</h3>
                 <a href="/Vendors">+ view product vendors!</a>
                </div>
       
                <div class="col-sm">
                <h2>Items</h2>
                <a href="/items">+ view product items!</a>
                </div>
                <hr>
</div>
*/
