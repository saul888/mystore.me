<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sale;

class SalesController extends Controller
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
        $sales = Sale::all();
        return view('sales.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
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
            'staff_name' => 'required',
            'shop_id' => 'required',
            'item_title' => 'required',
            'quantity' => 'required',
            'cashsale' => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        //Handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $sale = new Sale;
        $sale->staff_name = $request->input('staff_name');
        $sale->shop_id = $request->input('shop_id');
        $sale->item_title = $request->input('item_title');
        $sale->quantity = $request->input('quantity');
        $sale->cashsale = $request->input('cashsale');
        $sale->cover_image = $fileNameToStore;
        $sale->save();

        return redirect('/sales')->with('success','Sale Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sale::find($id);
        return view('sales.show')->with('sales', $sales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sales.edit')->with('sale', $sale);
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
            'staff_name' => 'required',
            'shop_id' => 'required',
            'item_title' => 'required',
            'quantity' => 'required',
            'cashsale' => 'required',
            'cover_image' => 'required',
        ]);

        if($request->hasFile('cover_image')){
            //Get file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $sale = Sale::find($id);
        $sale->staff_name = $request->input('staff_name');
        $sale->shop_id = $request->input('shop_id');
        $sale->item_title = $request->input('item_title');
        $sale->quantity = $request->input('quantity');
        $sale->cashsale = $request->input('cashsale');
        if($request->hasFile('cover_image')){
            $sale->cover_image = $fileNameToStore;
        }
        $sale->save();

        return redirect('/sales')->with('success','Sale Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales = Sale::find($id);
        if($sales->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$sales->cover_image);
        }
        $sales->delete();

        return redirect('/sales')->with('success','Sale Removed');
    }
}
