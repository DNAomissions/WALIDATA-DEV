<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>{{ config('app.name', 'Sillingops') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  
</head>
  
<body>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
    <div class="login-title"> <strong>Walidata Bathymetri</strong> </div>
    
	<div id="loginButton">
		<div class="btn-text" onclick="openFormLogin()">Masuk</div>
		<div class="modal-login">
			<div class="close-button-login" onclick="closeFormLogin()">x</div>
			{{--  <div class="form-title">Masuk</div>  --}}
			<form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

                <div class="input-group-login{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Alamat E-Mail</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-group-login{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="form-button-login">Login</button>
            </form>
		</div>
    </div>
    
    <div id="mainButton">
            <div class="btn-text" onclick="openForm()">Daftar</div>
            <div class="modal">
                <div class="close-button" onclick="closeForm()">x</div>
                {{--  <div class="form-title">Daftar</div>  --}}
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                    <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nama</label>

                        <input id="name2" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        
                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Alamat E-Mail</label>

                        <input id="email2" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>

                        <input id="password2" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group">
                        <label for="password-confirm">Konfirmasi Password</label>

                        <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <button type="submit" class="form-button-login"> Daftar </button>
                     
                    </form>                
            </div>
        </div>
	
	<script src="js/login.js"></script>
</body>
</html>
