



  <div class="container-fluid footer"> 

    <div class="container">
      <div class="row">
        
            <div class="col-md-3">
               <h6>CUSTOMER SERVICE</h6>
               <p>Return and Frefunds</p>
               <p>Online Stores</p>
               <p>Help and Contact Us</p>
               <p>Terms and conditions</p>
            </div>

            <div class="col-md-3">
               <h6>HONEYDROPS</h6>
               <p>Products</p>
               <p>Bookings</p>
               <p>FAQs</p>
               <p>Trainings and deals</p>
               <p>Membership</p>
            </div>


            <div class="col-md-3">
               <h6>SOCIAL MEDIA</h6>
               <p>Facebook</p>
               <p>Twitter</p>
               <p>Instagram</p>
               <p>Youtube</p>
            </div>


            <div class="col-md-3">
               <h6>PROFILE</h6>
               <p>My Account</p>
               <p>Checkout</p>
               <p>Order Tracking</p>
               <p>Help and Support</p>
            </div>

      </div>

      </div>
  </div>





    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/popper.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
	<script type="text/javascript" src="/js/product_page.js"></script>
    <!-- Load the required client component. -->
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
  </body>
</html>