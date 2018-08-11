@include('includes.header')
    <link rel="stylesheet" href="/css2/booking_details.css">

  <div class="container">
   
          <p style="color: #5e5e5e;font-size: 24px;" class="bookstyle">BOOKING</p>
          <div class="container">
          <div class="row justify-content-between  bouncein">
            <p id="scale_up" style="font-size: 17px;color:#66a45f;"><i class="material-icons float-left pr-3">
                local_laundry_service
                </i>SERVICES</p>
            <p id="scale_up" style="font-size: 17px;color:#66a45f;"><i class="material-icons float-left pr-3">
                schedule
                </i>TIME</p>
                <p id="scale_up" style="font-size: 17px;color:#66a45f;"><i class="material-icons float-left pr-3">
                    list
                    </i>LIST</p>
                    <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left pr-3">
                        payment
                        </i>PAYMENT</p>
                        <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left pr-3">
                            check_circle_outline
                            </i>COMPLETE</p>
          </div>   
          </div>
          <div class="progress" style="height:3px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
    
            <form class="mt-5 fade_in" action="{{ route('bookings.saveBookingDetails') }}" method="post">@csrf 
		 
				  <div class="form-row"  style="font-size: 14px;">
						  <div class="form-group col-md-4">
							<label for="inputname">Name</label>
							<input name="name" type="text" value="{{ $user->profile->firstname }} {{ $user->profile->lastname }}" class="form-control" id="inputname" placeholder="">
						  </div>
							<div class="form-group col-md-4">
							  <label for="inputphonenumber">Phone Number</label>
							  <input name="phoneno" type="tel" class="form-control" id="inputphonenumber" placeholder="" value="{{ $user->profile->mobile_no }}">
							</div>
						  <div class="form-group col-md-4">
							<label for="inputEmail">Email</label>
							<input name="email" type="email" class="form-control" id="inputEmail" placeholder="" value="{{ $user->username }}">
						  </div>
				  </div>
				  
				  <div class="form-group"  style="font-size: 14px;">
                    <label for="exampleFormControlTextarea1">Enter a Message <span style="font-style: italic;">( optional </span>)</label>
                    <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

			    <div class="container">
				  <div class="row justify-content-end">
						<a class="btn btn-colorr" href="booking_time.php" role="button">BACK</a>
					<a class="btn btn-color text-white" href="booking_payment.php" role="button">NEXT</a>
					<button type="submit" class="btn btn-color text-white">Next</button>
				  </div>
			    </div>
            </form>
      </div>
    @include('includes.footer')
	<script type="text/javascript" src="/js/booking_time.js"></script>
</body>
</html>