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
                        <div class="container bg-white mx-3">
                            <div style="height: 30px;"></div>
                             <div class="container mt-4" style="font-size: 14px;">
                                <div class="row justify-content-start">
                                    <p style="font-size: 20px;" class="text-muted">Orders</p>
                                </div>                            
                            </div>
                            <hr style="margin-top:-15px;">
                            <div class="container my-4 bg-white py-4 px-5 text-muted border" style="font-size: 14px;">
                              <div class="row justify-content-between">
                                     
                                 <form class="form-inline">
                                              <div class="form-group">
                                                <label for="inputPassword6">Filter by</label>
                                                <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                                              </div>
                                            </form>
                                            
                                          <form class="form-inline">
                                            <label for="inlineFormCustomSelectPref" class="pr-3">Show</label>
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                              <option selected>Choose...</option>
                                              <option value="1">One</option>
                                              <option value="2">Two</option>
                                              <option value="3">Three</option>
                                            </select></form>
                              </div>
                          </div>
                            <div style="height:30px;"></div>
                            <table class="table table-bordered text-muted" style="font-size: 14px;"   >
                                    <thead class="bottom">
                                      <tr class="table-borderless bg-light">
                                        <th scope="col">Customer mail</th>
                                        <th scope="col">Customer name</th>
                                        <th scope="col">Total cost ( $ )</th>
                                        <th scope="col">Order Date </th>
                                        <th scope="col">Payment method</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($productorders) > 0)
                                          @foreach($productorders as $order)
                                            <tr>
                                                <td>{{$order->user->username}}</td>
                                                <td>{{$order->user->name()}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->invoice->invoice_id}}</td>
                                                <td>
                                                <div class="row justify-content-around">
                                                <a class="btn btn-warning text-white buttonmode" href="/admin-vieworder/{{$order->id}}" >View</a>
                                                <button class="btn btn-success dropdown-toggle pending" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Pending</button>
                                                <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                </div>
                                                </div>
                                                </td>
                                            </tr>
                                          @endforeach
                                        @else
                                          <tr>
                                              <td colspan='6'>{{'No orders'}}</td>
                                          </tr>
                                        @endif
                                    </tbody>
                                  </table>
                                  <div style="height: 30px;"></div>                        <div class="">
                                    <nav aria-label="...">
                                          <ul class="pagination justify-content-end" style="font-size: 14px;">
                                                  <li class="page-item active ml-2">
                                                          <span class="page-link">
                                                            1
                                                            <span class="sr-only">(current)</span>
                                                          </span>
                                                        </li> 
                                            <li class="page-item ml-2"><a class="page-link text-success" href="#">2</a></li>                               
                                            <li class="page-item ml-2"><a class="page-link text-success" href="#">3</a></li>
                                            <li class="page-item ml-2">
                                              <a class="page-link text-success" href="#">...</a>
                                            </li>
                                          </ul>
                                        </nav>
                                      </div>
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
        <script src="{{asset('js\user_management.js')}}"></script>
  </body>
@include('includes.admin.admin_footer')