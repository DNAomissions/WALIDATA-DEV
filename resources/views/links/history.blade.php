@include('layouts.header_back')
<div class="row">
  <div class="col-md-11">
    <a href="{{url('links/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    <table class="table table-striped table-bordered">
      <tr>
        <th><center>No</center></th>
        <th><center>Nama</center></th>
        <th><center>Link</center></th>
        <th><center>Tanggal Dibuat</center></th>
        <th><center>Status Link</center></th>
        <th><center>Aksi</center></th>
      </tr>
      @foreach($alllinks as $val)
      <tr>
        <td><center>{{$no++}}</center></td>
        <td><center>{{$val->nama}}</center></td>
        <td><center>{{$val->link}}<center></td>
        <td><center>{{$val->created_at}}<center></td>
        <td><center>
            <form action="#">
              @if($val->status != 1)
                <p><input type="checkbox" class="toogle-link" id="{{$val->id_link}}" value="{{$val->id_link}}"/><label for="{{$val->id_link}}"><span class="ui"></p>
              @else
              <p><input type="checkbox" class="toogle-link" id="{{$val->id_link}}" value="{{$val->id_link}}" checked /><label for="{{$val->id_link}}"><span class="ui"></p>
              @endif
            </form>
        </td>
        <td><center>
          @if(empty($val->link))
          <a class="btn btn-primary" href="{{url('links/'.$val->id_link.'/create')}}"><i class="fa fa-link"></i></a>
          @else
          <a class="btn btn-success" href="{{url('links/'.$val->id_link.'/edit')}}"><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="{{url('links/'.$val->id_link.'/delete')}}"><i class="fa fa-trash-o"></i></a></center>
          @endif
        </td>
      </tr>
      @endforeach
    </table>
    <center>{{$alllinks->links('vendor.pagination.bootstrap-4')}}</center>

  </div>
</div>
<script>
  $("input").on("click", function () {
        var id = $("input:checked").val();
        var token = '{{csrf_token()}}';

        if ($(this).is(':checked')) {
          
          var formData = {
            '_token': token,
            'id'    : id,
            'status': 1
          };

          $.ajax({
            url: '{{URL('update_link')}}',
            type: 'post',
            data: formData,
            async: true,
            success: function (data) {
              alert('Data '+id+' berhasil di update');
            }
          })
        } else {
          var formData = {
            '_token': token,
            'id'    : id,
            'status': 0
          };

          $.ajax({
            url: '{{URL('update_link')}}',
            type: 'post',
            data: formData,
            async: true,
            success: function (data) {
              alert('Data '+id+' berhasil di update');
            }
          })
        }
});
</script>

@include('layouts.footer_beck')
