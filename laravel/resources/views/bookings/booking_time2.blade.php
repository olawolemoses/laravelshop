@include('includes.header')
    <link rel="stylesheet" href="/css2/booking_time.css">
        <div class="container">
   
        <p style="color: #5e5e5e;font-size: 24px;" class="bookstyle">BOOKING</p>
        <div class="container bouncein">
        <div class="row justify-content-between">
          <p id="scale_up" style="font-size: 17px;color:#66a45f;"><i class="material-icons float-left  pr-4 mr-1">
              local_laundry_service
              </i>SERVICES</p>
          <p    id="scale_up"  style="font-size: 17px;color:#66a45f;"><i class="material-icons float-left  pr-4 mr-1">
              schedule
              </i>TIME</p>
              <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left  pr-4 mr-1">
                  list
                  </i>LIST</p>
                  <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left  pr-4 mr-1">
                      payment
                      </i>PAYMENT</p>
                      <p id="scale_up" style="font-size: 17px;"><i class="material-icons float-left  pr-4 mr-1">
                          check_circle_outline
                          </i>COMPLETE</p>
        </div>   
        </div>

        <div class="progress" style="height:3px;">
                        <div class="progress-bar d-none d-lg-block" role="progressbar" style="width: 30%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
        <p  class="my-4"  style="color:#333333;font-size: 20px">JUNE 2018</p>
       <div class="container-fluid">
        <table id="timeTable">
    
                <tr>
                        <th></th>                    
                  <?php foreach($dates as $date): ?>
                      <th class="titelCell" > <?php echo date("l jS F, Y", strtotime($date) ) ?> </th>
                  <?php endforeach ?>
                </tr>
                
                
                @foreach( $map as $hour_id => $hour_result )
                <tr>
                  <th class="dayCell">{{  $hour_names[$hour_id]  }}</th>
                  @foreach($hour_result as  $date => $score )
                    @if( $score == 0 ) 
                        <td id="{{ $date . '-' . $hour_id }}" > Not available </td>
                    @else
                        <td class="ticCell" id="{{ $date . '-' . $hour_id }}" > {{ $score }}</td>
                    @endif
                  @endforeach   
                </tr>
                @endforeach


    </table></div>
        <div class="container">
        <div class="row justify-content-end">
                <a class="btn btn-colorr" href="bookaservice.php" role="button">BACK</a>
                <a id="btn-save-TS" class="btn btn-color text-white hvr-bounce-to-right" href="#" role="button">NEXT</a>

        </div></div>
    </div>
    
    <form id="frmSendIDs" action="{{ route('bookings.bookService') }}" method="post">@csrf
        <input name="time_log" type="hidden" id="hdnSendIDs" />
    </form>
    
    @include("includes.footer")

    <script type="text/javascript">
        $(document).ready(function(){
            $('.bouncein').addClass('animated bounceIn');
            $('.btn-color').addClass('animated slideInRight');
            $('.fade_in').addClass('animated fadeInDownBig')
        });
                
                

        
        $(function () {
            var isMouseDown = false;
            $("#timeTable td.ticCell")
                    .mousedown(function () {
                        isMouseDown = true;
                        $(this).toggleClass("highlighted");                  
                        return false; 
                    })
                    .mouseover(function () {
                        if (isMouseDown) {
                            $(this).toggleClass("highlighted");                        
                        }
                    });
            $(document).mouseup(function () {
                        isMouseDown = false;
                    });
            $('#btn-save-TS').on('click', function () {
                saveTimeSave();
                return false;
            });        
        });
        
        var saveTimeSave = function () {
            var timeSets = [];
            alert(1);
            var hours = {!! json_encode($hours)  !!}   
            var days = {!! json_encode($dates)  !!}   
            for (i = 1; i <= 8; i++) 
            {
                for (j = 0; j < 7; j++) 
                {
                    var ids =  days[j] + "-" + [i];
                    console.log( ids );
                    console.log( $('#'+ids).css("backgroundColor") );
        			 
                    if ($('#'+ids).css("backgroundColor") == "rgb(249, 177, 59)") 
                    {
                        if (timeSets.indexOf( ids ) == -1) 
                        {
                            timeSets.push( ids );
                        }
        				console.log( ids );
                    }else{
                        realIndex = timeSets.indexOf( ids );
                        if (realIndex != -1) 
                        {
                            timeSets.splice(realIndex, 1);
                        }
        				//console.log(i + "*" + j );
                    }
                }
            }
            
            console.log(timeSets); 
            
            var mySets = JSON.stringify( timeSets );
            document.querySelector('#hdnSendIDs').value = mySets;
            $('form#frmSendIDs').submit();
        };            
            
    </script>
</body>
</html>