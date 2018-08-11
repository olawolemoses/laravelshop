@include("includes.header")
<link rel="stylesheet" href="/css2/training_payment.css">
    <div class="container">
     <div style="height: 20px;"></div>
     

 
        
                <div style="height: 50px;"></div>
                <div class="row fade_in">
                    <div class="col-md-7 ">
						@foreach( $services as $service )
                        {{ $service->service_name }}
						@endforeach
                    </div>
                </div>
          
                <div style="height: 30px;"></div>
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
                                                <form method="post" id="payment-form" action="{{ route('bookings_payment.process') }}">
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
                                    
                                                    <input id="membership_id" name="membership_id" value="{{ $ids }}" type="hidden" />
                                                    <input id="total" name="total" value="{{$total }}" type="hidden" />
                                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                    <!-- <input id="payment_amount" name="payment_amount" type="hidden" /> -->
                                                    <button id="submit-button" class="button" type="submit"><span>Pay</span></button>
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
                                                              form.submit();
                                                            });
                                                        });
                                                    });

                                                    
                                                  </script>
                                                  <script src="/js/demo.js"></script>
                                            </div>
                          
                          <div class="card bg-white col-7 mt-3">
                                <div class="card bg-white col-12 mt-3">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="row justify-content-between">
                                                                <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio3">Bitcoin</label>
                                                                      </div>
                                                          <div class="row justify-content-between pr-3">
                                                             <img src="/images/bitcoin.png" alt="" class="pl-1">
                                                                                                
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <p class="pl-4" style="font-size: 16px;color:#5e5e5e;line-height: 26px;">You will be redirected to PayPal website to complete your<br> purchase securely.</p>
                                                    
                                                <form method="post" id="payment-form" action="{{ route('membership_payment.coingateProcess') }}">
                                                    @csrf
                                                    <input id="btp_membership_id" name="services" value="{{ $ids }}" type="hidden" />
                                                    <input id="btp_total" name="total" value="{{$total }}" type="hidden" />
                                                    
                                                    <button id="submit-button2" class="submit" type="submit"><span>Pay</span></button>
                                                </form>    
                                                </div>
                                              </div>
                                
                          </div>
                         
                         <div style="height: 30px;"></div>
                         <div class="row">
                             <div class="col-7">
                                    <div class="">
                                            <div class="row justify-content-end">
                                              <a class="btn btn-colorr" href="#" role="button">BACK</a>
                                              <a class="btn btn-color text-white" href="#" role="button">NEXT</a>
                                            
                                            </div></div>
                             </div>
                         </div>
               
     
    </div>
    @include('includes.footer')
    <script>
            (function () {
               /*$('.installment').click(function(){
                    document.querySelector('#plan_detail_id').value = $(this).val();
                    document.querySelector('#btp_plan_detail_id').value = $(this).val();
               });*/
            })();           
    </script>
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