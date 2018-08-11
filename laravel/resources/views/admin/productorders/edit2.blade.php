@include('includes.admin.admin_header')
<body>
        <div class="row no-gutters">
          @include('includes.admin.nav')
            <div class="col-md-9 offset-md-3">
               @include('includes.admin.top')
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                <div class="tab-pane show active fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="row"><div class="col-10 offset-md-1"> 
                    <div style="height:60px;"></div>
                    <div class="container">
                        @include('includes.admin.status')
                        @include('includes.admin.validate')
                        <div class="container bg-white mx-3">
                            <div style="height: 30px;"></div>
                             <div class="container mt-4" style="font-size: 14px;">
                                <div class="row justify-content-start">
                                    <p style="font-size: 20px;" class="text-muted">Order Details</p>
                                </div>                            
                            </div>
                         <div class="container border">
                            <table class="table">
                              
                                <tbody>
                                  <tr>
                                    <th scope="row" style="border-top: 0px;">Order ID</th>
                                    <td style="border-top: 0px;">dH4730040S</td>
                                
                                  </tr>
                                  <tr>
                                    <th scope="row">Customer Name</th>
                                    <td>Oluwagbemiga Joshua</td>
                                  
                                  </tr>
                                  <tr>
                                    <th scope="row">Customer Email</th>
                                    <td>Joshuaolu@gmail.com</td>
                                   
                                  </tr>
                                  
                                  <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>08073404890</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">Address</th>
                                    <td>2885 Heller Inlet</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">City</th>
                                    <td>North Harrisonhaven</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">Total Product</th>
                                    <td>3</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">Total Cost</th>
                                    <td>$400</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">Orderes Date</th>
                                    <td>17 Oct 2018</td>
                                   
                                  </tr>

                                  <tr>
                                    <th scope="row">Payment Method</th>
                                    <td>Paypal</td>
                                   
                                  </tr>
                                </tbody>
                              </table>
                                  
                         </div>
                            <div style="height:30px;"></div>
                            <table class="table table-bordered text-muted" style="font-size: 14px;"   >
                                    <thead class="bottom">
                                      <tr class="table-borderless bg-light">
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Vendor</th>
                                        <th scope="col">Status</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Nothing Left Butt Lifter Bodysuit - Black</th>
                                        <td>1</td>
                                        <td>Honeydrops</td>
                                     <td><div class="row justify-content-around">
                                            
                                            <button class="btn btn-success dropdown-toggle pending" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Pending</button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                 
                                                  </div>
                                  
                                        </div></td>
                                       
                                      </tr>
                         
                                          
                                    </tbody>
                                  </table>
                                  <div style="height: 30px;"></div>                     
                                      <div style="height: 30px;"></div> 
                                </div>

                    </div>
                  </div>
                  </div>

                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                 </div>
                <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab"></div>
                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab"></div>
                <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
            
                </div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">...</div>
                <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                </div>
              </div>
            </div>
          </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="{{asset('js/user_management.js')}}"></script>
  </body>
  @include('includes.admin.admin_footer')