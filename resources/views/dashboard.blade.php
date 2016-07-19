@extends('.master')

@section('content')

<div class="upper">
  <div class="container">

    <h4>Welcome to</h4>
    <h1>Cakes dashboard</h1>
    <hr>
    <form class="" action="postcakes" method="post" enctype="multipart/form-data">
      <div class="row">

          <div class="six columns">
            <label for="cake_image"> Choose Cake Image: </label>
            <input type="file" name="cake_image" class="button">
          </div>
          <div class="six columns">
            <label for="cake_name">Choose Cake Name:</label>
            <input type="text" name="cake_name">
          </div>


      </div>
      <div class="row">
        <div class="six columns">
          <label for="cake_size">Choose Cake Size:</label>
          <select class="" name="cake_size">
            <option value="no"> -- select --</option>
            <option value="0.5"> Half KG</option>
            <option value="1">One KG</option>
            <option value="2">Two KG</option>
            <option value="3">Three KG</option>


          </select>
        </div>
        <div class="six columns">
          <label for="cake_type">Choose Cake Type:</label>
          <select class="" name="cake_type">
               <option value="0">--Select--</option>
               <option value="Egg">With Egg</option>
               <option value="Eggless">Without Egg</option>
          </select>
        </div>
      </div>


      <div class="row">
        <div class="six columns">
          <label for="cake_price">Enter Cake Price:</label>
          <input type="text" name="cake_price" >
        </div>
        <div class="six columns">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <input type="submit" name="name" value="Post" class="button-primary">
        </div>
      </div>
    </form>
    <div class="error">
  @if(count($errors) > 0)
    @foreach($errors->all() as $err)
      <li>{{$err}}</li>
    @endforeach
  @endif
    </div>
  </div>



</div>

<div class="container">
  <div class="row">
    <div class="twelve columns">

      @if(count($cakedetails) > 0)
        @foreach($cakedetails as $cakes)
        <div  id="cakeslist">
          <div class="img">
            <img src="/images/{{$cakes->cake_image_name}}" alt="" />
          </div>
          <div class="details"> {{$cakes->cake_name}} /
            {{$cakes->cake_type }} / {{$cakes->cake_size}} / {{$cakes->cake_price}}
          </div>
          <div class="opt">
            <form class="oopt" action="update" method="post">
              <input type="hidden" name="cake_id" value="{{$cakes->id}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" name="name" value="Update">
            </form>
            <form class="oopt" action="delete" method="post">
              <input type="hidden" name="cake_id" value="{{$cakes->id}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" name="name" value="Delete">
            </form>
          </div>
        </div>
        @endforeach
        @else
          <p>
            No cakes posted ...
          </p>
        @endif

    </div>
  </div>
</div>


@stop
