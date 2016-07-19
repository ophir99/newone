<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Celebrate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,700,300,900,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
		<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
	<div class="container-fluid p_header">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<img class="h_logo center-block" src="images/logo.png">
			</div>
			<div class="col-md-3 col-md-offset-6 text-right c_btn">
				<div class="btn-group">
					<button type="button" class="btn btn-lg dropdown-toggle log_btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change city <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">Hyderabad</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 check_text effect2">
				<h1 class="text-center">Checkout</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1 d_l_border">
				<div class="row  d_type">
					<div class=" col-md-12 col-sm-12 check_out">
						<h3>Order Details</h3>
						<hr>
						<div class="row text-center">
							<div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1 d_l_border">
								<table class="table table-striped" style="text-align:left">
									<tr>
										<th>
											row id
										</th>

												<th>
													Item name
												</th>


												<th>
													Item Size
												</th>


												<th>
													Price
												</th>

											<th>
												Quantity

											</th>
									</tr>
									@if(count($cadetails) > 0)
										@foreach($cadetails as $cd)
										<tr>
											<td>
												{{$cd->id}}
											</td>
											<td>
												{{$cd->name}}
											</td>
											<td>
												{{$cd->options->size}}
											</td>
											<td>
												{{$cd->price}}
											</td>
											<td>
												{{$cd->qty}}
											</td>
											<td>
												<form class="" action="remove" method="post">
													<input type="hidden" name="id" value="{{$cd->id}}">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
													<input type="submit" name="name" value="Remove">
												</form>
											</td>
										</tr>


										@endforeach
									@endif
									<tr>
									<th></th>
										<th>

										</th>

										<th>
											Total:
										</th>
										<th>Rs:
											{{Cart::total()}} /-
										</th>
										<th>
									{{Cart::Count()}} Items
								</th>
									</tr>
								</table>
							</div>


						</div>

					</div>
				</div>
				<div class="row text-center d_type">
					<div class=" col-md-12 col-sm-12 check_out">
						<h4><span style="color: red;">Have a coupon?</span> Click here to enter your code</h4>
						<hr>
						<form class="form-inline">
							<div class="form-group">


									<input type="text" class="form-control" id="exampleInputAmount" placeholder="Coupon Code">
							</div>
							<button type="submit" class="btn btn-danger">APPLY COUPON</button>
						</form>
					</div>
				</div>
				<div class="row d_type">
					<div class="col-md-12 col-sm-12 check_out">
						<h3>Billing Details</h3>
						<hr>
						<div class="col-md-10 col-md-offset-1">
						<form action="proceed" method="POST">
							<div class="row">
										
								<div class="col-md-6 form-group">
									<label for="name">First Name*</label>
									<input class="name form-control" type="text" name="fname" placeholder="First name">
								</div>
								<div class="col-md-6  form-group">
									<label for="name">Last Name*</label>
									<input class="name form-control" type="text" name="lname" placeholder="Last name">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6  form-group">
									<label for="email">Email Address</label>
									<input class="email form-control" type="text" name="email" placeholder="Email Address">
								</div>
								<div class="col-md-6  form-group">
									<label for="Phone">Phone*</label>
									<input class="Phone form-control" type="text" name="mobile" placeholder="Phone number">
								</div>
							</div>
							<div class="row text-center">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="btn btn-danger d_type " type="submit" value="PROCEED FOR PAYMENT">
				</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script src="dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	@if (notify()->ready())
		swal({
			title: "{{ notify()->message() }}",
			type: "{{ notify()->type() }}"
		});
	@endif
	</script>
	<script type="text/javascript">
	/*	function funone(){
			$rowid = Cart::get($rowId);

			$hello = Cart::remove($rowid);
			alert($hello);
		} */
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
