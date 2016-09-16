@extends('base')

@section('content')

    <h1>Add Review</h1>

    <form method="post" name="reviewform"
        class="form-horizontal" id="reviewform" action="/add-review">

        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control required" id="title"
              name="title" placeholder="Title">
          </div>
        </div>

        <div class="form-group">
          <label for="review" class="col-sm-2 control-label">Review</label>
          <div class="col-sm-10">
            <textarea class="form-control required" name="review"></textarea>
          </div>
        </div>

        <hr>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Save Review</button>
          </div>
        </div>
    </form>

    <br>
    <br>
@stop

@section('bottomjs')
<script>
$(document).ready(function(){
    $("#reviewform").validate();
});
</script>
@stop
