<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Document Tracking System</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<table width="200" border="1">
  <tr>
    <td>{{HTML::link_to_action('home@index', 'Home')}}</td>
    <td>{{HTML::link_to_action('document@create', 'Create')}}</td>
    <td>{{HTML::link_to_action('document@receive', 'Receive')}}</td>
    <td>{{HTML::link_to_action('document@release', 'Release')}}</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br />
<br />
<br />
<br />
<!--http://laravel.com/docs/views/templating-->
@if(count($errors) > 1)
    @foreach ($errors as $error)
            <div class="error">{{ $error }}</div>
    @endforeach
@endif
{{Session::get('status')}}

<!--Main content-->
@yield('content')

<script src="js/jquery.js"></script>
<script src="js/less.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.color.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/custom.js"></script>
</body>
</html>