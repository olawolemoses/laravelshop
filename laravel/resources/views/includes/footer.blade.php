



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
    <script src="/js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="/js/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/product_page.js"></script>

    <script>
        $(function()
        {
            function hideshow( eId )
            {
                var i = 1;
                
                if (document.getElementById( eId ).style.display == "none") 
                {
                    $('#' + eId ).slideDown("normal");
                    document.getElementById( eId ).style.display = "block";
                    i = 2;
                } 
                else 
                {
                    if (i == 1) 
                    {
                        $( '#' + eId ).slideUp("normal", function () {
                            document.getElementById( eId ).style.display = "none";
                        });
                    }
                }
            }
            
           $('.order').click( function(event) {
                
                var orderId = $(this).data("id");
                
                hideshow( 'effet-' + orderId );
           });
        });
    </script>