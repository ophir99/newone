<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Celebrate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,700,300,900,700italic' rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="css/cakepage.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.js">

	</script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">


</head>
<body>
	<div class="container-fluid p_header">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<img class="h_logo center-block" src="images/logo.png">
			</div>
			<div class="col-md-4 col-md-offset-5 text-right c_btn">
				<div class="btn-group">
					<button type="button" class="btn btn-lg dropdown-toggle log_btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change city <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">Hyderabad</a></li>
					</ul>
				</div>

				<a href="checkout"><button class="btn btn-lg log_btn"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">{{$total}}</span></button></a>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 check_text effect2">
				<h1 class="text-center">Pick your cake</h1>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row cakes_list">

			<div class="col-md-10 col-md-offset-1">


				@if(count($details) > 0)
					@foreach($details as $detail)
				<div class="col-md-3 col-sm-4 col-xs-6 text-center">

					<figure class="figure">
						<div class="hovereffect">
							<img class="img-responsive" src="images/{{$detail->cake_image_name}}" alt="" />
							<div class="overlay">
								<h2>{{$detail->cake_price}}</h2>
								<button type="button" class="btn btn-warning m_drop" data-toggle="modal" data-target=".bs-example-modal-lg-{{$detail->id}}">Details</button>
							</div>
						</div>
						<figcaption class="figure-caption">

							<h4>{{$detail->cake_name}}</h4>

						</figcaption>
					</figure>

				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>

	<!--modal start-->
	@if(count($details) > 0)
		@foreach($details as $detail)
	<div class="modal fade bs-example-modal-lg-{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="row modal_padding text-center">
					<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 r_content">
						<div class="row text-center">
							<div class="col-md-6  ">
								<img  class="img-res" src="images/{{$detail->cake_image_name}}">
							</div>
							<div class="col-md-6 ">
								<div class="row">
									<div class="col-md-12">
										<h2>{{$detail->cake_name}}</h2>
										<h4>Rs. {{$detail->cake_price}} (including taxes)</h4>
										<form action="cart" method="POST" role="form" data-toggle="validator" id="registration-form" class="form-horizontal">
											<input type="hidden" name="cake_id" value="{{$detail->id}}">
											<input type="hidden" name="cake_name" value="{{$detail->cake_name}}">
                      <input type="hidden" name="cake_price" value="{{$detail->cake_price}}">
										<div class="form-group">
											<label class="" for="cake_type">If you want eggless, click here:</label>
											<input type="checkbox" id="cake_type" value="eggless" name="cake_type"><b>Eggless</b>
											<!--<label class="checkbox-inline">
 											 <input type="checkbox" id="inlineCheckbox2" value="option2">Heart shape
 											</label>-->
 										</div>
 										<div class="form-group">
 												<label for="cake_size">Select size here:</label>
 												<input type="radio" name="cake_size" id="cake_size" value="half"> 1/2 KG

 												<input type="radio" name="cake_size" id="cake_size" value="one"> 1 KG

 												<input type="radio" name="cake_size" id="cake_size" value="two"> 2 KG

 										</div>

 										<div class="form-group">

 											<label for="msg">Message on cake:</label>
											<select id="msg" class="form-control form-group" name="message">
												<option value="option">Happy B'day</option>
												<option value="option">Happy Anniversary</option>
												<option value="option">Happy Marriage Day</option>
											</select>
											<label for="ownmsg">You can also type your own message:</label>
 											<input type="text" id="ownmsg" class="form-control form-group" name="ownmsg" placeholder="Type your own message">
											<label for="name_for">Type name of person to whom you want to gift </label>
											<input type="text" class="form-control form-group" id="name_for" name="name_for" value="" placeholder="Type name ...">
											<label for="">..</label>
											<input type="hidden" name="_token" value="{{csrf_token()}}">
 											<input type="submit" class="btn btn-danger" type="button" name="act" value="Buy Now">
 											<input type="submit" class="btn btn-danger" type="button" name="act" value="Add to Cart">
 										</div>
									</form>
 									</div>
 								</div>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-md-12">
 								<h4>Description</h4>
 								<p>Lorem ipsum dolor sit amet, consectetuer adipisc in elit, sed diam non ummy nibh in euismod tincidunt ut liber tempor laoreet. Nullam viverra orci id lectus aliquam luctus. Aliquam elementum gravida lacus non accumsan. Nullam ultrices purus ac porta tincidunt. Nullam vel scelerisque dui, posuere pulvinar arcu</p>
 							</div>
 						</div>
 						<div class="text-center">
 							<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
	@endforeach
		@endif

 	<!--modal end-->
	<script src="dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	@if (notify()->ready())
		swal({
			title: "{{ notify()->message() }}",
			type: "{{ notify()->type() }}"
		});
	@endif
	</script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function (){
			$('form').each(function (){
				var validator = $(this).bootstrapValidator({
					fields: {
						ownmsg : {
							message: "It is required",
							validators : {
									notEmpty : {
										message: "Please Fill Message Field"
									}
							}
						},

						cake_size:{
							message: "It is required",
							validators:{
								notEmpty :{
									message: "Please select your cake size"
								}
							}
						},
						name_for:{
							message: "It is required",
							validators:{
								notEmpty :{
									message: "Please enter name of person to who you want to gift cake"
								}
							}
						}
					}
				});
			});
		});
	</script>
 </body>
 </html>
