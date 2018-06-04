@include('layouts.header_back')
<div class="row">
  <div class="col-md-7">
    <form class="" action="{{url($url)}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="usr">Nama:</label>
        @if(!empty($data_user))
        <input name="nama" type="text" value="{{$data_user->name}}" class="form-control" id="usr"> @else
        <input name="nama" type="text" class="form-control" id="usr"> @endif
      </div>

      <div class="form-group">
        <label for="usr">Email:</label>
        @if(!empty($data_user))
        <input name="email" type="email" value="{{$data_user->email}}" class="form-control" id="usr"> @else
        <input name="email" type="email" class="form-control" id="usr"> @endif
      </div>

      <div class="form-group">
        <label for="usr">Password:</label>
        @if(!empty($data_user))
        <input name="password" type="text" value="{{$data_user->password}}" class="form-control" id="usr"> @else
        <input name="password" type="text" class="form-control" id="usr"> @endif
      </div>

      <div class="form-group">
        <label for="usr">Role:</label>
        <select name="role" type="text" class="form-control">
          <option value="">--Pilih Role--</option>
          @if(!empty($data_user))
            @if($data_user == 'Admin')
            <option value="{{$data_user->role}}" selected>{{$data_user->role}}</option>
            <option value="User">User</option>
            @else
            <option value="Admin">Admin</option>
            <option value="{{$data_user->role}}" selected>{{$data_user->role}}</option>
            @endif
          @else
          <option value="Admin">Admin</option>
          <option value="User">User</option>
          @endif          
        </select>
      </div>
      <button type="submit" class="btn btn-primary pull-right" name="button">Save</button>
    </form>
  </div>
</div>
@include('layouts.footer_beck')
