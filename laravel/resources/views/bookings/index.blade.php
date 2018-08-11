@include('includes.header')
 <div class="container">
   
          <p style="color: #5e5e5e;font-size: 24px;" class="bookstyle">BOOKING</p>
          <div class="container">
          <div class="row justify-content-between bouncein">
            <p id="scale_up" style="font-size: 17px;color:#66a45f;">
                <i class="material-icons float-left pr-3">local_laundry_service</i>SERVICES</p>
            <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left pr-3">
                schedule
                </i>TIME</p>
                <p  id="scale_up" style="font-size: 17px;"><i class="material-icons float-left pr-3">
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
  <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
          <form class="formh" action="{{ route('bookings.chooseTime') }}" method="post">@csrf
              <div class="row">
                  <div class="col-md-4 my-1">
                    <label style="font-size:14px;color: #5e5e5e;">Select Service</label>
                    <select name='service' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                      <option selected>Choose...</option>
                        @if( !empty( $services) )
                          <@foreach( $services as $service)
                              <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                          @endforeach
                        @endif
                    </select>
                  </div>
                 
              </div>
              <div class="row">
                  <div class="col-md-4 my-1">
                     <button type='submit' class="btn btn-warning">Choose</button>
                  </div>
                 
              </div>
          </form>
          <div class="container">
          <div class="row justify-content-end">
                <a class="btn btn-colorr" href="bookaservice.php" role="button">BACK</a>
            <a class="btn btn-color text-white" href="booking_time.php" role="button">NEXT</a>
          </div></div>
      </div>

@include('includes.footer')
@include('includes.livechat')
@include('includes.footer_end')