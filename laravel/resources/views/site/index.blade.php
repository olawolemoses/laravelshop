@include('includes.header')






	<div class="container">	
				
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators mish">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		  </ol>
		  <div class="carousel-inner">

		  	<div class="carousel-caption d-none d-md-block mini">
	    				<h3>GET YOUR CONFIDENCE BACK</h3>
	    				<p>At honeydrops we specialise in non surgical contouring.
	    				<br> Our mission is to empower people who are on a 
							<br>voyage to create healthier natural bodies. </p>

	    				<button class="btn btn-warning">BOOK AN APPOINTMENT</button>
	  			</div>

		    <div class="carousel-item active">
	  			<img src="img/back1.png" alt="...">
	  			
			</div>

			<div class="carousel-item">
	  			<img src="img/back2.png" alt="...">
	  			
			</div>

			<div class="carousel-item">
	  			<img src="img/back1.png" alt="...">
	  			
			</div>

			<div class="carousel-item">
	  			<img src="img/back2.png" alt="...">
	  			
			</div>


		  </div>
		  
		</div>

	</div>


	<div class="container">
		<div class="row scan" style="padding-top: 70px;">
			
			<div class="col-md-8 offset-md-2">
				<div class="row">
					<div class="col-md-4 zoom">
						<img src="img/down6.png" alt="">
					</div>

					<div class="col-md-4 looper text-center">
						<h6>NEED A SERVICE</h6>
						<p>
							overcome personal obstacles with body image and create healthy habits is part of a greater journey toward building self-esteem and confidence.
						</p>

						<button class="btn" id="btnServices">BOOK NOW</button>
					</div>

					<div class="col-md-4 zoom">
						<img src="img/picTab3.png" alt="">
					</div>

					<div class="col-md-4 looper text-center">
						<h6>PRODUCTS</h6>
						<p>
							You are welcome to call but you can also book a massage online. Please feel free to reach out with any questions
						</p>

						<button type="button" class="btn" id="btnProducts">SHOP NOW</button>
					</div>

					<div class="col-md-4 zoom">
						<img src="img/picTab4.png" alt="">
					</div>

					<div class="col-md-4 looper text-center">
						<h6>MEMBERSHIP</h6>
						<p>
							In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. 
						</p>

						<button type='button' class="btn" id="btnMembership">JOIN</button>
					</div>

				</div>
			</div>

		</div>
	</div>



	<div class="container">	
		<div class="row scan" style="padding-top: 30px;">	

			<div class="col-md-12 breaker">OUR SERVICES</div>
				
			<div class="col-md-3">
				<img src="img/picTab1.png" alt="">
				<div class="cover">
					<p class="text-center">SPA PROCEDURES<br><span>from $90</span></p>
				</div>
			</div>

			<div class="col-md-3">
				<img src="img/picTab2.png" alt="">
				<div class="cover">
					<p class="text-center">SPA PROCEDURE PACKAGE DEAL<br><span>from $205</span></p>
				</div>
			</div>

			<div class="col-md-3">
				<img src="img/picTab3.png" alt="">
				<div class="cover">
					<p class="text-center">LASER LIPO PROCEDURES<br><span>from $210</span></p>
				</div>
			</div>

			<div class="col-md-3">
				<img src="img/picTab4.png" alt="">
				<div class="cover">
					<p class="text-center">MAKEUP ARTISTRY<br><span>from $40</span></p>
				</div>
			</div>

			
				
		</div>
	</div>

	
	



@include('includes.footer')
<script>
  $(document).ready(function() {
     
        $('#btnMembership').click(function() {
            window.location="{{ route('membership.index') }}";
        });
        
        $('#btnProducts').click(function() {
            window.location="{{ route('products') }}";
        });        
  
  });
</script>
@include('includes.livechat')
@include('includes.footer_end')