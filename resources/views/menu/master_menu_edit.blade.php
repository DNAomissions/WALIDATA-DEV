@include('layout.header_back')

<!-- Page content -->
<div id="content" class="col-md-12">









    <!-- page header -->
    <div class="pageheader">


        <h2><i class="fa fa-th-list"></i>Edit Master Menu
            <span>List Data</span></h2>


        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><i class="fa fa-th-list"></i> Master Menu</li>
                <li>List Data</li>
            </ol>
        </div>
    </div>
    <!-- /page header -->
    <br>
    <div class="row">
        <div class="col-md-11">
            <section class="tile transparent">
                <!-- tile header -->
                <div class="tile-header transparent">

                </div>
                <!-- /tile header -->
                <!-- tile body -->
                <div class="tile-body color transparent-black rounded-corners">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
                        <div class="card">
                          <div class="card-header">
                            <h4>Edit Master Menu <strong class="h2">{{$usermenu_result->name}}</strong></h4>
                          </div>
                          <div class="card-body">
                            <form method="post" action="{{ url('/master_menu',$usermenu_result->id) }}">
                              {!! csrf_field() !!}
                              <?php

                                $daftarmenu = DB::table('menu')->get();

                                  foreach ($daftarmenu as $menu){
                                  if($usermenu_result->id == Auth::user()->id && $menu->id_menu == 8){
                                    ?>
                                    <div class="form-group">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}" checked disabled>
                                        <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}" checked hidden>
                                        <label class="custom-control-label" for="{{$menu->segment}}">{{$menu->menu}}</label>
                                      </div>
                                    </div>
                                    <?php
                                  }else if(strpos($usermenu_result->daftar_menu,(string)$menu->id_menu) !== false){
                                    ?>
                                    <div class="form-group">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}" checked>
                                        <label class="custom-control-label" for="{{$menu->segment}}">{{$menu->menu}}</label>
                                      </div>
                                    </div>
                                    <?php
                                  }else{
                                    ?>
                                    <div class="form-group">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}">
                                        <label class="custom-control-label" for="{{$menu->segment}}">{{$menu->menu}}</label>
                                      </div>
                                    </div>
                                    <?php
                                      }
                                  }
                                ?>
                                <button type="submit" class="btn btn-success">Ubah Hak Menu</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /tile body -->
            </section>
        </div>
    </div>
</div>
<!-- Page content end -->

<!-- Modal -->

<div class="modal fade" id="modalMasterMenu" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&nbsp;</button>
        <?php $usermenu_result = DB::table('users')->find(13); ?>
        <div class="modal-title">
          <h4>Edit Master Menu <strong class="h2">{{$usermenu_result->name}}</strong></h4>
        </div>
      </div>
      <div class="modal-body">
        <span id="modalNama"></span>
        <form method="post">
          <?php

            $daftarmenu = DB::table('menu')->get();

              foreach ($daftarmenu as $menu){
                  if(strpos($usermenu_result->daftar_menu,(string)$menu->id_menu) !== false){
                ?>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}" checked>
                    <label class="custom-control-label" for="{{$menu->segment}}">{{$menu->menu}}</label>
                  </div>
                </div>
                <?php
                  }else{
                ?>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="menu_user[]" value="{{$menu->id_menu}}" class="custom-control-input" id="{{$menu->segment}}">
                    <label class="custom-control-label" for="{{$menu->segment}}">{{$menu->menu}}</label>
                  </div>
                </div>
                <?php
                  }
              }
            ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@include('layout.footer_beck')
