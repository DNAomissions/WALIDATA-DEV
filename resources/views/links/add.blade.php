@include('layouts.header_back')
<div class="row">
  <div class="col-md-7">
    <form class="" action="{{url($url)}}" method="POST">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="usr">Name:</label>    
      @if(!empty($kar))  
      <input name="nama" type="text" class="form-control" id="usr" value="{{$kar->nama}}"> @else
      <input name="nama" type="text" class="form-control" id="usr" > @endif
    </div>
    <div class="form-group">
      <label for="usr">Link:</label>
       @if(!empty($kar))
      <input name="link" type="text" class="form-control" id="usr" value="{{$kar->link}}"> @else
      <input name="link" type="text" class="form-control" id="usr" > @endif
    </div>

    <button type="submit" class="btn btn-primary pull-right" name="button">Save</button>
  </form>
  </div>
</div>
@include('layouts.footer_beck')
