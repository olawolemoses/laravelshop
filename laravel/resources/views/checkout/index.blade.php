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
                      <a class="nav-item nav-link text-muted display-4" id="nav-profile-tab" href="Shipping_page.html">
                      <div class="row">
                        <div class="col-3">
                         
                            <p class="" style="font-size: 60px;color:#d8d8d8;">2 </p>
                  
                          </div>
                          <div class="col-9">
                            <div class="d-inline-block mt-3 ">
                            <p style="font-size: 14px;color:#d8d8d8;">Shopping item</p>
                            <p style="font-size: 12px;color:#d8d8d8;" class="pr-2">check your item</p>
                            </div>
                          </div>
                  </div></a>
                  </div>
                        <div class="col">

                        </div>

              <div class="col">       
               
                  <a class="nav-item nav-link text-muted display-4 " id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> 
                <div class="row">
                     
                    <div class="col-3">
                      
                        <p class="" style="font-size: 60px;">3 </p>
              
                      </div>
                      <div class="col-9">
                        <div class="d-inline-block mt-3 pl-0">
                        <p style="font-size: 14px;">PAYMENT</p>
                        <p style="font-size: 12px;" class="pl-3">select pay type</p>
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
                    
                    <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      
                    </div>
                    <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                 <div class="container">       <div class="container bg-light length">
                                <div style="height: 50px;"></div>
                                <p class="text-muted">PAYMENT SELECTION</p>
                                <div class="card bg-white col-8">
                                        <div class="card-body">
                                                <div class="container">
                                                        <div class="row justify-content-between">
                                                                <div class="custom-control custom-radio yellow">
                                                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio1">Credit Card</label>
                                                                      </div>
                                                          <div class="row justify-content-between pr-3">
                                                             <img src="images/master.png" alt="" class="pl-1">
                                                             <img src="images/visa.png" alt="" class="pl-1">   
                                                             <img src="images/amex.png" alt="" class="pl-1">                                     
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <p class="pl-4" style="font-size: 16px;color:#5e5e5e;line-height: 26px;">Safe money transfer using your bank account. Visa, Maestro, 
                                                        <br>Discover, American Express.</p>
                                                        <form>
                                                                <div class="form-row">
                                                                  <div class="form-group col-md-12">
                                                                    <label for="inputEmail4">CARD NUMBER</label>
                                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="0000 0000 0000 0000">
                                                                  </div>
                                                                  
                                                                </div>
                                                                
                                                                
                                                                <div class="form-row">
                                                                  <div class="form-group col-md-6">
                                                                    <label for="inputCity">NAME ON CARD</label>
                                                                    <input type="text" class="form-control" id="inputCity">
                                                                  </div>
                                                                  <div class="form-group col-md-4">
                                                                        <label for="inputCity">EXPIRY DATE</label>
                                                                        <input type="text" class="form-control" id="inputCity" placeholder="MM / YY">
                                                                      </div>
                                                                  
                                                                  <div class="form-group col-md-2">
                                                                    <label for="inputZip">CCV</label>
                                                                    <input type="text" class="form-control" id="inputZip">
                                                                  </div>
                                                                </div>
                                                        </form>
                                        </div>
                                      </div>
                                      <div class="card bg-white col-8 mt-3">
                                            <div class="card-body">
                                                    <div class="container">
                                                            <div class="row justify-content-between">
                                                                    <div class="custom-control custom-radio">
                                                                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadio2">PayPal</label>
                                                                          </div>
                                                              <div class="row justify-content-between pr-3">
                                                                 <img src="images/paypal.png" alt="" class="pl-1">
                                                                                                    
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <p class="pl-4" style="font-size: 16px;color:#5e5e5e;line-height: 26px;">You will be redirected to PayPal website to complete your<br> purchase securely.</p>
                                                        
                                            </div>
                                          </div>
                                          <div class="card bg-white col-8 mt-3">
                                                <div class="card-body">
                                                        <div class="container">
                                                                <div class="row justify-content-between">
                                                                        <div class="custom-control custom-radio">
                                                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                                                <label class="custom-control-label" for="customRadio3">Bitcoin</label>
                                                                              </div>
                                                                  <div class="row justify-content-between pr-3">
                                                                     <img src="images/bitcoin.png" alt="" class="pl-1">
                                                                                                        
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <p class="pl-4" style="font-size: 16px;color:#5e5e5e;line-height: 26px;">You will be redirected to PayPal website to complete your<br> purchase securely.</p>
                                                            
                                                </div>
                                              </div>
                                              <div style="height: 30px;"></div>
                               
                        </div></div>
                        <div class="container">  <div class="container" style="background-color: #f5f5f5;">
                            <div class="row">
                              <div class="col-md-4">
                                  <p class="text-muted pl-5 mt-4"  style="font-size:14px;;">ADD MORE ITEMS</p>
                              </div>
                              <div class="col-md-8 py-2">
                                <div class="row">
                                  <div class="col-md-3">
                                      
                                          <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Sub total</p>
                                          <p class="px-5" style="font-size: 24px;color: #5e5e5e;">$900.00</p>
                                        
                                  </div>

                                  <div class="col-md-3">
                                    
                                          <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Shipping</p>
                                          <p class="px-5" style="font-size: 24px;color: #5e5e5e;">$20.00</p>
                                       
                                    </div>

                                    <div class="col-md-3">
                                      
                                            <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Shipping</p>
                                            <p class="px-5" style="font-size: 24px;color: #5e5e5e;font-weight: bold;">$920.00</p>
                                         
                                      </div>

                                      <div class="col-md-3">
                                          <button type="button" class="btn btn-warning mr-5 mt-4 text-white" style="font-size: 12px;height:40px; width:120px;">PROCEED</button>
                                        </div>
                                </div>
                              </div>
                            </div>
                               </div>
                           </div>
                        
                    </div>
                </div>
                  </div>
  
@include('includes.footer')