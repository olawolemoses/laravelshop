@include('includes.header_local', ['css_files' => ['/css2/cart_page.css'] ])
<div class="container">
        <nav class="d-none d-lg-block">
            <div class="nav nav-tabs nav-fill border-0 rounded-0" id="nav-tab" role="tablist" style="background-color: #f5f5f5;">
               <div class="col"> 
					<a class="nav-item nav-link display-4" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
					 <div class="row text-muted">
							<div class="col-3">	
								<p class=" " style="font-size: 60px;">1 </p>
							</div>
						  <div class="col-9">
								<div class="d-inline-block mt-3">
									<p style="font-size: 14px;">Shipping item</p>
									<p style="font-size: 12px;">check your item</p>
								</div>
						  </div>
					  </div>
					</a>
                </div>
                        <div class="col">

                        </div>
                      
                  <div class="col">  
                      <a class="nav-item nav-link text-muted display-4" id="nav-profile-tab" href="#">
                      <div class="row">
                        <div class="col-3">
                         
                            <p class="" style="font-size: 60px;color:#d8d8d8;">2 </p>
                  
                          </div>
                          <div class="col-9">
                            <div class="d-inline-block mt-3">
                            <p style="font-size: 14px;color:#d8d8d8;">Shopping item</p>
                            <p style="font-size: 12px;color:#d8d8d8;" class="pr-2">check your item</p>
                            </div>
                          </div>
                  </div></a>
                  </div>
                        <div class="col">

                        </div>

              <div class="col">       
               
                  <a class="nav-item nav-link text-muted display-4 " id="nav-contact-tab" href="#"> 
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
                    </div>
				 </a>
              </div>
            </div>
        </nav>
    </div>
                  <div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						@if(!empty($items))
							@foreach ($items as $item_id => $item)
								<div class="container">
									<div class="card bg-light rounded-0">
										<div class="card-body">
											<div class="container">
												<div class="row">
														<div class="col">
														  <img src="/images/{{ $item[0]['attributes']['image'] }}" width="82" alt="">
														</div>
														<div class="col-6">
														  <p style="font-size: 17px;"> {{ $item[0]['attributes']['name'] }}</p>                                                                                                                       
														</div>
														<div class="col" style="margin-left:25%;">
																<p>${{ $item[0]['attributes']['price'] }} ( {{ $item[0]['quantity'] }} )</p>  
																<a href="{{ route( 'removeProductAndShowCart', ['id'=>$item_id] ) }}">
																	<i class="far fa-trash-alt"></i>
																</a>
														</div>
													</div>
											  </div>
										</div>
									</div>
								</div> 
							@endforeach        
						@else
							<div class="container">
								<div class="card bg-light rounded-0">
									<div class="card-body">
										<div class="container">
											<div class="row">
													<div class="col">
													  &nbsp;
													</div>
													<div class="col-6">
													  No Product items in your cart                                                                                                                       
													</div>
													<div class="col" style="margin-left:25%;">
													&nbsp;                                                      
													</div>
												</div>
										  </div>
									</div>
								</div>
						  </div> 
						
						@endif
							<div class="container">          
								@if(!empty($items))
								<div class="container" style="background-color: #f5f5f5;;">
															  <div class="row">
																<div class="col-md-4">
																	<p class="text-muted pl-5 mt-4"  style="font-size:14px;;">ADD MORE ITEMS</p>
																</div>
																<div class="col-md-8 py-2">
																  <div class="row">
																	<div class="col-md-3">
																		
																			<p class="px-5" style="font-size: 12px;color: #5e5e5e;">Sub total</p>
																			<p class="px-5" style="font-size: 24px;color: #5e5e5e;">${{ number_format( $sub_total, 2, '.', ',') }}</p>
																		  
																	</div>

																	<div class="col-md-3">
																	  
																			<p class="px-5" style="font-size: 12px;color: #5e5e5e;">Shipping</p>
																			<p class="px-5" style="font-size: 24px;color: #5e5e5e;">{{ number_format($shipping, 2, '.', ',') }}</p>
																		 
																	  </div>

																	  <div class="col-md-3">
																		
																			  <p class="px-5" style="font-size: 12px;color: #5e5e5e;">Total</p>
																			  <p class="px-5" style="font-size: 24px;color: #5e5e5e;font-weight: bold;">{{ number_format($total, 2, '.', ',') }}</p>
																		   
																		</div>

																		<div class="col-md-3">
																			<form action="{{ route('load_shipping_address') }}" method="get">
																				<button type="submit" class="btn btn-warning mr-5 mt-4 text-white" style="font-size: 12px;height:40px; width:120px;">PROCEED</button>
																			</form>
																		</div>
																  </div>
																</div>
															  </div>
																 </div>
								@endif
							</div>
						</div>
						
						<div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						 
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
				  
							
						</div>
                </div>
                  </div>
  

<div style="height: 30px;"></div>

    @include('includes.footer')
    <script type="text/javascript" src="/js/product_page.js"></script>
    @include('includes.livechat')
    @include('includes.footer_end')