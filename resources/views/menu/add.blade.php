@include('layouts.header_back')
<div class="row">
  <div class="col-md-7">
    <form class="" action="{{url($url)}}" method="POST">
      {{ csrf_field() }}
    <div class="form-group">
      <label for="usr">Name:</label>
      @if(!empty($kar))
      <input name="nama" type="text" value="{{$kar->nama}}" class="form-control" id="usr">
      @else
      <input name="nama" type="text" class="form-control" id="usr">
      @endif
    </div>
    <div class="form-group">
      <label for="usr">Parent</label>
      <select name="parent" type="text" class="form-control">
        @if(!empty($kar))
        <?php $prt = DB::table('masterkarakteristik')->where('parent_id',$kar->parent_id)->first()?>
        @if($prt->parent_id == null)
        <option value="0">-</option>
        @else
        <option value="{{$prt->parent_id}}">{{$prt->nama}}</option>
        @endif
        @else
        <option value="0">--Pilih Parent--</option>
        @endif
        @foreach($parent as $val)
        <option value="{{$val->id}}">{{$val->nama}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="usr">User</label>
      <select name="user" type="text" class="form-control">
        <option value="0">--Pilih User--</option>
        @foreach($user as $val)
        <option value="{{$val->id}}">{{$val->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary pull-right" name="button">Save</button>
  </form>
  </div>
</div>
@include('layouts.footer_beck')
