@include('layout.header_back')

<!-- Page content -->
<div id="content" class="col-md-12">









    <!-- page header -->
    <div class="pageheader">


        <h2><i class="fa fa-pencil"></i> Master Karateristik
            <span>List Data</span></h2>


        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i> Master Karateristik</li>
                <li>List Data</li>

            </ol>
        </div>


    </div>
    <!-- /page header -->
    <br>

    <div class="row">

        <div class="col-md-11">
            <a href="{{url('menu/create')}}" class="btn btn-primary"><i class="fa fa-plus"> Tambah Data</i></a>

            <section class="tile transparent">


                <!-- tile header -->
                <div class="tile-header transparent">

                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body color transparent-black rounded-corners">

                    <div class="table-responsive">
                        <table  class="table table-datatable table-custom" id="basicDataTable">
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Name</center></th>
                                <th><center>Parent Name</center></th>
                                <th><center>Aksi</center></th>
                              </tr>
                              @foreach($karakter as $val)
                              <tr>
                                <td><center>{{$no++}}</center></td>
                                <td><center>{{$val->nama}}</center></td>
                                @if(!empty($val->parent_id))
                                  <?php $parent=DB::table('masterkarakteristik')->where('id',$val->parent_id)->get()?>
                                  @foreach($parent as $val2)
                                  <td><center>{{$val2->nama}}</center></td>
                                  @endforeach
                                @else
                                <td><center>-</center></td>
                                @endif
                                <td><center>
                                  <a class="btn btn-success" href="{{url('menu/'.$val->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-danger" href="{{url('menu/'.$val->id.'/delete')}}"><i class="fa fa-trash-o"></i></a></center>
                                </td>
                              </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                <!-- /tile body -->



            </section>
            <center>{{$karakter->links('vendor.pagination.bootstrap-4')}}</center>

        </div>
    </div>










</div>
<!-- Page content end -->



@include('layout.footer_beck')
