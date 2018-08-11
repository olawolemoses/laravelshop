      <nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: 1px solid rgba(53, 53, 53, 0.1);">
          <div class="container lego">
              
              <ul class="navbar-nav mr-auto my-2 my-lg-0">
                 <li class="nav-item mynav">Contact us: info@honeydropsinc.com | Call us: +234 807 340 4890</li>
              </ul>
       
       
              <ul class="navbar-nav mt-2 mt-lg-0">
                 <li class="nav-item mynav">Stay connected </li>
                 <li class="nav-item mynav"><i class="fab fa-facebook-square"></i></li>
                 <li class="nav-item mynav"><i class="fab fa-twitter"></i></li>
                 <li class="nav-item mynav"><i class="fab fa-youtube"></i></li>
                 <li class="nav-item mynav"><i class="fab fa-instagram"></i></li>
              </ul>
       
       
          </div>
         
       </nav>
       
       
       <nav class="navbar navbar-expand-lg navbar-light mishtab">
       
           <div class="container">
       
       
               
             
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
       
               <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
       
       
       
               
               <ul class="navbar-nav mr-auto my-2 my-lg-0">
       
       
                     
                     <li class="nav-item mynav">
                       <a class="nav-link" href="/">home</a>
                     </li>
                     <li class="nav-item mynav">
                       <a href="{{ route('products') }}" class="nav-link">product</a>
                     </li>
                     <li class="nav-item mynav">
                       <a href="{{ route('membership.index') }}" class="nav-link">membership</a>
                     </li>
                     <li class="nav-item mynav">
                       <a href="{{ route('bookings.index') }}" class="nav-link">booking</a>
                     </li>
                     
                     
       
                 </ul>
       
       
       
                 <a href="#" class="navbar-brand" style="margin: auto;">
                   <img src="/img/logo.png" style="height: 30px;" alt="">
                 </a>
       
               
       
       
                 <ul class="navbar-nav mt-2 mt-lg-0">
                    
                         <li class="nav-item mynav">
                             <div class="dropdown">
                        		<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        		Training & Deals
                        		</a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            			<a class="dropdown-item text-uppercase" href="{{ route('training_detail', ['training'=> 1] ) }}">Body Sculpting Training</a>
                            			<a class="dropdown-item" href="{{ route('training_detail', ['training'=> 2] ) }}">MICROBLADING TRAINING</a>
        	                   </div>
        	                    </div>
                         </li>
	                  
                     
                     <li class="nav-item mynav">
                       <a class="nav-link" href="{{ route('viewlist') }}"> WISHLIST</a>
                     </li>
                     <li class="nav-item mynav">
                       <a class="nav-link" href="#"> faqs</a>
                     </li>
       
                     @if(!Auth::check())
                        <li class="nav-item mynav">
                            <a class="nav-link" href="{{ route('login') }}">| &nbsp; LOGIN</a>
                      </li>
                    @else
                        <li class="nav-item mynav">
                             <a class="nav-link" href="{{ route('logout') }}">LOGOUT</a>
                        </li>
                    @endif
                   
                     <li class="nav-item mynav dropdown">
                       <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-shopping-cart"></i> @if( \App\Helpers::get_cart()->getTotalQuantity() > 0 ) ({{ \App\Helpers::get_cart()->getTotalQuantity() }}) @endif
                       </a>
                            @if(Auth::check())
                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('profile.index') }}">Profile</a>				
	                   </div>
	                        @endif
                     </li>
                   
                 </ul>
       
       
       
               </div>
       
           </div>
</nav>