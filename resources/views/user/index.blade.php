@include('layouts.header_back')
<div class="row">
  <div class="col-md-11">
    <a href="{{url('user/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    <table class="table table-striped table-bordered">
      <tr>
        <th><center>No</center></th>
        <th><center>Name</center></th>
        <th><center>Email</center></th>
        <th><center>Role</center></th>
        <th><center>Aksi</center></th>
      </tr>
      @foreach($user as $val)
      <tr>
        <td><center>{{$no++}}</center></td>
        <td><center>{{$val->name}}</center></td>
        <td><center>{{$val->email}}</center></td>
        <td><center>{{$val->role}}</center></td>
        <td><center>
          <a class="btn btn-success" href="{{url('user/'.$val->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="{{url('user/'.$val->id.'/delete')}}"><i class="fa fa-trash-o"></i></a></center>
        </td>
      </tr>
      @endforeach
    </table>
    <center>{{$user->links('vendor.pagination.bootstrap-4')}}</center>

  </div>
</div>


@include('layouts.footer_beck')
