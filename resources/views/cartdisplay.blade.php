@if(count($cadetails) > 0)
  @foreach($cadetails as $d)
    <li>{{$d->name}}</li>
    <li>{{$d->price}}</li>
    <li>{{$d->options->name}}</li>
  @endforeach
@endif
