@include('includes.header2')
 <p class="text-center" style="color:#5e5e5e;font-size:44px;">WHISLIST</p>
        <hr>
    <div class="container bouncein">
            <div style="height:30px;"></div>
           
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										@if(!empty($products))
										@foreach ($products as $product)
										<div class="container">
											<div class="card bg-light rounded-0">
												<div class="card-body">
													<div class="container">
														<div class="row">
																<div class="col">
																  <img src="/images/img1.png" alt="">
																</div>
																<div class="col-6">
																  <p style="font-size: 17px;">{{ $product->product_name }}</p>                                                                                                                       
																</div>
																<div class="col" style="margin-left:15%;">
																		<p>${{ $product->product_price }}</p>  
																	  <a class="btn btn-warning" href="{{ route( 'addProductAndReturn', ['id'=>$product->id ] ) }}"> Add To Cart</a>                                                   
																</div>
															  </div>
															  </div>
												  </div>
                                            </div>
                                          </div>
										 @endforeach
										 @endif
										 
					 </div>
                    
              
                </div>
                  </div>
  

<div style="height: 40px;"></div>

@include('includes.footer')