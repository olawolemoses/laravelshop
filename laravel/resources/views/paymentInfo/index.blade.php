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
                 <div class="container">       
                    <div class="container bg-light length">
                                <div style="height: 50px;"></div>
                                <p class="text-muted">PAYMENT SELECTION</p>
                                <div class="card bg-white col-8">
                                        <div class="card-body">
                                            

                                            
                                            <div class="container">
                                                <div class="row justify-content-between">
                                                    <!-- 
                                                        <div class="custom-control custom-radio yellow">
                                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio1">Credit Card</label>
                                                        </div>
                                                       
                                                        <div class="row justify-content-between pr-3">
                                                             <img src="images/master.png" alt="" class="pl-1">
                                                             <img src="images/visa.png" alt="" class="pl-1">   
                                                             <img src="images/amex.png" alt="" class="pl-1">                                     
                                                        </div>
                                                     -->
                                                </div>
                                                <p class="" style="font-size: 16px;color:#5e5e5e;line-height: 26px;">Safe money transfer using your bank account. Visa, Maestro, 
                                                <br>Discover, American Express.</p>
                                            </div>
                                            
                                            <!-- Bootstrap inspired Braintree Hosted Fields example -->
                                            <div class="panel panel-default bootstrap-basic">
                                              <div class="panel-heading">
                                                <h3 class="panel-title">Enter Card Details</h3>
                                              </div>
                                              
                                    
            
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                                                <script src="https://js.braintreegateway.com/web/dropin/1.11.0/js/dropin.min.js"></script>
                                                
                                                  <div class="container">
                                                     <div class="row">
                                                       <div class="col-xs-12 col-md-8">
                                                         <div id="dropin-container"></div>
                                                         <!-- <button id="submit-button">Request payment method</button> -->
                                                       </div>
                                                     </div>
                                                  </div>
                                                  
                                           <div class="container">
                                                <form method="post" id="payment-form" action="{{ route('payment.process') }}">
                                                    @csrf
                                                    <section>
                                                        <!-- 
                                                        <label for="amount">
                                                            <span class="input-label">Amount</span>
                                                            <div class="input-wrapper amount-wrapper">
                                                                <input id="amount" name="total" type="tel" min="1" placeholder="Amount" value="10">
                                                            </div>
                                                        </label>
                                                        -->
                                                        
                                                    </section>
                                    
                                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                    <button id="submit-button" class="button" type="submit"><span>Pay: ${{ $total }}</span></button>
                                                </form>
                                            </div>
                                            
                                                  <script>
                                                    var form = document.querySelector('#payment-form');
                                                    var client_token = "{{ Braintree_ClientToken::generate() }}";
                                                    
                                                    var button = document.querySelector('#submit-button');
                                                    
                                                    braintree.dropin.create({
                                                        authorization: client_token,
                                                        selector: '#dropin-container',
                                                        paypal: {
                                                    	    flow: 'vault'
                                                        }
                                                    }, 
                                                    function (createErr, instance) {
                                                        
                                                        if (createErr) {
                                                            console.log('Create Error', createErr);
                                                            return;
                                                        }
                                                    
                                                        form.addEventListener('submit', function (event) {
                                                        event.preventDefault();
                                                    
                                                            instance.requestPaymentMethod(function (err, payload) {
                                                                  
                                                              if (err) {
                                                            	console.log('Request Payment Method Error', err);
                                                            	return;
                                                              }
                                                    
                                                              // Add the nonce to the form and submit
                                                              document.querySelector('#nonce').value = payload.nonce;
                                                              alert( document.querySelector('#nonce').value );
                                                              form.submit();
                                                            });
                                                        });
                                                    });
                                                  </script>
                                                  <script src="/js/demo.js"></script>
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
                                                    
                                                <form method="post" id="payment-form" action="{{ route('payment.coingateProcess') }}">
                                                    @csrf
                                                    <button id="submit-button2" class="submit" type="submit"><span>Pay: ${{ $total }}</span></button>
                                                </form>    
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

  

    @include('includes.footer')
    <script src="https://js.braintreegateway.com/web/3.34.1/js/client.min.js"></script>
    
    <!-- Load Hosted Fields component. -->
    <script src="https://js.braintreegateway.com/web/3.34.1/js/hosted-fields.min.js"></script>
<script>	
	braintree.client.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b'
}, function (err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }

  braintree.hostedFields.create({
    client: clientInstance,
    styles: {
      'input': {
        'font-size': '14px',
        'font-family': 'helvetica, tahoma, calibri, sans-serif',
        'color': '#3a3a3a'
      },
      ':focus': {
        'color': 'black'
      }
    },
    fields: {
      number: {
        selector: '#card-number',
        placeholder: '4111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '123'
      },
      expirationMonth: {
        selector: '#expiration-month',
        placeholder: 'MM'
      },
      expirationYear: {
        selector: '#expiration-year',
        placeholder: 'YY'
      },
      postalCode: {
        selector: '#postal-code',
        placeholder: '90210'
      }
    }
  }, function (err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('validityChange', function (event) {
      var field = event.fields[event.emittedBy];

      if (field.isValid) {
        if (event.emittedBy === 'expirationMonth' || event.emittedBy === 'expirationYear') {
          if (!event.fields.expirationMonth.isValid || !event.fields.expirationYear.isValid) {
            return;
          }
        } else if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }
                
        // Remove any previously applied error or warning classes
        $(field.container).parents('.form-group').removeClass('has-warning');
        $(field.container).parents('.form-group').removeClass('has-success');
        // Apply styling for a valid field
        $(field.container).parents('.form-group').addClass('has-success');
      } else if (field.isPotentiallyValid) {
        // Remove styling  from potentially valid fields
        $(field.container).parents('.form-group').removeClass('has-warning');
        $(field.container).parents('.form-group').removeClass('has-success');
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('');
        }
      } else {
        // Add styling to invalid fields
        $(field.container).parents('.form-group').addClass('has-warning');
        // Add helper text for an invalid card number
        if (event.emittedBy === 'number') {
          $('#card-number').next('span').text('Looks like this card number has an error.');
        }
      }
    });

    hostedFieldsInstance.on('cardTypeChange', function (event) {
      // Handle a field's change, such as a change in validity or credit card type
      if (event.cards.length === 1) {
        $('#card-type').text(event.cards[0].niceType);
      } else {
        $('#card-type').text('Card');
      }
    });

    $('.panel-body').submit(function (event) {
      event.preventDefault();
      hostedFieldsInstance.tokenize(function (err, payload) {
        if (err) {
          console.error(err);
          return;
        }

        // This is where you would submit payload.nonce to your server
        alert('Submit your nonce to your server here!');
      });
    });
  });
});
</script>

    @include('includes.livechat')
    @include('includes.footer_end')