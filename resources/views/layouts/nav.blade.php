<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title> {{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Dosis'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://js.arcgis.com/4.6/esri/css/main.css">

    <script src="js/jquery.min.js"></script>
    <script src="https://js.arcgis.com/4.6/"></script>
    <script src="js/map.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>

</head>
<body>
    <div id="menu-container">
    <div id="user-title">
                    <li class="menu-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="menu-user-logout">

                            <li>
                              <a href="{{url('/menu')}}">
                                Menu
                              </a>
                            </li>
                            <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
        </div>
        <div id="menu-wrapper">
            <div id="hamburger-menu" title="Menu"><span></span><span></span><span></span></div>
        </div>
                {{-- <ul class="menu-list accordion">
                    @foreach($datamaster as $data)
                        <li id="nav1" class="toggle">
                            <input class="viewService" type="checkbox" name="" value="{{$data->id_link}}">
                            <a class="head" href="#" style="font-size:12px">{{$data->nama}}</a>
                        </li>
                    @endforeach
                </ul> --}}

                <ul class="menu-list accordion">
                    @foreach($datamaster as $data)
                    <li id="nav1" class="toggle accordion-toggle">
                        <span class="icon-plus"></span>
                        <input class="viewService" type="checkbox" name="" value="{{$data->id_link}}">
                        <a class="head" href="#" style="font-size:12px">{{$data->nama}}</a>
                    </li>
                    @endforeach
                </ul>
    </div>
    @yield('content')
</body>
</html>
