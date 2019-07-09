<!DOCTYPE html>
<html>
<head>
	<title>barber</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontview/css/style.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<div class="sub-container">
		<div class="main-header">
			<div class="logo">
               <img src="{{asset('frontview/img/logo.png')}}" height="100%" width="100%">
			</div>
		</div>
    @yield("content-section")
    <div class="footer">
			<div class="copyright-name">
				<p>@copyright yadashish</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
