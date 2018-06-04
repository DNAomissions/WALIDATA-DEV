<!DOCTYPE html>
<html>
<head>
    <title>Walidata Bathimetry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
    <!-- Bootstrap -->
    <link href={{asset("minimal/assets/css/vendor/bootstrap/bootstrap.min.css")}} rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{asset("minimal/assets/css/vendor/animate/animate.min.css")}}>
    <link type="text/css" rel="stylesheet" media="all" href={{asset("minimal/assets/js/vendor/mmenu/css/jquery.mmenu.all.css")}} />
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/videobackground/css/jquery.videobackground.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/css/vendor/bootstrap-checkbox.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/css/vendor/bootstrap/bootstrap-dropdown-multilevel.css")}}>

    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/rickshaw/css/rickshaw.min.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/morris/css/morris.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/tabdrop/css/tabdrop.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/summernote/css/summernote.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/summernote/css/summernote-bs3.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/chosen/css/chosen.min.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/chosen/css/chosen-bootstrap.css")}}>

    <!--datatable-->
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/datatables/css/dataTables.bootstrap.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/datatables/css/ColVis.css")}}>
    <link rel="stylesheet" href={{asset("minimal/assets/js/vendor/datatables/css/TableTools.css")}}>

    <link rel="stylesheet" href={{asset("minimal/assets/css/minimal.css")}}>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="solid-bg-6">
<div style="height:100%; overflow: hidden;">


    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">




        <!-- Make page fluid -->
        <div class="row">





            <!-- Fixed navbar -->
            <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top collapsed" role="navigation" id="navbar">



                <!-- Branding -->
                <div class="navbar-header col-md-2">
                    <a class="navbar-brand" href="{{url('/dashboard')}}">

                         <strong>PUSHIDROSAL</strong>
                    </a>
                    <div class="sidebar-collapse">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                <!-- Branding end -->


                <!-- .nav-collapse -->
                <div class="navbar-collapse">

                    <!-- Page refresh -->
                    <ul class="nav navbar-nav refresh">
                        <li class="divided">
                            <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
                        </li>
                    </ul>
                    <!-- /Page refresh -->


                    <!-- Quick Actions -->
                    <ul class="nav navbar-nav quick-actions">

                    @if(Auth::check())
                        @if( Auth::user()->role == 'Admin')
                        <li class="dropdown divided">

                            <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>
                                <span class="label label-transparent-black"><?= $val ?></span>
                            </a>

                            <ul class="dropdown-menu wide arrow nopadding bordered" >

                                <li><h1>You have <strong><?= $val ?></strong> new notifications</h1></li>

                                @foreach($total as $log)

                                <?php if($log->kategori = 'Tambah User'){
                                    $clas = '<span class="label label-green"><i class="fa fa-user"></i></span>';
                                }elseif($log->kategori = 'Tambah'){
                                    $clas = '<span class="label label-green"><i class="fa fa-plus"></i></span>';
                                 }elseif($log->kategori = 'Edit'){
                                    $clas = '<span class="label label-blue"><i class="fa fa-pencil"></i></span>';
                                 }elseif($log->kategori = 'Delete'){
                                     $clas = '<span class="label label-red"><i class="fa fa-trash-o"></i></span>';
                                 } ?>

                                <li>
                                    <a href="{{url('history_log/'.$log->id_log.'/edit')}}">

                                        <?= $log->keterangan ?>
                                        {{--<span class="small">18 mins</span>--}}
                                    </a>
                                </li>
                                @endforeach
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="label label-red"><i class="fa fa-power-off"></i></span>--}}
                                        {{--Server down.--}}
                                        {{--<span class="small">27 mins</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="label label-cyan"><i class="fa fa-power-off"></i></span>--}}
                                        {{--Server restared.--}}
                                        {{--<span class="small">45 mins</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="label label-amethyst"><i class="fa fa-power-off"></i></span>--}}
                                        {{--Server started.--}}
                                        {{--<span class="small">50 mins</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                                <li><a href="{{url('/history_log')}}" style="color:#0e90d2;"><center>Check all notifications<i class="fa fa-angle-right"></i> </center></a></li>
                            </ul>

                        </li>
                        @endif
                        @endif

                        <li class="dropdown divided user" id="current-user">
                            <div class="profile-photo">
                                {{--<img src="minimal/assets/images/profile-photo.jpg" alt />--}}
                            </div>
                            <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                                {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu arrow settings">

                                <li>

                                    <h3>Backgrounds:</h3>
                                    <ul id="color-schemes">
                                        <li><a href="#" class="bg-1"></a></li>
                                        <li><a href="#" class="bg-2"></a></li>
                                        <li><a href="#" class="bg-3"></a></li>
                                        <li><a href="#" class="bg-4"></a></li>
                                        <li><a href="#" class="bg-5"></a></li>
                                        <li><a href="#" class="bg-6"></a></li>
                                        <li class="title">Solid Backgrounds:</li>
                                        <li><a href="#" class="solid-bg-1"></a></li>
                                        <li><a href="#" class="solid-bg-2"></a></li>
                                        <li><a href="#" class="solid-bg-3"></a></li>
                                        <li><a href="#" class="solid-bg-4"></a></li>
                                        <li><a href="#" class="solid-bg-5"></a></li>
                                        <li><a href="#" class="solid-bg-6"></a></li>
                                    </ul>


                                </li>





                                <li class="divider"></li>

                                <li>
                                    <a href="{{url('user/'.Auth::user()->id.'/detail')}}"><i class="fa fa-user"></i> Profile</a>
                                </li>

                                <li>
                                    <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                </li>


                                <li class="divider"></li>

                                <li>

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#mmenu"><i class="fa fa-ban"></i></a>
                        </li>
                    </ul>
                    <!-- /Quick Actions -->



                    <!-- Sidebar -->
                    <ul class="nav navbar-nav side-nav" id="sidebar">

                        <li class="collapsed-content">
                            <ul>
                                <li class="search"><!-- Collapsed search pasting here at 768px --></li>
                            </ul>
                        </li>

                        <li class="navigation" id="navigation">
                            <a href="#" class="sidebar-toggle" data-toggle="#navigation">MENU ADMIN <i class="fa fa-angle-up"></i></a>

                            <ul class="menu">
                              <?php
                                $daftarmenu = DB::table('menu')->get();
                                $usermenu_result = DB::table('users')->find(Auth::user()->id);
                                foreach ($daftarmenu as $key):
                                  if(strpos($usermenu_result->daftar_menu,(string)$key->id_menu) !== false){
                              ?>
                                <li class="{{ Request::segment(1) === $key->segment ? 'active' : null }}">
                                    <a href="{{url($key->url)}}" id="karakter">
                                      {!! $key->simbol !!} {{$key->menu}}
                                    </a>
                                </li>
                              <?php
                                  }
                                endforeach; ?>
                            </ul>

                        </li>



                    </ul>
                    <!-- Sidebar end -->





                </div>
                <!--/.nav-collapse -->





            </div>

            <!-- Fixed navbar end -->
