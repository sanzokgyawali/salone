@extends("layout.master")
@section("content-section")
<div class="down-box">
			<form method="post" action="{{url('customer/signups2')}}">
        {{csrf_field()}}
			<div class="function-signup-box">
			<select id="state" class="txt-box options">
        <option>Please Select State</option>
        @foreach($res as $r)
        <option value="{{$r->state_id}}">{{$r->state_name}}</option>
        @endforeach
      </select>

			</div>
			<div class="function-signup-box">
        <select id="district" class="txt-box options">

        </select>
			</div>
			<div class="function-signup-box">
        <select id="muncipality" class="txt-box options">

        </select>
			</div>
			<div class="function-signup-box">
        <select id="ward" class="txt-box options" name="ward_id">

        </select>
			</div>
			<div class="function-signup-box">
				<input type="text" name="street_name" placeholder="Street Name" class="txt-box">
			</div>
      		<button type="submit" class="sign-up-btn" style="background-color:transparent;">	Sign Up</button>
			</form>

				<div class="txt-password-box">
					<a href="#"><p>I already have Account !</p></a>
				</div>
			</div>
		</div>
    <script>
    $("#state").change(function(){
    if($(this).val()!='')
			{

				var value= $(this).val();
         var _token = $('input[name="_token"]').val();
        $.ajaxSetup({
							 headers: {
									 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 }
					 });
				$.ajax({
					url:"{{url('customer/district')}}" ,
					method: "POST",
					data: {value:value},
					success:function(result)
					{
					$("#district").html(result);
					}
				});
			}
    });
    $("#district").change(function(){
    if($(this).val()!='')
			{

				var value= $(this).val();
         var _token = $('input[name="_token"]').val();
        $.ajaxSetup({
							 headers: {
									 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 }
					 });
				$.ajax({
					url:"{{url('customer/muncipality')}}" ,
					method: "POST",
					data: {value:value},
					success:function(result)
					{
					$("#muncipality").html(result);
					}
				});
			}
    });
    $("#muncipality").change(function(){
    if($(this).val()!='')
      {

        var value= $(this).val();
         var _token = $('input[name="_token"]').val();
        $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
        $.ajax({
          url:"{{url('customer/ward')}}" ,
          method: "POST",
          data: {value:value},
          success:function(result)
          {
          $("#ward").html(result);
          }
        });
      }
    });
    </script>
@endsection
