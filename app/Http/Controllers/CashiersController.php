<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cashier;

class CashiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashiers = cashier::all();
        return view('cashiers.index')->with('cashiers', $cashiers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashiers.create');
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
            'shop_name' => 'required',
            'idnumber' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
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

        $cashier = new cashier;
        $cashier->name = $request->input('name');
        $cashier->shop_name = $request->input('shop_name');
        $cashier->idnumber = $request->input('idnumber');
        $cashier->phone = $request->input('phone');
        $cashier->email = $request->input('email');
        $cashier->address = $request->input('address');
        $cashier->cover_image = $fileNameToStore;
        $cashier->save();

        return redirect('/cashiers')->with('success','Cashier Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cashier = Cashier::find($id);
        return view('cashiers.show')->with('cashier', $cashier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashier = Cashier::find($id);
        return view('cashiers.edit')->with('cashier', $cashier);
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
            'shop_name' => 'required',
            'idnumber' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
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

        $cashier = cashier::find($id);
        $cashier->name = $request->input('name');
        $cashier->shop_name = $request->input('shop_name');
        $cashier->idnumber = $request->input('idnumber');
        $cashier->phone = $request->input('phone');
        $cashier->email = $request->input('email');
        $cashier->address = $request->input('address');
        if($request->hasFile('cover_image')){
            $cashier->cover_image = $fileNameToStore;
        }
        $cashier->save();

        return redirect('/cashiers')->with('success','Cashier Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashier = cashier::find($id);
        if($cashier->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$cashier->cover_image);
        }
        $cashier->delete();
        return redirect('/cashiers')->with('success','Cashier Removed');
    }
}
