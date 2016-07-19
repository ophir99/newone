<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Files;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Cake;
use Image;
use Cart;
use Session;
class Cakecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cakedetails = Cake::all();

        return view('dashboard', compact('cakedetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->Validate($request, [
            'cake_name'=> 'required|unique:cake_items', 'cake_image'=>'required','cake_size'=>'required|numeric', 'cake_type'=>'required|alpha', 'cake_price'=>'required|numeric', 'cake_image_name'=>'unique:cake_items'
            ]);
       // $image = Input::file('cake_image');

        if($request->hasFile('cake_image')){
            $fimage= $request->file('cake_image');
            $filename = $fimage->getClientOriginalName();
           // Storage::disk('local')->put($filename,$image);
            Image::make($fimage)->save(public_path('/images/'.$filename));
        }
        $cin = new Cake;
        $cin->cake_name = Input::get('cake_name');
        $cin->cake_image_name = $filename;
        $cin->cake_size = Input::get('cake_size');
        $cin->cake_type = Input::get('cake_type');
        $cin->cake_price = Input::get('cake_price');
        //$cin->delivery_mode = Input::get('delivery_mode');
        $cin->save();

        $cakedetails = Cake::all();

        return view('dashboard', compact('cakedetails'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $details = Cake::all();

        return view('cakespage', compact('details'));
    }

    public function showcontrol(Request $request)
    {
        //
        $this->validate($request, [
          'location'=>'required', 'delivery_type'=>'required'
        ]);
        $location = Input::get('location');
        $dtype=Input::get('delivery_type');
        Session::put('location', $location);
        Session::put('delivery_type', $dtype);
        //$arr = array('location' => $location , 'delivery_type'=>$dtype);
        $details = Cake::all();
        $tot = Cart::count();
        return view('cakespage', compact('details'))->with(['total'=>$tot])->with('$location');
    //  return view('cakespage', ['total'=>$tot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {
         //

         $id=Input::get('cake_id');

         Cake::find(Input::get('cake_id'))->delete();
         //$eff = Cake::where('id', '=', '$id')->delete();
         //return "deleted".$id;
         //index();

         $cakedetails = Cake::all();
         return view('dashboard', compact('cakedetails'));
     }
}
