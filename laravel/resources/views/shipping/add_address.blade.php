@include('includes.header_local', ['css_files'=>['/css2/cart_page.css']])

    <div class="container">
            <nav class="d-none d-lg-block">
              
                    <div class="nav nav-tabs nav-fill border-0 rounded-0" id="nav-tab" role="tablist" style="background-color: #f5f5f5;">
               <div class="col"> 
                  <a class="nav-item nav-link display-4" id="nav-home-tab" href="cart_page.html">
                 <div class="row text-muted">
                <div class="col-3">
   
                        <p class=" " style="font-size: 60px;color:#d8d8d8;">1 </p>
                  
                  </div>
                  <div class="col-9">
                    <div class="d-inline-block mt-3">
                    <p style="font-size: 14px;color:#d8d8d8;">Shipping item</p>
                    <p style="font-size: 12px;color:#d8d8d8;">check your item</p>
                    </div>
                  </div>
                  </div></a>
              </div>
                        <div class="col">

                        </div>
                      
                  <div class="col">  
                      <a class="nav-item nav-link text-muted display-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                      <div class="row">
                        <div class="col-3">
                         
                            <p class="" style="font-size: 60px;">2 </p>
                  
                          </div>
                          <div class="col-9">
                            <div class="d-inline-block mt-3 ">
                            <p style="font-size: 14px;">Shopping item</p>
                            <p style="font-size: 12px;" class="pr-2">check your item</p>
                            </div>
                          </div>
                  </div></a>
                  </div>
                        <div class="col">

                        </div>

              <div class="col">       
               
                  <a class="nav-item nav-link text-muted display-4 " id="nav-contact-tab" href="payment.html"> 
                <div class="row">
                     
                    <div class="col-3">
                      
                        <p class="" style="font-size: 60px;color:#d8d8d8;">3 </p>
              
                      </div>
                      <div class="col-9">
                        <div class="d-inline-block mt-3 pl-0">
                        <p style="font-size: 14px;color:#d8d8d8;">PAYMENT</p>
                        <p style="font-size: 12px;color:#d8d8d8;" class="pl-3">select pay type</p>
                        </div>
                      </div>
                      </div></a>
              </div>
                    </div>
                  </nav>
                  </div>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                    </div>
                    
                    <div class="tab-pane fade show active " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="card-body">
                                @if ($errors->count() > 0 )
                                    <div class="alert alert-danger" style="display:block">
                                        @foreach( $errors->all() as $error )
                                           <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        <form action="{{ route('store_shipping_address') }}" method="post" class="pl-4" style="background-color: #fafafa;">@csrf
                            <div class="container">
                                    <div style="height:50px;"></div>
                                    <div class="row">
                                        <div class="col md-3">
                                            <p style="font-size: 24px;color:#4a4a4a;">Delivery address</p>
                                        </div>
                                        <div class="col md-3">
                                       <span><i class="material-icons float-left" style="color:#66a45f;"> 
                                                playlist_add
                                                </i><p class="pl-4" style="font-size:14px; color: #66a45f;">ADD NEW ADDRESS</p></span>
                                       </div>
                                      
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="firstname">FIRST NAME</label>
                                        <input type="text" name="firstname" class="form-control" id="inputEmail4" value="{{ $user->firstname }}" placeholder="Firstname">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="lastname">LAST NAME</label>
                                        <input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}" id="inputPassword4" placeholder="Lastname">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                      <label for="address">Street</label>
                                      <input type="text" name="street" class="form-control" id="inputAddress" value="{{ $profile->street }}" placeholder="Street">
                                    </div>
                                    </div>
                                    
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputCity">Country</label>
                                        <input type="text" name="country" class="form-control" id="inputCity" value="{{ $profile->country }}" placeholder="country">
                                      </div>
                                    </div>
                                    
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="inputCity">State</label>
                                        <input type="text" name="state" class="form-control" id="inputCity" value="{{ $profile->state }}" placeholder="state">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputState">CITY</label>
                                        <select name="city" id="inputState" class="form-control">
                                          <option>Choose a city</option>
                                          <option value="MI">MICHIGAN</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                              <label for="inputCity">POSTAL CODE</label>
                                              <input type="text" name="postal_code" class="form-control" id="inputCity" value="{{ $profile->postal_code }}">
                                            </div>
                                            <div class="form-group col-md-4">
                                              <label for="inputState">PHONE</label>
                                              <input type="text" name="mobile_no" class="form-control" id="inputPhone" value="{{ $profile->mobile_no }}">
                                            </div>
                                          </div>
                                    <div style="height:100px;"></div>
                            </div>
                                   
                            <div class="container"> <div class="container" id="overflw" style="background-color: #f5f5f5;;">
                                            <div class="row">
                                              <div class="col-md-4">
                                                  <p class="text-muted pl-5 mt-4"  style="font-size:14px;;">ADD MORE ITEMS</p>
                                              </div>
                                              <div class="col-md-8 py-2">
                                                <div class="row">
                                                  <div class="col-md-3">
                                                      
                                                          <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Sub total</p>
                                                          <p class="px-5" style="font-size: 24px;color: #5e5e5e;">${{$subTotal}}</p>
                                                        
                                                  </div>

                                                  <div class="col-md-3">
                                                    
                                                          <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Shipping</p>
                                                          <p class="px-5" style="font-size: 24px;color: #5e5e5e;">${{$shipping}}</p>
                                                       
                                                    </div>

                                                    <div class="col-md-3">
                                                      
                                                            <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Shipping</p>
                                                            <p class="px-5" style="font-size: 24px;color: #5e5e5e;font-weight: bold;">${{$total}}</p>
                                                         
                                                      </div>

                                                      <div class="col-md-3">
                                                            
                                                        <button type="submit" class="btn btn-warning mr-5 mt-4 text-white" style="font-size: 12px;height:40px; width:120px;">PROCEED</button>
                                                            
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                               </div>
                                           </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
             
                </div>
                  </div>
  


    @include('includes.footer')
    <script type="text/javascript" src="/js/product_page.js"></script>
    @include('includes.livechat')
    @include('includes.footer_end')