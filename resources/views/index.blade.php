@extends("layout.master")
@section("content-section")
<div class="down-box">
		<a href="{{url('customer/login')}}">	<div class="function-btn-box">
				<div class="function-btn">
					<p>Customer Register</p>
				</div>
			</div></a>
		<a href="{{url('client/login')}}">	<div class="function-btn-box">
				<div class="function-btn">
					<p>Barber Register</p>

				</div>
			</div></a>
		<a href="{{url('tutorialapp')}}">		<div class="function-btn-box">
				<div class="function-btn">
				<p>Tutorial</p>
				</div>
			</div></a>
		</div>
@endsection
