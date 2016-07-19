<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Cart;
use App\Cake;
use Request;
//use Moltin\Cart\Cart;
//use Moltin\Cart\Storage\Session;
//use Moltin\Cart\Identifier\Cookie;

class Cartcontroller extends Controller
{
    //
    
    public function adding(Request $request){

      //$act=Input::get('act');
      if($_POST['act']=='Buy Now')
      {
      
        
        $item =Input::get('cake_id');
        $item_name= Input::get('cake_name');
        $item_size = Input::get('cake_size');
        $item_price= (float)Input::get('cake_price');
        $msg = Input::get('message');
        $ownmsg = Input::get('ownmsg');
        $name = Input::get('name_for');



        $cdetails = Cart::add(array('id'=>str_random(60), 'name'=>$item_name, 'qty'=>'1', 'price'=>$item_price, 'options'=>array('cake_id'=>$item, 'size' =>$item_size , 'defmsg'=>$msg,
          'omsg'=>$ownmsg, 'name'=>$name)));

        //return $item.$item_price.$item_name;
      

        $cadetails = Cart::content();

        $total = Cart::total();

        //$details = Cake::all();
        $tot = Cart::count();
         return view('checkout', compact('cadetails'));

      }
      else{
        if($_POST['act']=='Add to Cart'){
        $item =Input::get('cake_id');
      	$item_name= Input::get('cake_name');
        $item_size = Input::get('cake_size');
      	$item_price= (float)Input::get('cake_price');
        $msg = Input::get('message');
        $ownmsg = Input::get('ownmsg');
        $name = Input::get('name_for');



      	$cdetails = Cart::add(array('id'=>str_random(60), 'name'=>$item_name, 'qty'=>'1', 'price'=>$item_price, 'options'=>array('cake_id'=>$item, 'size' =>$item_size , 'defmsg'=>$msg,
          'omsg'=>$ownmsg, 'name'=>$name)));

      	//return $item.$item_price.$item_name;
      

      	$cadetails = Cart::content();

      	$total = Cart::total();

        $details = Cake::all();
        $tot = Cart::count();
        notify()->flash('Added to Cart', 'success');
        return view('cakespage', compact('details'))->with(['total'=>$tot]); 
      //  $total = Cart::totalItems();
      
        
      }
      }
      //@endif




    }

    public function showcart(){
      $cadetails = Cart::content();

      $total = Cart::total();

      return view('checkout', compact('cadetails'));
    }

    public function remove(){
    //  Cart::destroy();

      $id = Input::get('id');
     // Cart::remove($id);
      $rowId = Cart::search(array('id' => Request::get('id')));
      Cart::remove($rowId[0]);

      $cadetails = Cart::content();

      $total = Cart::total();
      notify()->flash("Deleted", 'success');
      return view('checkout', compact('cadetails'));

    }

    
}
