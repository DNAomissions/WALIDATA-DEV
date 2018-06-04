<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> {{ config('app.name') }}</title>


  <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

  <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

    @import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
    @import url('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
    body {
      color: #5D5F63;
      background: #dde0e2;
      font-family: 'Open Sans', sans-serif;
      padding: 0;
      margin: 0;
      text-rendering: optimizeLegibility;
      -webkit-font-smoothing: antialiased;
    }
    
    .sidebar-toggle {
      margin-left: -240px;
    }

    .sidebar {
      width: 240px;
      height: 100%;
      background: #293949;
      position: fixed;
      -webkit-transition: all 0.3s ease-in-out;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      z-index: 100;
    }

    .sidebar #leftside-navigation ul,
    .sidebar #leftside-navigation ul ul {
      margin: -2px 0 0;
      padding: 0;
    }

    .sidebar #leftside-navigation ul li {
      list-style-type: none;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .sidebar #leftside-navigation ul li.active>a {
      color: #1abc9c;
    }

    .sidebar #leftside-navigation ul li.active ul {
      display: block;
    }

    .sidebar #leftside-navigation ul li a {
      color: #aeb2b7;
      text-decoration: none;
      display: block;
      padding: 18px 0 18px 25px;
      font-size: 12px;
      outline: 0;
      -webkit-transition: all 200ms ease-in;
      -moz-transition: all 200ms ease-in;
      -o-transition: all 200ms ease-in;
      -ms-transition: all 200ms ease-in;
      transition: all 200ms ease-in;
    }

    .sidebar #leftside-navigation ul li a:hover {
      color: #1abc9c;
    }

    .sidebar #leftside-navigation ul li a span {
      display: inline-block;
    }

    .sidebar #leftside-navigation ul li a i {
      width: 20px;
    }

    .sidebar #leftside-navigation ul li a i .fa-angle-left,
    .sidebar #leftside-navigation ul li a i .fa-angle-right {
      padding-top: 3px;
    }

    .sidebar #leftside-navigation ul ul {
      display: none;
    }

    .sidebar #leftside-navigation ul ul li {
      background: #23313f;
      margin-bottom: 0;
      margin-left: 0;
      margin-right: 0;
      border-bottom: none;
    }

    .sidebar #leftside-navigation ul ul li a {
      font-size: 12px;
      padding-top: 13px;
      padding-bottom: 13px;
      color: #aeb2b7;
    }

    .back {
      position: fixed;  
      bottom: 0px;
    }    

    .content {
      margin-left: 250px;
      font-size: 13px;
    }

    span.toggle-handle.btn.btn-default {
    background-color: white;
    }

   @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute; 
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 95px;
  cursor: pointer;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  left: 0; top: 0;
  width: 80px; height: 30px;
  background: #DDDDDD;
  border-radius: 6px;
  transition: background-color .2s;
}
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  width: 30px; height: 30px;
  transition: all .2s;
  border-radius: 6px 0 0 6px;
  background: #7F8C9A;
  top: 0; left: 0;
}

/* on checked */
[type="checkbox"]:checked + label:before {
  background:#34495E; 
}
[type="checkbox"]:checked + label:after {
  background: #39D2B4;
  top: 0; left: 51px;
  border-radius: 0 6px 6px 0;
}

[type="checkbox"]:checked + label .ui,
[type="checkbox"]:not(:checked) + label .ui:before,
[type="checkbox"]:checked + label .ui:after {
  position: absolute;
  left: 6px;
  border-radius: 15px;
  font-size: 14px;
  font-weight: bold;
  line-height: 22px;
  transition: all .2s;
}

[type="checkbox"]:not(:checked) + label .ui:before {
  font-family: 'FontAwesome';
  content: "\f00d";
  left: 46px;
  margin-top: 3px;
}
[type="checkbox"]:checked + label .ui:after {
  font-family: 'FontAwesome';
  content: "\f00c";
  color: #39D2B4;
  margin-top: 3px;
  left: 12px;
}
[type="checkbox"]:focus + label:before {
  border: 0; outline: 0;
  box-sizing: border-box;
}

/* Basics */

h1, h2 {
  margin-bottom: 5px;
  font-weight: normal;
  text-align: center;
  color:#aaa;
}
h2 {
  margin: 5px 0 2em;
  color: #1ABC9C;
}
form {
  width: 80px;
  margin: 0 auto;
}
h2 + P {
  text-align: center;
}
.txtcenter {
  margin-top: 4em;
  font-size: .9em;
  text-align: center;
  color: #aaa;
}
.copy {
 margin-top: 2em; 
}
.copy a {
 text-decoration: none;
 color: #1ABC9C;
}
h1 > a {
  color: #1ABC9C;
  text-decoration: none;
}
}
  </style>

  <script src="js/prefixfree.js"></script>

</head>

<body>
  <aside class="sidebar">
    <div id="leftside-navigation" class="nano">
      <ul class="nano-content">
        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-link"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{url('/links/history')}}">
            <i class="fa fa-link"></i>
            <span>Link</span>
          </a>
        </li>
        <li>
          <a href="{{url('/user')}}">
            <i class="fa fa-link"></i>
            <span>Master User</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <div id="content" class="content" role="main">


</body>
