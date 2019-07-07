@extends("layout.master")
@section("content-section")
<div class="down-box">
			<div class="function-txt-box">
				<input type="text" name="" placeholder="Enter your Email" class="txt-box">
			</div>
			<div class="function-txt-box">
				<input type="password" name="" placeholder="Enter your Password" class="txt-box">
			</div>
			<div class="function-log-box">
				<div class="login-btn">
					<p>Login</p>
				</div>
				<div class="txt-password-box">
					<a href="#"><p>Forget password?</p></a>
					<a href="{{url('customer/signup')}}"><p> Create new Account</p></a>
				</div>
			</div>
		</div>
@endsection
