<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Celebrate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,700,300,900,700italic' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" type="text/css" href="css/emailpage.css">
</head>
<body>
	<div class="container-fluid p_header">
		<div class="row ">
			<div class="col-md-12 text-center">
				<img class="h_logo" src="images/logo.png">
			</div>			
		</div>
		
	</div>
	<div class="container-fluid body_table">		
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h4>Hello <span> {{$name}}</span></h4>
						<p>Your order has been booked Just now. <b>You will recieve a call from us soon</b></p>
					</div>
				</div>				
				<div class="row">
				<div class="col-md-12">
				
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Item</th>								
								<th>Quantity</th>
								<th>Cost</th>
							</tr>
						</thead>
						<tbody>
						@if(count($cartitems) > 0)
					@foreach($cartitems as $ci)
							<tr>
								<th scope="row">1234567890</th>
								<td>{{$ci->name}}</td>
								<td>1</td>
								<td>{{$ci->price}}</td>
							</tr>
						
					@endforeach
					<tr><td></td><td></td><td>Total:</td> <td>{{Cart::total()}} Rs</td></tr>
					@endif
					</tbody> 
					</table>
				
				</div>
				</div>
				<div class="col-md-12 text-center">
				<img class="dimage" src="images/ed.png">
				<h4>Our Delivery person will be at your door step shortly</h4>
				</div>
			</div>			
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 
</body>
</html>

<!--{{

Mail::send('email',['name'=>'Sonu'], function($message){

    $message->to('ctrlcplusctrlv99@gmail.com', 'Hello dude')->subject('Awesome man');
    })

    }} -->

    <?php

    $message= '<table class="table table-bordered">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Item</th>								
								<th>Quantity</th>
								<th>Cost</th>
							</tr>
						</thead>
						<tbody>
						@if(count($cartitems) > 0)
					@foreach($cartitems as $ci)
							<tr>
								<th scope="row">1234567890</th>
								<td>{{$ci->name}}</td>
								<td>1</td>
								<td>{{$ci->price}}</td>
							</tr>
						
					@endforeach
					<tr><tds></td><td></td><td>Total:</td> <td>{{Cart::total()}} Rs</td></tr>
					@endif
					</tbody> 
					</table>';

    ?>
{{    $eadd = $email
}}
    
    {{

    $cartitems= Cart::content()
    }}
    {{

    Mail::send('emailawe', compact('cartitems'), function($message){

    $message->to('ctrlcplusctrlv99@gmail.com')->subject('Bro check this');
      })


    }}
{{Cart::destroy()}}