<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\item;
use App\brand;
use App\type;


class itemsController extends Controller
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
        $items =  item::all();
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
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
            'brand_id' => 'required',
            'barcode' => 'required',
            'description' => 'required',
            'company' => 'required',
            'type_id' => 'required',
            'units' => 'required',
            'quantity' => 'required',
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

        $item = new item;
        $item->title = $request->input('title');
        $item->brand_id = $request->input('brand_id');
        $item->barcode = $request->input('barcode');
        $item->description = $request->input('description');
        $item->company = $request->input('company');
        $item->type_id = $request->input('type_id');
        $item->units = $request->input('units');
        $item->quantity = $request->input('quantity');
        $item->cover_image = $fileNameToStore;
        $item->save();

        return redirect('/items')->with('success','Item Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = item::find($id);
        $brands = brand::where('item_id',$id)->get();
        $types = type::where('item_id',$id)->get();
        $data=[
            'item'=>$item,
            'brands'=>$brands,
            'types'=>$types,
        ];
        return view('items.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::find($id);
        return view('items.edit')->with('item', $item);
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
            'brand_id' => 'required',
            'barcode' => 'required',
            'description' => 'required',
            'company' => 'required',
            'type_id' => 'required',
            'units' => 'required',
            'quantity' => 'required',
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

        $item = item::find($id);
        $item->title = $request->input('title');
        $item->brand_id = $request->input('brand_id');
        $item->barcode = $request->input('barcode');
        $item->description = $request->input('description');
        $item->company = $request->input('company');
        $item->type_id = $request->input('type_id');
        $item->units = $request->input('units');
        $item->quantity = $request->input('quantity');
        if($request->hasFile('cover_image')){
            $item->cover_image = $fileNameToStore;
        }
        $item->save();

        return redirect('/items')->with('success','Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::find($id);

        if($item->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$item->cover_image);
        }

        $item->delete();

        return redirect('/items')->with('success','Item Removed');
    }
}

//<div class="card shadow">
    //<div class="card-body">
        //<div class="card-title"><h3><a href="/items/{{$item->id}}">{{$item->title}}</a></h3></div>
        //<div class="card-text"><small>Written on {{$item->created_at}}</small></div>
    //</div>
//</div><br>