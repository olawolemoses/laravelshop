@include('includes.header_product')
          
           <div class="container d-none d-lg-block" style="background-image: url(images/product_banner.png); min-height:400px;">
              
                <div class="container banner">
                  <h6>GET YOUR CONFIDENCE BACK</h6>
                  <p>Products that leave lasting memories</p>
                  <button type="button" class="btn btn-lg btn-warning text-white">SHOP NOW</button>
                </div>
              
            </div>
          
          <div class="container">

                <div class="row">
          
                  <div class="col-lg-3 d-none d-lg-block">
          
                    <h1 class="my-3 side">CATEGORY</h1>
                  
<label class="checklist">One
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label>
<label class="checklist">Two
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="checklist">Three
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="checklist">Four
  <input type="checkbox">
  <span class="checkmark"></span>
</label>

                    <h1 class="my-3  side">PRICE</h1>
                
                    <div class="list-group">
                        <label class="checklist">$20-$50
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>
                          <label class="checklist">$51-$100
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="checklist">$101-$200
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="checklist">$201-$250
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <label class="checklist">$201-$500
                              <input type="checkbox">
                              <span class="checkmark"></span>
                            </label>
                           
              
                    </div>
                    <h1 class="my-4 side">SIZE</h1>
                     <div class="d-flex flex-row">
                    <p class="text-muted ml-0 my-2 mr-2 border">XS</p>
                    <p class="text-muted  m-2 border">X</p>
                    <p class="text-muted m-2 border">XM</p>
                     </div>
                      <div class="d-flex flex-row">
                    <p class="text-muted ml-0 my-2 mr-2 border">L</p>
                    <p class="text-muted  m-2 border">XL</p>
                    <p class="text-muted m-2 border">1X</p>
                     </div>

                      <div class="d-flex flex-row">
                    <p class="text-muted ml-0 my-2 mr-2 border">2X</p>
                    <p class="text-muted  m-2 border">3X</p>
                    <p class="text-muted m-2 border">A</p>
                     </div>
                     <h1 class="my-4 side">COLOR</h1>
                     <div class="d-flex flex-row">
                        <div class="oval-black"></div>
                        <div class="oval-brown"></div>
                        <div class="oval-grey"></div>
                        <div class="oval-pink"></div>
                     </div>
  
                    </div>

								
							
							<div class="col-lg-9 mt-4">

				  

									<div class="row">
										
										@foreach( $products as $product) 

											  <div class="col-lg-4 col-md-6 mb-4">
												<div class="card h-100 hov">
												  <a href="{{ route('products_detail',['id'=>$product->id] ) }}"><img class="card-img-top" src="images/{{ $product->product_image }}" alt=""></a>
												  <div class="card-body mb-2">
													<div class="d-flex flex-row  justify-content-between">
													  <p class="text-muted" style="font-size: 14px;"><a href="{{ route('products_detail', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></p>
													 <a href="#"><i class="fa fa-shopping-cart"></i></a>
													</div>
												   
												  </div>
												  <div class="card-body raise">
													<div class="d-flex flex-row  justify-content-between">
													  <p class="text-muted">${{ $product->product_price }}</p>
													 <a href="{{route('createWishlist', ['product'=>$product]) }}"><i class="far @if($product->isWished ) fas @endif fa-heart"></i></a>
													</div>
												   
												  </div>
												  <div class="card-body overlay">
													<div class="d-flex flex-row  justify-content-between  pt-3">
													<p class="text-muted" style="font-size: 14px;"><a href="{{ route('products_detail', ['id'=>$product->id]) }}">{{ $product->product_name }}</a></p>
													<a href="{{route('createWishlist', ['product'=>$product]) }}"><i class="far @if($product->isWished ) fas @endif fa-heart"></i></a>
												   </div>
												   <p class="text-muted" style="font-size: 20px;font-weight: bold;">${{ $product->product_price }}</p>
												   <a href="{{ route('addProductAndReturn',['id'=>$product->id] ) }}" class="btn btn-warning text-white" style="width: 100%;font-size:12px;">ADD TO CART</a>
												 </div>
												</div>
											  </div>
										@endforeach
										
																				   
									</div>

									<nav aria-label="Page navigation example">
									  <ul class="pagination justify-content-center">
										
										<li class="page-item mx-2"><a class="page-link" href="#"></a></li>
										<li class="page-item mx-2"><a class="page-link" href="#"> </a></li>
										<li class="page-item mx-2"><a class="page-link" href="#"></a></li>
										
									  </ul>
									</nav>

									<!-- /.row -->
						  
								  </div> 
                            
                               
                            </div>

                            
                            <!-- /.row -->
                  
                   </div>
                            
                            
    @include('includes.footer')
    <script type="text/javascript" src="/js/product_page.js"></script>
    @include('includes.livechat')
    @include('includes.footer_end')