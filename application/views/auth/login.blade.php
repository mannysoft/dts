<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Document Tracking System</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
<link rel="stylesheet" href="{{URL::base()}}/public/css/bootstrap.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/jquery.fancybox.css">
<link rel="stylesheet" href="{{URL::base()}}/public/css/style.css">
</head>
<body class='login_body'>
	<div class="wrap">
		<h2>Document Tracking System</h2>
		<h4>Welcome to the login page</h4>
		<form action=""  autocomplete="off" method="post">
        @if(count($errors) >= 1)
            <div class="alert alert-danger alert-block">
                    @foreach ($errors as $error)
                            <div class="error">{{ $error }}</div>
                    @endforeach
            </div>
            @endif
		<div class="login">
			<div class="email">
				<label for="username">Username</label><div class="email-input"><div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input name="username" type="text" id="username" value="{{Input::get('username')}}"></div></div>
			</div>
			<div class="pw">
				<label for="password">Password</label><div class="pw-input"><div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password"></div></div>
			</div>
			<div class="remember">
				<label class="checkbox">
					<input type="checkbox" value="1" name="remember"> Remember me on this computer
				</label>
			</div>
		</div>
		<div class="submit">
			<a href="#">Lost password?</a>
		  <button class="btn btn-red5">Login</button>
			<input name="op" type="hidden" id="op" value="1">
        </div>
		<div class="login social">
			<div class="btn-row">
				<a href="#" class="btn btn-social btn-twitter"><img src="{{URL::base()}}/public/img/twitter.png" alt="">Sign in with Twitter</a>
				<a href="#" class="btn btn-social btn-fb"><img src="{{URL::base()}}/public/img/facebook.png" alt="">Sign in with Facebook</a>
			</div>
			<div class="btn-row">
				<a href="#" class="btn btn-social btn-dr"><img src="{{URL::base()}}/public/img/dribble.png" alt="">Sign in with Dribble</a>
				<a href="#" class="btn btn-social btn-fo"><img src="{{URL::base()}}/public/img/forrst.png" alt="">Sign in with Forrst</a>
			</div>
		</div>
		</form>
	</div>
	<div class="social-shadow-hider"></div>
	<div class="social-toggle">
		<!--<a href="#" class='toggle-social'>Sign in with social network <b class="caret"></b></a>-->
	</div>
<script src="{{URL::base()}}/public/js/jquery-1.7.2.js"></script>
<script src="{{URL::base()}}/public/js/error.js"></script>
</body>
</html>