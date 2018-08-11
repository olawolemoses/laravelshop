@include("includes.header")

  <div class="container-fluid" style="background: url('/img/backback.png') no-repeat center center / cover; min-height: 140vh;">
   			
		<div class="row">
			

				<div class="col-md-4 offset-md-4">

					<div class="credential">
						
						<div class="row" style="padding-top: 10px;">
						
							<a href="" style="width: 100%;"><button class="btn btn-block auth" style="background: #4a67ad;"><i class="fa fa-facebook-square"></i>Login with Facebook</button></a>

							<a href="" style="width: 100%;"><button class="btn btn-block auth" style="background: #db3236;"><i class="fa fa-google"></i>Login with Google</button></a>

						</div>

						<div class="row" style="margin-top: 30px;color: #d8d8d8;">
							<div class="col-5"><hr></div>
							<div class="col-2 text-center">or</div>
							<div class="col-5"><hr></div>
						</div>

						<div class="row" style="margin-top: 30px;">
							
								<div class="col-md-12">
    							  <form action="{{ route('register') }}" method="post"> @csrf
    							  
                                    <div class="card-body">
                                        @if ($errors->count() > 0 )
                                            <div class="alert alert-danger" style="display:block">
                                                @foreach( $errors->all() as $error )
                                                   <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                
    								<label for="">Firstname</label>
    								<input type="text" name="firstname" class="form-control">
    
    								<label for="">Lastname</label>
    								<input type="text" name="lastname" class="form-control">
    
    
    								<label for="">Email Address</label>
    								<input type="email" name="username" class="form-control">
    
    								<label for="">Password</label>
    								<input type="password" name="password"  class="form-control">
    
    								<label for="">Comfirm Password</label>
    								<input type="password" name="password_confirmation" class="form-control">

									<button type="submit" class="btn col-md-4 offset-md-4">SIGN UP</button>


									<p>Already have an account ? <a href="#">Sign in</a></p>
								  </form>
								</div>
								

							
						</div>

					</div>
					

					
					

				</div>


		</div>


   </div>
   
   @include("includes.footer")







