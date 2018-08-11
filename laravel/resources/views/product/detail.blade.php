@include('includes.header2')

  <div class="container">
    <div class="row no-gutters">
      <div class="col-lg-4 col-md-5">
        <img src="/images/{{ $product->product_image }}">
      </div>
      <div class="col-lg-8 col-md-7 bg-light">
        <div class="d-flex flex-column">
          <div class="p-5 text-muted">
            <h6 style="font-size: 20px;">{{ $product->product_name }}</h6>
            <div class="container">
            <div class="d-flex flex-row">
              <div class="star-rating">
				@if( $product->averageRatings > 0 )
					@for($i = 1; $i <= floor($product->averageRatings); $i++)
						<span class="far fas fa-star" data-rating="{{ $i }}"></span>
					@endfor
					
					@for($i = 1; $i <= (5 - floor($product->averageRatings)); $i++)
						<span class="far fa-star" data-rating="{{ $i }}"></span>
					@endfor
				@else
						<span class="far fa-star" data-rating="1"></span>
						<span class="far fa-star" data-rating="2"></span>
						<span class="far fa-star" data-rating="3"></span>
						<span class="far fa-star" data-rating="4"></span>
						<span class="far fa-star" data-rating="5"></span>					
				@endif
					
			  </div>
			  
            <p class="pl-4 text-center">(  {{ $reviewsCount }}  Customer review )</p>
          </div>
		  </div>
          </div>
          <div class="pl-5 text-muted">
            <p class="lead" style="font-size: 14px;">PRODUCT DETAILS</p>
                {!! App\Helpers::convert_json_to_html_list($product->product_details) !!}
          </div>
          <div>
      <ul class="nav nav-tabs pl-5" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active  text-muted" id="home-tab" data-toggle="tab" href="#ab" role="tab" aria-controls="des" aria-selected="true">DESCRIPTION</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  text-muted" id="profile-tab" data-toggle="tab" href="#bc" role="tab" aria-controls="add" aria-selected="false">ADDITIONAL INFO</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  text-muted" id="contact-tab" data-toggle="tab" href="#de" role="tab" aria-controls="rew" aria-selected="false">REVIEWS ( {{ $reviewsCount }} )</a>
  </li>
</ul>
<div class="tab-content pl-5 pt-2 mr-3" id="myTabContent">
  <div class="tab-pane fade show active" id="ab" role="tabpanel" aria-labelledby="des-tab">
      <small class="text-muted" style="font-size: 12px;line-height: 21px;">
            {{ $product->product_description }}
      
     </small>
</div>
  <div class="tab-pane fade" id="bc" role="tabpanel" aria-labelledby="add-tab">
      <small class="text-muted" style="font-size: 12px;line-height: 21px;">
          ${{ $product->additional_information }}
      </small>  
  </div>
  <div class="tab-pane fade" id="de" role="tabpanel" aria-labelledby="rew-tab">
		<small class="text-muted" style="font-size: 12px;line-height: 21px;">
			
			
			<div id="keep">
				<form method="POST" action="{{ route('createReview') }}" class="reviewForm">
    					@csrf
				   <div class="form-group">
						<!-- <label for="exampleFormControlTextarea1"></label> -->
						<input name="svx_id" type="hidden"  value="{{ $product->id }}" />
								
						<textarea name="content" placeholder="review" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				  </div>

				  <div class="row justify-content-center">
					<div class="form-group">
						<div class="rating">
						
							<input type="radio" id="star5" name="rating" value="5" />
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							
							<input type="radio" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							
							<input type="radio" id="star4" name="rating" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							
							<input type="radio" id="star3half" name="rating" value="3.5" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							
							<input type="radio" id="star3" name="rating" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							
							<input type="radio" id="star2half" name="rating" value="2.5" />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							
							<input type="radio" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							
							<input type="radio" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							
							<input type="radio" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							
							<input type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						
						</div>
					</div></div>
				<div class="row justify-content-center">
				<div class="form-group">
						<button type="submit" class="btn btn-warning  text-white">SUBMIT YOUR REVIEW</button>
				</div></div>
				
			</div>
			 
			<hr />

            <div class="col-md-12">
                    @foreach($reviews as $review)
                        <!-- nad -->
                        @if( !is_null($review->user) )
                            <div class="row nad">
                                    <div class="col-10">
                                        <span class="nameBase">{{ $review->user->profile->firstname }} {{ $review->user->profile->lastname }}</span>
                                        <p>
                                            {{ $review->content }}
                                            <br />
                                            <span style="font-size:100%;color:#ffc352;"> &starf;</span> 
                                            {{ number_format ($review->rating_score, 1) }}
                                        </p>
                                    </div>
            
                                    <div class="col-2">{{ $review->created_at->diffForHumans() }}</div>
                            </div>
                        @endif
                        <!-- nad -->
                        @endforeach
                    {{ $reviews->links() }}
            </div>
		</small>
    
  </div>
</div> 
        </div>
       
      
       <p class="text-muted pl-5 pt-4" style="font-size: 12px;">Selling Price</p>
    </div>
    <div class="container">
        <div class="row justify-content-between">
          <p class="text-muted pl-5"  style="font-size:24px;font-weight: bold;"> ${{ $product->product_price }}</p>
          <div class="row justify-content-between pr-3">
              <a href="{{ route('createWishlist', ['product'=>$product]) }}"><i class="far fa-heart pr-4"></i></a>
              <a href="{{ route('addProductAndReturn',['id'=>$product->id] ) }}"><i class="fa fa-shopping-cart pr-4"></i></a>
              
            <button type="button" id="shopNow" class="btn btn-warning  btn-lg mr-3 text-white" style="font-size: 12px">SHOP NOW</button>
        </div>
        </div>
    </div>
  </div>  
  

<script>
  
    const shopNow = document.getElementById("shopNow");

    shopNow.onclick = function() {
        window.location="{{ route('addProductAndShowCart', ['id'=>$product->id]) }}";
    };
        
</script>


  <p class="pt-5" style="font-size:14px;">RELATED PRODUCT</p>
  <hr class="linebrk">
  
  <div class="container d-none d-lg-block">
    <div class="row tanny">
      @if(!empty( $related_products ))
	  @foreach($related_products as $rp)
	  <div class="col">
        <a href="
		@if( $rp->type == '1' )
			/products/detail/{{ $rp->id }}
		@elseif( $rp->type == '2' )
			/services/detail/{{ $rp->id }}
		@elseif( $rp->type == '3' )
			/training/detail/{{ $rp->id }}
		@endif
		"> 
			<img width="70px" src="/images/{{ $rp->image }}" alt="">
		</a>
        <p class="pt-2" style="font-size:12px;color:#5e5e5e;">
		        <a href="
					@if( $rp->type == '1' )
						/products/detail/{{ $rp->id }}
					@elseif( $rp->type == '2' )
						/services/detail/{{ $rp->id }}
					@elseif( $rp->type == '3' )
						/training/detail/{{ $rp->id }}
					@endif
					"> 
					{{ $rp->name }}
				</a>
		</p>
        <p style="font-size:17px;margin-top:-10px;color:#5e5e5e;">$ {{ $rp->price }}</p>
      </div>
      @endforeach
	  @else
	  <div class="col">
        No related products at the moment
      </div>
	  @endif
	  <!--
	  <div class="col">
          <img src="/images/black2.png" alt="">
          <p class="pt-2" style="font-size:12px;color:#5e5e5e;">BLACK HIGH WAIST GIRDLE</p>
        <p style="font-size:17px;margin-top:-10px;color:#5e5e5e;">$240</p>
        </div>
        <div class="col">
            <img src="/images/slimming2.png" alt="">
            <p class="pt-2" style="font-size:12px;color:#5e5e5e;">SLIMMING GEL</p>
        <p style="font-size:17px;margin-top:-10px;color:#5e5e5e;">$100</p>
          </div>
          <div class="col">
              <img src="/images/face2.png" alt="">
              <p class="pt-2" style="font-size:12px;color:#5e5e5e;">FACE FOUNDATION MAKEUP</p>
        <p style="font-size:17px;margin-top:-10px;color:#5e5e5e;">$30</p>
            </div>
            <div class="col">
                <img src="/images/makehigh3.png" alt="">
                <p class="pt-2" style="font-size:12px;color:#5e5e5e;">FACE FOUNDATION MAKEUP</p>
          <p style="font-size:17px;margin-top:-10px;color:#5e5e5e;">$150</p>
              </div>
          -->  
    </div>
    <div style="height:100px;"></div>
  </div>
</div>
</div>
 




    @include('includes.footer')
    <script type="text/javascript" src="/js/product_page.js"></script>
    @include('includes.livechat')
    @include('includes.footer_end')