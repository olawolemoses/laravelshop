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
                <th></th>
                <th class="titelCell" > Monday, 16th june</th>
                <th class="titelCell" align="center"> Tuesday, 17th june</th>
                <th class="titelCell" align="center"> Wednesday, 18th june</th>
                <th class="titelCell" align="center">Thrusday, 19th june</th>
                <th class="titelCell" align="center"> Friday, 20th june</th>
                <th class="titelCell" align="center">    Saturday, 21st june</th>
                <th class="titelCell" align="center">    Sunday, 22st june</th>
                
    
                <tr>
                    <th class="dayCell">8 am</th>
                    <td class="ticCell" id="10" ></td>
                    <td class="ticCell" id="11" ></td>
                    <td class="ticCell" id="12" ></td>
                    <td class="ticCell" id="13" ></td>
                    <td class="ticCell" id="14" ></td>
                    <td class="ticCell" id="15" ></td>
                    <td class="ticCell" id="16" ></td>
                 
    
                </tr>
                <tr>
                    <th class="dayCell"> 10am </th>
                    <td class="ticCell" id="20" ></td>
                    <td class="ticCell" id="21" ></td>
                    <td class="ticCell" id="22" ></td>
                    <td class="ticCell" id="23" ></td>
                    <td class="ticCell" id="24" ></td>
                    <td class="ticCell" id="25" ></td>
                    <td class="ticCell" id="26" ></td>
             
                   
                </tr>
                <tr>
                    <th class="dayCell"> 12noon</th>
                    <td class="ticCell" id="30" ></td>
                    <td class="ticCell" id="31" ></td>
                    <td class="ticCell" id="32" ></td>
                    <td class="ticCell" id="33" ></td>
                    <td class="ticCell" id="34" ></td>
                    <td class="ticCell" id="35" ></td>
                    <td class="ticCell" id="36" ></td>
                
                </tr>
    
                <tr>
                    <th class="dayCell"> 4pm </th>
                    <td class="ticCell" id="40" ></td>
                    <td class="ticCell" id="41" ></td>
                    <td class="ticCell" id="42" ></td>
                    <td class="ticCell" id="43" ></td>
                    <td class="ticCell" id="44" ></td>
                    <td class="ticCell" id="45" ></td>
                    <td class="ticCell" id="46" ></td>
                
                </tr>
    
                <tr>
                    <th class="dayCell"> 8pm</th>
                    <td class="ticCell" id="50" ></td>
                    <td class="ticCell" id="51" ></td>
                    <td class="ticCell" id="52" ></td>
                    <td class="ticCell" id="53" ></td>
                    <td class="ticCell" id="54" ></td>
                    <td class="ticCell" id="55" ></td>
                    <td class="ticCell" id="56" ></td>
                 
                </tr>
                <tr>
                    <th class="dayCell"> 10pm</th>
                    <td class="ticCell" id="60" ></td>
                    <td class="ticCell" id="61" ></td>
                    <td class="ticCell" id="62" ></td>
                    <td class="ticCell" id="63" ></td>
                    <td class="ticCell" id="64" ></td>
                    <td class="ticCell" id="65" ></td>
                    <td class="ticCell" id="66" ></td>
                  
                </tr>
       
    </table></div>
        <div class="container">
        <div class="row justify-content-end">
                <a class="btn btn-colorr" href="bookaservice.php" role="button">BACK</a>
          <a class="btn btn-color text-white hvr-bounce-to-right" href="booking_details.php" role="button">NEXT</a>
                          <a id="btn-save-TS" class="btn btn-color text-white hvr-bounce-to-right" href="#" role="button">NEXT</a>

        </div></div>
    </div>
    @include("includes.footer")

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/booking_time.js"></script>
</body>
</html>