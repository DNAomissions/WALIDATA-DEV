@include('layouts.header_back')
<div class="row">
  <div class="col-md-11">
    <table class="table table-striped table-bordered">
      <tr>
        <th><center>No</center></th>
        <th><center>Name</center></th>
        <th><center>Link</center></th>
        <th><center>Aksi</center></th>
      </tr>
      @foreach($karakter as $val)
      <tr>
        <td><center>{{$no++}}</center></td>
        <td><center>{{$val->sub_menu}}</center></td>
        <td><center>{{$val->url}}<center></td>
        <td><center>
          @if(empty($val->url))
          <a class="btn btn-primary" href="{{url('links/'.$val->id.'/create')}}"><i class="fa fa-link"></i></a>
          @else
          <a class="btn btn-success" href="{{url('links/'.$val->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="{{url('links/'.$val->id_link.'/delete')}}"><i class="fa fa-trash-o"></i></a></center>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
    <center>{{$karakter->links('vendor.pagination.bootstrap-4')}}</center>

  </div>
</div>


@include('layouts.footer_beck')
