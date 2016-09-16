@extends('base')

@section('browsertitle')
  Reviews
@stop

@section('content')
  <h1>Reviews</h1>


  <div class="list-group">
    @foreach($reviews as $item)
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading"><u>{!! $item->title !!}</u></h4>
        <p style="color: #008080">Reviewed by <strong>{!! $item->fullname !!}</strong></p>
        <p class="list-group-item-text">{!! date("F d, y", strtotime($item->created_at)) !!}</p>
        <h5><strong>{!! $item->review !!}</strong></h5>
      </a>
      <br>
    @endforeach
  </div>


@stop
