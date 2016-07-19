<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Celebrate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,700,300,900,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<style>
		.errr{
			background-color: #FFF;
			color: red;
		}
	</style>
</head>
<body>
	<form action="posting" method="POST">
		<div class="container-fluid">
			<div class="row text-center">
				<div class="col-md-12 col-sm-12 col-xs-12 ">
					<img class="h_logo" src="images/log.png">
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="container-fluid text-center">
			<div class="row text-center r_search">
				<div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-3 col-sm-offset-3 col-xs-offset-1">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-filter"></span></div>
						<input type="text" id="locationTextField" class="form-control r_s_border" placeholder="Enter your location here" aria-describedby="sizing-addon1" name="location">

					</div>

					@if(count($errors)>0)
						@foreach($errors->all() as $err)
							<li class="errr">{{$err}}</li>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 d_l_border effect2">
					<div class="row">
						<div class="col-md-4 col-sm-4 col_bg_xs text-center">

							<h3>Express </h3>
							<p>Delivered in 60 Minutes</p>
							<p>Selected flavours available</p>
							<p>9:00 Am to Midnight</p>
							<div class="radio btn btn-danger">
								<label>
								<input type="radio" name="delivery_type" id="optionsRadios1" value="EXP" onclick="this.form.submit();">Go! Express
								</label>
							</div>
							<!--<button class="btn btn-danger">Go! Express</button>-->

						</div>
						<div class="col-md-4 col-sm-4 col_bg_xs text-center">

							<h3>Regular </h3>
							<p>Delivered in 4 Hours</p>
							<p>All regular flavours available</p>
							<p>9:00 Am to 9:00 Pm</p>
							<div class="radio btn btn-danger">
								<label>
								<input type="radio" name="delivery_type" id="optionsRadios1" value="REG" onclick="this.form.submit();">Go! Regular
								</label>
							</div>
							<!--<button class="btn btn-danger">Go! Regular</button>-->

						</div>
						<div class="col-md-4 col-sm-4 col_bg_xs text-center">

							<h3>Pre-Order</h3>
							<p>Delivered after 12 hours</p>
							<p>Special cakes & large cakes</p>
							<p>24/7 delivery available</p>
							<div class="radio btn btn-danger">
								<label>
								<input type="radio" name="delivery_type" id="optionsRadios1" value="PRE" onclick="this.form.submit();">Pre-order Now
								</label>
							</div>
							<!--<button class="btn btn-danger">Pre-order Now</button>-->

						</div>

					</div>
						<div class="row text-center proceed_btn" style="margin-top:30px;">
				<!--	<button class="btn ">Click here to proceed</button> -->
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	</form>
	<script type="text/javascript">
	function init() {
	                var input = document.getElementById('locationTextField');
	                var autocomplete = new google.maps.places.Autocomplete(input);
	            }

	            google.maps.event.addDomListener(window, 'load', init);

	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
