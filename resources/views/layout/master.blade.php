<!DOCTYPE html>
<html>
<head>
	<title>barber</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontview/css/style.css')}}">
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
