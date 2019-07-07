@extends("layout.master")
@section("content-section")
<div class="down-box">
			<form method="post" action="{{url('customer/signupsubmit')}}" >
        {{csrf_field()}}
			<div class="function-signup-box">
				<input type="text" name="fname" placeholder="First name" class="txt-box">
			</div>
      <div class="function-signup-box">
        <input type="text" name="lname" placeholder="Last name" class="txt-box">
      </div>
      <div class="function-signup-box">
				<input type="text" name="dname" placeholder="Display Name" class="txt-box">
			</div>
			<div class="function-signup-box">
				<input type="text" name="email" placeholder="Email" class="txt-box">
			</div>
      <div class="function-signup-box">
				<input type="text" name="phone" placeholder="Phone" class="txt-box">
			</div>
			<div class="function-signup-box">
				<input type="password" name="password" placeholder="Password" class="txt-box">
			</div>



			<div class="function-sign-box">

			<button type="submit" class="sign-up-btn" style="background-color:transparent;">	Sign Up</button>

				<div class="txt-password-box">
					<a href="{{url('customer/login')}}"><p>I already have Account !</p></a>
				</div>
			</div>
		</div>
    	</form>
    @endsection
