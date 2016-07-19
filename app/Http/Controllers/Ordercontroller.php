<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use Cart;
use App\Cake;
use  Illuminate\Support\Facades\Input;
use Session;
use App\Order;
use DateTime;
class Ordercontroller extends Controller
{
    //
    public function buying(Request $request){
        $i=0;
        $this->Validate($request, ['fname'=>'required|alpha', 'lname'=>'required|alpha', 'email'=>'required|email', 'mobile'=>'required|numeric']);

    	$cartitems = Cart::content();
    	if (count($cartitems) > 0 ){
    		
    		foreach ($cartitems as $ci) {
                $i++;
    	$customer_name = Input::get('fname').Input::get('lname');
        $now =  date(DATE_RFC2822);
    	$mobile = Input::get('mobile');
    	$email = Input::get('email');
    	$location= Session::get('location');
    	$delivery_type = Session::get('delivery_type');
    	$cake_name = $ci->name;
    	$cake_size = $ci->options->size;
    	$cake_type = $ci->type;
    	$cake_price = $ci->price;
        $cake_id = $ci->options->cake_id;
        $def_msg =  $ci->options->defmsg;
        $own_msg = $ci->options->omsg;
        $person_name = $ci->options->name;
        $order_id = $now.$delivery_type.$customer_name.$i;

        $cin = new Order;
        $cin->order_id = $order_id;
        $cin->cake_id = $cake_id;
        $cin->cake_name = $cake_name;
        $cin->customer_name = $customer_name;
        $cin->cake_size = $cake_size.'KG';
        $cin->cake_price = $cake_price;
        if($cake_type=="eggless"){
        $cin->cake_type = "No Egg";
        }
        $cin->default_msg = $def_msg;
        $cin->custom_msg = $own_msg;
        $cin->delivery_type = $delivery_type;
        $cin->address = $location;
        $cin->name_person = $person_name;
        $cin->order_status = "ORDERED JUST NOW";
        $cin->mobile_number = $mobile;
        $cin->save();
    	
    		}
    	}


        $total = Cart::total();
        $cust_name = Input::get('fname')." ".Input::get('lname');
        $emailad = Input::get('email');
        return view('emailpage',compact('cartitems'))->with(['name'=>$customer_name, 'total'=>$total, 'email'=>$emailad]);

       
    }

    public function checkingout(){

        return view('dataFrom');
    }
}



  /*      Mail::send('email',['name'=>'Sonu'], function($message){

    $message->to('sharathkoppolu@gmail.com', 'Sharath anna')->subject('Bro check this');
  });
 */

  /*
        
         $emailad = Input::get('email');
         Mail::send('emailpage',compact('cartitems'), function($message){

    $message->to($emailad)->subject('Bro check this');
      });
     return view('emailpage',compact('cartitems'))->with(['name'=>$customer_name, 'total'=>$total, '']);

  */